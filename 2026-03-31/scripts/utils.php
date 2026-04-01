<?php

function redirect(string $url): never
{
    header("Location: /2026-03-31$url");
    die();
}

function render_view(string $path, array $params = []): string
{
    $full_path = __DIR__ . "/../view/$path";

    if (! file_exists($full_path)) {
        throw new Exception("View não encontrada: $full_path");
    }

    // transforma assoc array em variaveis
    extract($params, EXTR_OVERWRITE);

    ob_start();
    require $full_path;
    $content = ob_get_clean();

    return $content ?: '';
}
