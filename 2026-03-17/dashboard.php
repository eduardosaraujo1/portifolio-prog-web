<?php

require 'middleware/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['addToCart'] ?? null;

    // Por simplicidade, omitirei a etapa de verificar se $productId é de fato um ID de produto válido

    if ($productId !== null) {
        addToCart($productId);
    }

    header('Location: dashboard.php');
    die();
}

// Ler produtos cadastrados
$dados = json_decode(file_get_contents("data/products.json"), true);
$produtos = $dados['products'];

// Cuidar do POST
function addToCart(string $productId)
{
    // Certificar-se que um carrinho já existe.
    if (! isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Se produto não estivesse no carrinho antes, inicialize-o com quantidade padrão 0
    if (! isset($_SESSION['carrinho'][$productId])) {
        $_SESSION['carrinho'][$productId] = 0;
    }

    // Acrescentar valor ao carrinho
    $_SESSION['carrinho'][$productId]++;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="shortcut icon" href="favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body class="d-flex flex-column vh-100">
    <nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="dashboard.php">Loja GoatChips</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">
                            <i class="bi bi-cart me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrinho.php">
                            <i class="bi bi-cart me-2"></i>Carrinho
                        </a>
                    </li>
                </ul>
                <span class="me-4 text-white">Olá, <?= $_SESSION['user_email'] ?></span>
                <div class="nav-item"><a href="logout.php" class="link-danger text-decoration-none fw-bold" role="button">Sair</a></div>
            </div>
        </div>
    </nav>
    <div class="overflow-y-scroll flex-fill">
        <div class="container my-4">
            <!-- <pre class="bg-dark text-white rounded p-2"><?= json_encode($_SESSION, JSON_PRETTY_PRINT) ?></pre> -->
            <div class="products-container">
                <?php foreach ($produtos as $produto): ?>
                    <div class="card">
                        <img src="<?= $produto['image'] ?>" class="card-img-top produto-image bg-white" alt="foto-produto">
                        <div class="card-body vstack">
                            <h5 class="card-title"><?= $produto['name'] ?></h5>
                            <p class="card-text">
                                R$<?php echo $produto['price'] ?>
                            </p>
                            <form action="dashboard.php" method="POST" class="mt-auto">
                                <input type="hidden" name="addToCart" value="<?= $produto['id'] ?>">
                                <button class="btn btn-primary ">Adicionar ao carrinho</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer class="bg-dark">
        <div class="text-center py-3 text-white">
            &copy; 2026 Loja GoatChips. Todos os direitos reservados. Trabalho de Jorge Cannalonga e Eduardo Soares.
        </div>
    </footer>
    <div class="bg-scrim"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>