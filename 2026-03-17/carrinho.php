<?php

require 'middleware/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['action'];
    if ($acao === 'limparCarrinho') {
        $_SESSION['carrinho'] = [];
        header('Location: carrinho.php');
    }

    die();
}

$dados = json_decode(file_get_contents("data/products.json"), true);
$produtos = $dados['products'];

function transformarIdEmDados($id, $produtos)
{
    foreach ($produtos as $produto) {
        if ($produto['id'] == $id) {
            return $produto;
        }
    }
}

function transformarCarrinhoEmListaDeProdutos($produtos)
{
    $carrinho = $_SESSION['carrinho'];
    $listaDeProdutos = [];

    foreach ($carrinho as $id => $quantidade) {
        $listaDeProdutos[] = [...transformarIdEmDados($id, $produtos), 'quantidade' => $quantidade];
    }

    return $listaDeProdutos;
}

$listaDeProdutos = transformarCarrinhoEmListaDeProdutos($produtos);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- <pre class="bg-dark text-white rounded p-2"><?= json_encode($_SESSION, JSON_PRETTY_PRINT) ?></pre> -->
    <div class="bg-scrim"></div>
    <nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#">Loja GoatChips</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="bi bi-cart me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="carrinho.php">
                            <i class="bi bi-cart me-2"></i>Carrinho
                        </a>
                    </li>
                </ul>
                <span class="me-4 text-white">Olá,
                    <?= $_SESSION['user_email'] ?>
                </span>
                <div class="nav-item"><a href="logout.php" class="link-danger text-decoration-none fw-bold"
                        role="button">Sair</a></div>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="cart-container">
            <div class="cart-item-list">
                <?php if (empty($listaDeProdutos)): ?>
                    <div class="card mb-3">
                        <div class="card-body">Seu carrinho está vazio.</div>
                    </div>
                <?php endif; ?>
                <?php foreach ($listaDeProdutos as $itemCarrinho): ?>
                    <div class="card mb-3 card-item">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $itemCarrinho['image'] ?>" class="img-fluid rounded-start w-100 h-100 shadow" style="aspect-ratio: 16 / 9" alt="Foto Produto">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $itemCarrinho['name'] ?></h5>
                                    <p class="card-text">Quantidade: <?= $itemCarrinho['quantidade'] ?> </p>
                                    <p class="card-text"><small class="text-body-secondary">R$<?= $itemCarrinho['price'] * $itemCarrinho['quantidade'] ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="d-flex gap-2 mt-3">
                <button class="btn btn-primary">Finalizar Compra</button>
                <form action="#" method="POST" class="rounded bg-white">
                    <input type="hidden" name="action" value="limparCarrinho">
                    <button class="btn btn-outline-danger">Limpar carrinho</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark fixed-bottom">
        <div class="text-center py-3 text-white">
            &copy; 2026 Loja GoatChips. Todos os direitos reservados. Trabalho de Jorge Cannalonga e Eduardo Soares.
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>