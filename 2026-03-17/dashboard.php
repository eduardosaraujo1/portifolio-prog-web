<?php

require 'middleware/auth.php';

$dados = json_decode(file_get_contents("data/products.json"), true);
$produtos = $dados['products'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .min-height-screen {
            min-height: 100vh;
        }

        .products-container {
            display: grid;
            gap: 4px;
            grid-template-columns: repeat(4, minmax(13rem, 1fr));
        }

        .produto-image {
            aspect-ratio: 16 / 9;
        }

        @media only screen and (width < 900px) {
            .products-container {
                display: grid;
                gap: 4px;
                grid-template-columns: repeat(1, minmax(13rem, 1fr));
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body style="background-color: #f6f6f6;">
    <nav class="navbar  sticky-top navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="#">Loja Microchips</a>
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
    <div class="container mt-4 products-container">
        <?php foreach ($produtos as $produto): ?>
            <div class="card">
                <img src="<?= $produto['image'] ?>" class="card-img-top produto-image" alt="exemplo">
                <div class="card-body">
                    <h5 class="card-title"><?= $produto['name'] ?></h5>
                    <p class="card-text">
                        R$<?php echo $produto['price'] ?>
                    </p>
                    <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>