<?php

namespace App\Handlers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as FileFacade;

class File
{
    /**
     * Handle file upload
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param array $options
     * @return string|false Path to the uploaded file or false on failure
     */
    public function upload(UploadedFile $file, string $directory = 'uploads', array $options = []): string|false
    {
        // Validate file
        if (!$this->validateFile($file, $options)) {
            return false;
        }

        // Generate unique filename
        $filename = $this->generateUniqueFilename($file, $options);

        // Create directory if it doesn't exist
        $fullPath = public_path($directory);
        if (!FileFacade::exists($fullPath)) {
            FileFacade::makeDirectory($fullPath, 0755, true);
        }

        // Move the file to the public directory
        $file->move($fullPath, $filename);

        return $directory . '/' . $filename;
    }

    /**
     * Validate the uploaded file
     *
     * @param UploadedFile $file
     * @param array $options
     * @return bool
     */
    protected function validateFile(UploadedFile $file, array $options = []): bool
    {
        // Check if file was uploaded successfully
        if (!$file->isValid()) {
            return false;
        }

        // Check file size if specified in options
        if (isset($options['max_size'])) {
            $maxSizeInBytes = $this->parseFileSize($options['max_size']);
            if ($file->getSize() > $maxSizeInBytes) {
                return false;
            }
        }

        // Check allowed file types if specified
        if (isset($options['allowed_types'])) {
            $fileExtension = $file->getClientOriginalExtension();
            $allowedTypes = is_string($options['allowed_types'])
                ? explode(',', $options['allowed_types'])
                : $options['allowed_types'];

            if (!in_array(strtolower($fileExtension), array_map('strtolower', $allowedTypes))) {
                return false;
            }
        }

        return true;
    }

    /**
     * Generate a unique filename
     *
     * @param UploadedFile $file
     * @param array $options
     * @return string
     */
    protected function generateUniqueFilename(UploadedFile $file, array $options = []): string
    {
        $extension = $file->getClientOriginalExtension();

        if (isset($options['preserve_name']) && $options['preserve_name']) {
            // Use original name with a unique suffix
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueName = Str::slug($originalName) . '_' . uniqid() . '.' . $extension;
        } else {
            // Generate completely unique name
            $uniqueName = Str::random(40) . '.' . $extension;
        }

        return $uniqueName;
    }

    /**
     * Parse file size string to bytes
     *
     * @param string $size
     * @return int
     */
    protected function parseFileSize(string $size): int
    {
        $unit = strtolower(substr($size, -1));
        $value = intval($size);

        switch ($unit) {
            case 'k':
                return $value * 1024;
            case 'm':
                return $value * 1024 * 1024;
            case 'g':
                return $value * 1024 * 1024 * 1024;
            default:
                return $value; // Assume bytes if no unit specified
        }
    }

    /**
     * Delete a file
     *
     * @param string $path
     * @return bool
     */
    public function delete(string $path): bool
    {
        // Check if the path is a full URL and extract the relative path
        if (str_starts_with($path, config('app.url')) || str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            $url = parse_url($path);
            $path = ltrim($url['path'], '/');
        }

        $fullPath = public_path($path);
        if (FileFacade::exists($fullPath)) {
            return FileFacade::delete($fullPath);
        }
        return false;
    }

    /**
     * Get file URL
     *
     * @param string $path
     * @return string
     */
    public function getUrl(string $path): string
    {
        return asset($path);
    }
}