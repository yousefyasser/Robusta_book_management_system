<?php

function dd($vars)
{
    foreach ($vars as $var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
    die();
}

function move_file()
{
    $srcPath = $_FILES['cover_image']['tmp_name'];
    $dstPath = "/uploads/{$_FILES['cover_image']['name']}";
    move_uploaded_file($srcPath, base_path("public{$dstPath}"));

    return $dstPath;
}

function valid_path($path)
{
    return !empty($path) && file_exists(base_path("public{$path}"));
}

function base_path($path)
{
    return BASE_PATH . $path;
}
