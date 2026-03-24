<?php
session_start();

// Ver se o usuário está logado
if (empty($_SESSION['usuario'])) {
    header("Location: login.php");
    die();
}

require "php/produtos.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Loja Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrinho.php">Carrinho</a>
                    </li>
                </ul>
                <a href="php/sair.php" class="btn btn-outline-danger">Sair</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h3>Olá, <?php echo $_SESSION['usuario'] ?></h3>
        <div class="d-grid flex-wrap gap-2" style="grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr))">
            <?php foreach ($produtos as $p) { ?>
                <div class="card">
                    <img src="<?php echo $p['imagem'] ?>" class="card-img-top object-fit-contain" alt="produto" style="aspect-ratio:4/3;">
                    <div class="card-body">
                        <h5 class="card-title text-truncate"><?php echo $p['nome'] ?></h5>
                        <p class="card-text">Preço: R$ <?php echo $p['preco']; ?></p>
                        <a href="php/post-carrinho.php?idProduto=<?php echo $p['id'] ?>" class="btn btn-primary">Adicionar ao carrinho</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>