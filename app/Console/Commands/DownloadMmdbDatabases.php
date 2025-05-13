<?php

namespace App\Console\Commands;

use App\Http\Controllers\Geoip\MmdbDownloadController;
use Illuminate\Console\Command;

class DownloadMmdbDatabases extends Command
{
    protected $signature = 'app:pull:mmdb';

    protected $description = 'Download MMDB databases from the mmdb-sync service.';

    public function handle()
    {
        try {
            $controller = new MmdbDownloadController;
            $success = $controller->downloadAll();

            if ($success) {
                $this->info('Successfully downloaded all MMDB databases');

                return 0;
            }

            $this->error('Failed to download MMDB databases');

            return 1;
        } catch (\Exception $e) {
            $this->error('Error downloading MMDB databases: '.$e->getMessage());

            return 1;
        }
    }
}
