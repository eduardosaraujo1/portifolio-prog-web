<?php
define('PROJECT_ROOT', __DIR__);

// Inicializar sessão globalmente
session_start();

// Carregar funções utilitarias
require PROJECT_ROOT . '/utils/redirect.php';
require PROJECT_ROOT . '/utils/render_view.php';

// Lógica para fazer routing
$route_table = [
    '/' => fn() => redirect('/login'),
    '/login' => fn() => require PROJECT_ROOT . 'controller/login.php',
    '/quiz' => fn() => require PROJECT_ROOT . 'controller/quiz.php',
    '/resultado' => fn() => require PROJECT_ROOT . 'controller/resultado.php',
];

echo '<pre>';
echo htmlspecialchars(json_encode($_SERVER, JSON_PRETTY_PRINT));
echo '</pre>';
