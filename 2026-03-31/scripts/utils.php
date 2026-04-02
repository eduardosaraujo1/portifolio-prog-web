<?php

function redirect(string $route): never
{
    header("Location: /2026-03-31/" . ltrim($route, "/"));
    die();
}

function read_json($path): array|false
{
    $json = file_get_contents(PROJECT_ROOT . '/' . $path);
    if ($json == false) return false;
    return json_decode($json, true);
}
