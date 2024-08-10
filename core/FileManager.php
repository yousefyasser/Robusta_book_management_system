<?php

namespace core;

class FileManager
{
    public static function move_file(string $fileName)
    {
        if (!is_dir(base_path('public/uploads'))) {
            mkdir(base_path('public/uploads'));
        }

        $srcPath = $_FILES[$fileName]['tmp_name'];
        $extension = pathinfo($_FILES[$fileName]['name'], PATHINFO_EXTENSION);
        $uniqueName = uniqid('cover_', true) . '.' . $extension;
        $dstPath = "uploads/{$uniqueName}";

        move_uploaded_file($srcPath, base_path("public/{$dstPath}"));

        return $dstPath;
    }

    public static function delete_file($filePath)
    {
        if (valid_path($filePath)) {
            unlink(base_path("public/{$filePath}"));
        }
    }
}
