<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class BackupController extends Controller
{
    public function createBackup(): \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        try {
            // Set up backup file name with timestamp
            $backupFile = 'backup_' . Carbon::now()->format('Y_m_d_H_i_s') . '.sql';
            $backupPath = storage_path('app/' . $backupFile);

            // Use mysqldump to back up the database
            $command = "mysqldump -u " . env('DB_USERNAME') . " -p'" . env('DB_PASSWORD') . "' " . env('DB_DATABASE') . " > " . $backupPath;
            exec($command);

            // Check if the backup file exists
            if (!file_exists($backupPath)) {
                return response()->json(['error' => 'Database backup failed'], 500);
            }

            // Return the backup file for download and delete after sending
            return response()->download($backupPath)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            return back()->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }
}
