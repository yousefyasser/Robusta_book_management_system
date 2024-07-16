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

function valid_path($path)
{
    return !empty($path) && file_exists(base_path("public{$path}"));
}

function base_path($path)
{
    return BASE_PATH . $path;
}
