<?php
use App\Http\Controllers\BackupController;
use Illuminate\Support\Facades\Route;


Route::get('/backup', [BackupController::class, 'createBackup']);
