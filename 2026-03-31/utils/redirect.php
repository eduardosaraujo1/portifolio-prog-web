<?php

function redirect(string $url): never
{
    header("Location: 2026-03-31/$url");
    die();
}
