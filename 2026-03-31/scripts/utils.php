<?php

function redirect(string $route): never
{
    header("Location: /2026-03-31/" . ltrim($route, "/"));
    die();
}
