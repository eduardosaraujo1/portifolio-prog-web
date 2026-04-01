<?php

function render_view(string $path, array $params = [], $path_suffix = ".phtml"): string
{
    $full_path = PROJECT_ROOT . "/view/" . str_replace('.', '/', $path) . $path_suffix;

    if (! file_exists($path)) {
        return '';
    }

    // Declarar variáveis
    extract($params, EXTR_OVERWRITE);

    ob_start();
    include $full_path;
    $content = ob_get_clean();
    ob_end_clean();

    return $content ?: '';
}
