<?php
session_start();

$produtoId = $_GET['idProduto'] ?? null;

if (empty($produtoId)) {
    header("Location: ../dashboard.php");
    die();
}

$carrinho = $_SESSION['carrinho'] ?? [];

if (isset($carrinho[$produtoId])) {
    $carrinho[$produtoId]++;
} else {
    $carrinho[$produtoId] = 1;
}

$_SESSION['carrinho'] = $carrinho;

header("Location: ../dashboard.php");
