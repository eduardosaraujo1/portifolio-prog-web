<?php

require 'middleware/auth.php';

$dados = json_decode(file_get_contents("data/products.json"), true);
/** @var array<string,int> Carrinho */
$carrinho = $_SESSION['carrinho'] ?? [];
$produtos = $dados['products'] ?? [];
$cartEmpty = empty($carrinho);

/**
 * @param array{id:int,name:string,price:double,image:string}[] $listaProdutos
 * @return string[]|null
 */
function encontrarProdutoPorId(string $id, array $listaProdutos): array|null
{
    foreach ($listaProdutos as $p) {
        if ($p['id'] === (int) $id) {
            return $p;
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['action'];

    if ($acao === "limparCarrinho") {
        $_SESSION['carrinho'] = [];
        header("Location: carrinho.php");
    } else if ($acao === "finalizarCompra") {
        $_SESSION['carrinho'] = [];
        header("Location: dashboard.php");
    } else if ($acao === "removerItem") {
        $item = $_POST['productId'] ?? null;
        if (! empty($item)) {
            unset($_SESSION['carrinho'][$item]);
        }
        header("Location: carrinho.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#">Loja Microchips</a>
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
    <div class="container mt-4 flex-fill">
        <!-- Debug: exibe o conteúdo da variável $_SESSION -->
        <!-- <pre class="bg-dark text-white rounded p-2"><?= json_encode($_SESSION, JSON_PRETTY_PRINT) ?></pre> -->
        <div class="cart-container">
            <div class="cart-item-list">
                <?php if ($cartEmpty): ?>
                    <div class="card mb-3 w-100">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title d-block" style="width: 540px;">Seu carrinho está vazio.</h5>
                                <p class="card-text">Tente adicionar um produto</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                foreach ($carrinho as $id => $quantidade):
                    // Temos o ID do produto, vou usar essa função pra obter os dados do produto e colocar na variável
                    $produto = encontrarProdutoPorId($id, $produtos);
                    // Se, por acaso, o encontrarProdutoPorId não tiver encontrado nenhum produto, use
                    // a diretiva 'continue', que faz o foreach ir pro próximo valor sem renderizar o HTML abaixo
                    if ($produto === null) {
                        continue;
                    }
                ?>
                    <div class="card mb-3 card-item">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $produto['image'] ?>" class="w-100 h-100 img-fluid produto-image rounded-start shadow" alt="Foto Produto">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produto['name'] ?></h5>
                                    <p class="card-text">Quantidade: <?= $quantidade ?></p>
                                    <p class="card-text"><small class="text-body-secondary">R$<?= $produto['price'] ?></small></p>
                                </div>
                            </div>
                            <div class="col-md-2 d-grid" style="place-items:center">
                                <form action="#" method="post">
                                    <input type="hidden" name="action" value="removerItem">
                                    <input type="hidden" name="productId" value="<?= $produto['id'] ?>">
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button></input>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="d-flex gap-2">
                <form action="#" method="POST">
                    <input type="hidden" name="action" value="finalizarCompra" />
                    <button <?= $cartEmpty ? 'disabled' : '' ?> class="btn btn-primary w-fit-content">Finalizar Compra</button>
                </form>
                <form action="#" method="post" class="bg-dark rounded">
                    <input type="hidden" name="action" value="limparCarrinho" />
                    <button <?= $cartEmpty ? 'disabled' : '' ?> class="btn btn-outline-danger">Limpar carrinho</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark z-3 position-sticky bottom-0">
        <div class="text-center py-3 text-white">
            &copy; 2026 Loja Microchips. Todos os direitos reservados. Trabalho de Jorge Cannalonga e Eduardo Soares.
        </div>
    </footer>

    <div class="bg-scrim"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>