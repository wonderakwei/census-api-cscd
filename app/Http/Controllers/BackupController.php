<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WatheqAlshowaiter\BackupTables\BackupTables;

class BackupController extends Controller
{
    public function backupTables(): \Illuminate\Http\JsonResponse
    {
        try {
            // List the tables you want to back up
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
                'livestock_or_fisheries',
                'housing_conditions',
                'enumerators'
            ];

            // Shorten table names to avoid exceeding the 64-character limit
            $shortenedTables = array_map(function ($table) {
                return substr($table, 0, 50); // Limit to 50 characters (leaving room for timestamp)
            }, $tables);

            BackupTables::generateBackup($shortenedTables);

            return response()->json(['message' => 'Backup successful'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Backup failed: ' . $e->getMessage()], 500);
        }
    }
}
