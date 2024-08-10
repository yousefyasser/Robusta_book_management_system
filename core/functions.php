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

function query_formatter($separator, $arr)
{
    return implode($separator, array_map(function ($key) {
        return "$key = :$key";
    }, array_keys($arr)));
}

function valid_path($path)
{
    return !empty($path) && file_exists(base_path("public/{$path}"));
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view(string $viewName, array $viewVariables = [])
{
    extract($viewVariables);
    return require(base_path("views/{$viewName}.view.php"));
}
