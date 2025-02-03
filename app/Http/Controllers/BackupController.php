<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use ZipArchive;

class BackupController extends Controller
{
    public function createBackup(): BinaryFileResponse|\Illuminate\Http\JsonResponse
    {
        try {
            // List of tables to backup
            $tables = [
                'census_enumerations',
                'households',
                'household_members',
                'absentees',
                'literacy',
                'fertility',
                'household_ict',
                'mortality',
                'emigration',
                'icthousehold_member',
                'disability',
                'economic_activities',
                'demography',
                'agriculture_activities',
                'crop_farming_or_tree_planting_activities',
                'livestock_or_fisheries',
                'housing_conditions',
                'enumerators'
            ];

            // Format file names
            $timestamp = Carbon::now()->format('Y_m_d_H_i_s');
            $sqlFileName = "backup_{$timestamp}.sql";
            $zipFileName = "backup_{$timestamp}.zip";
            $sqlFilePath = storage_path("app/{$sqlFileName}");
            $zipFilePath = storage_path("app/{$zipFileName}");

            // Ensure storage directory exists
            File::ensureDirectoryExists(storage_path('app'));

            // Generate the MySQL dump command for selected tables
            $command = sprintf(
                'mysqldump -u%s -p%s %s %s --no-tablespaces --skip-lock-tables > %s',
                escapeshellarg(env('DB_USERNAME')),
                escapeshellarg(env('DB_PASSWORD')),
                escapeshellarg(env('DB_DATABASE')),
                implode(' ', array_map('escapeshellarg', $tables)), // Ensure each table name is properly escaped
                escapeshellarg($sqlFilePath)
            );

            // Execute the command
            shell_exec($command);

            // Verify backup file contains data
            if (!file_exists($sqlFilePath) || filesize($sqlFilePath) === 0) {
                return response()->json(['error' => 'Database backup failed or is empty'], 500);
            }

            // Create ZIP archive
            $zip = new ZipArchive();
            if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
                $zip->addFile($sqlFilePath, $sqlFileName);
                $zip->close();
                unlink($sqlFilePath); // Delete SQL file after zipping
            } else {
                return response()->json(['error' => 'Could not create ZIP archive'], 500);
            }

            // Return the ZIP file for download
            return response()->download($zipFilePath)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Backup failed: ' . $e->getMessage()], 500);
        }
    }
}
