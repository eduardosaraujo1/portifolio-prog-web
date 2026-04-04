<?php

function redirect(string $route): never
{
    header("Location: /2026-03-31/" . ltrim($route, "/"));
    die();
}


function e(string $string, int $flags = ENT_QUOTES | ENT_SUBSTITUTE, string|null $encoding = null, $double_encode = true)
{
    return htmlspecialchars($string, $flags, $encoding, $double_encode);
}
