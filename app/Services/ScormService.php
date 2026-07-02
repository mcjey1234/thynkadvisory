<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use ZipArchive;

class ScormService
{
    public function extractScormPackage($zipPath, $destinationPath)
    {
        try {
            // Handle temporary file path (for Filament uploads)
            if (strpos($zipPath, '/tmp/') === 0) {
                // This is a temporary file, copy it to storage first
                $tempFile = $zipPath;
                $storagePath = 'scorm-uploads/' . basename($zipPath);
                Storage::disk('public')->put($storagePath, file_get_contents($tempFile));
                $fullZipPath = storage_path('app/public/' . $storagePath);
                Log::info('Copied temp file to storage: ' . $fullZipPath);
            } else {
                $fullZipPath = storage_path('app/public/' . $zipPath);
            }
            
            $fullDestination = storage_path('app/public/scorm-courses/' . $destinationPath);
            
            Log::info('Extracting SCORM package', [
                'zip_path' => $fullZipPath,
                'destination' => $fullDestination
            ]);
            
            // Check if ZIP exists
            if (!file_exists($fullZipPath)) {
                Log::error('ZIP file not found: ' . $fullZipPath);
                return null;
            }
            
            // Create destination directory
            if (!file_exists($fullDestination)) {
                mkdir($fullDestination, 0755, true);
            }
            
            $zip = new ZipArchive();
            if ($zip->open($fullZipPath) === true) {
                $zip->extractTo($fullDestination);
                $zip->close();
                
                // Find the launch file
                $launchFile = $this->findLaunchFile($fullDestination);
                
                Log::info('SCORM package extracted successfully', [
                    'destination' => $destinationPath,
                    'launch_file' => $launchFile
                ]);
                
                return $launchFile;
            }
            
            Log::error('Failed to open ZIP file: ' . $fullZipPath);
            return null;
            
        } catch (\Exception $e) {
            Log::error('SCORM extraction error: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            return null;
        }
    }
    
    private function findLaunchFile($directory)
    {
        // Check for common launch files
        $launchFiles = ['index.html', 'index.htm', 'index.php', 'launch.html', 'launch.htm', 'story.html', 'story.htm', 'scorm.html'];
        
        foreach ($launchFiles as $file) {
            if (file_exists($directory . '/' . $file)) {
                return $file;
            }
        }
        
        // Check for imsmanifest.xml and find the launch file from it
        if (file_exists($directory . '/imsmanifest.xml')) {
            $xml = simplexml_load_file($directory . '/imsmanifest.xml');
            if ($xml && isset($xml->resources->resource)) {
                foreach ($xml->resources->resource as $resource) {
                    $href = (string)$resource['href'];
                    if (!empty($href)) {
                        return $href;
                    }
                }
            }
        }
        
        // Check for SCORM 2004 manifest
        if (file_exists($directory . '/imsmanifest.xml')) {
            $xml = simplexml_load_file($directory . '/imsmanifest.xml');
            if ($xml && isset($xml->organizations->organization->item)) {
                foreach ($xml->organizations->organization->item as $item) {
                    $identifierref = (string)$item['identifierref'];
                    if (!empty($identifierref)) {
                        foreach ($xml->resources->resource as $resource) {
                            if ((string)$resource['identifier'] == $identifierref) {
                                $href = (string)$resource['href'];
                                if (!empty($href)) {
                                    return $href;
                                }
                            }
                        }
                    }
                }
            }
        }
        
        // If no launch file found, look for any HTML file
        $files = glob($directory . '/*.{html,htm,php}', GLOB_BRACE);
        if (!empty($files)) {
            return basename($files[0]);
        }
        
        return null;
    }
}
