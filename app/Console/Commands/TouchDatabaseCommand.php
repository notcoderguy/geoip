<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TouchDatabaseCommand extends Command
{
    protected $signature = 'app:db:touch';

    protected $description = 'Ensure the SQLite database file exists';

    public function handle()
    {
        $databasePath = database_path('database.sqlite');

        // Check if database file exists
        if (file_exists($databasePath)) {
            $this->info("Database file [$databasePath] already exists");

            return;
        }

        // Ensure database directory exists with proper permissions
        $databaseDir = dirname($databasePath);
        if (! file_exists($databaseDir)) {
            try {
                File::makeDirectory($databaseDir, 0755, true);
                $this->info("Created database directory [$databaseDir]");
            } catch (\Exception $e) {
                $this->error("Failed to create database directory [$databaseDir]: ".$e->getMessage());

                return;
            }
        }

        // Create empty database file with error handling
        try {
            if (file_exists($databasePath)) {
                touch($databasePath);
                $this->info("Updated timestamp for existing database file [$databasePath]");
            } else {
                File::put($databasePath, '');
                File::chmod($databasePath, 0644);
                $this->info("Created database file [$databasePath]");
            }
        } catch (\Exception $e) {
            $this->error("Failed to create database file [$databasePath]: ".$e->getMessage());

            return;
        }

        $this->info("Database file [$databasePath] created successfully");
    }
}
