<?php

namespace App\Http\Controllers\Geoip;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MmdbDownloadController extends Controller
{
    const DOWNLOAD_URLS = [
        'asn' => 'https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-ASN&license_key={license_key}&suffix=tar.gz',
        'city' => 'https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-City&license_key={license_key}&suffix=tar.gz',
        'country' => 'https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-Country&license_key={license_key}&suffix=tar.gz',
    ];

    public function downloadAll()
    {
        $licenseKey = env('GEOIP_MAXMIND_LICENSE_KEY');
        if (empty($licenseKey)) {
            throw new \RuntimeException('MaxMind license key not configured');
        }

        Storage::makeDirectory('geoip');

        foreach (self::DOWNLOAD_URLS as $type => $url) {
            $this->downloadAndExtract(
                str_replace('{license_key}', $licenseKey, $url),
                $type
            );
        }

        return true;
    }

    private function downloadAndExtract(string $url, string $type)
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'mmdb_');
        try {
            $response = Http::timeout(120)->send('GET', $url, [
                'sink' => $tempFile,
            ]);

            if (! $response->successful()) {
                throw new \RuntimeException("HTTP request failed with status {$response->status()}");
            }

            // Verify downloaded file exists and has content
            if (! file_exists($tempFile) || filesize($tempFile) === 0) {
                throw new \RuntimeException('Downloaded file is empty or missing');
            }

            // Check file magic numbers for gzip format
            $handle = fopen($tempFile, 'rb');
            $magic = fread($handle, 2);
            fclose($handle);
            if ($magic !== "\x1f\x8b") {
                throw new \RuntimeException('Downloaded file is not a valid gzip archive');
            }

            $extracted = $this->extractMmdb($tempFile, $type);

            return $extracted;
        } catch (\Exception $e) {
            throw new \RuntimeException("Failed to process {$type} database: ".$e->getMessage());
        } finally {
            if (file_exists($tempFile)) {
                unlink($tempFile);
            }
        }
    }

    private function extractMmdb(string $archivePath, string $type): bool
    {
        $tempDir = sys_get_temp_dir();
        $extractDir = $tempDir.'/mmdb_extract_'.uniqid();

        try {
            if (! is_writable($tempDir)) {
                throw new \RuntimeException("Temp directory {$tempDir} is not writable");
            }

            // Create extraction directory
            if (! mkdir($extractDir, 0755, true)) {
                throw new \RuntimeException('Failed to create extraction directory');
            }

            // Extract using shell commands
            $command = "tar -xzf {$archivePath} -C {$extractDir} 2>&1";
            $output = [];
            $returnVar = 0;
            exec($command, $output, $returnVar);

            if ($returnVar !== 0) {
                throw new \RuntimeException('Extraction failed: '.implode("\n", $output));
            }

            $mmdbFile = $this->findMmdbFile($extractDir);
            if (! $mmdbFile) {
                throw new \RuntimeException('No MMDB file found in extracted archive');
            }

            $destination = "geoip/{$type}.mmdb";
            Storage::put($destination, file_get_contents($mmdbFile));

            return true;
        } catch (\Exception $e) {
            throw new \RuntimeException("Failed to extract {$type} database: ".$e->getMessage());
        } finally {
            $this->deleteDirectory($extractDir);
        }
    }

    private function findMmdbFile(string $directory): ?string
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'mmdb') {
                return $file->getPathname();
            }
        }

        return null;
    }

    private function deleteDirectory(string $path): void
    {
        if (! file_exists($path)) {
            return;
        }

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }

        rmdir($path);
    }
}
