<?php
session_start();

// Ver se o usuário está logado
if (empty($_SESSION['usuario'])) {
    header("Location: login.php");
    die();
}

require "php/produtos.php";

$carrinho = $_SESSION['carrinho'] ?? [];
$total = 0;
$produtosCarrinho = [];

foreach ($produtos as $produto) {
    if (isset($carrinho[$produto['id']])) {
        $quantidade = $carrinho[$produto['id']];
        $total += $quantidade * $produto['preco'];
        array_push($produtosCarrinho, [
            'id' => $produto['id'],
            'nome' => $produto['nome'],
            'imagem' => $produto['imagem'],
            'preco' => $produto['preco'],
            'quantidade' => $quantidade
        ]);
    }
}
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
                        <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="carrinho.php">Carrinho</a>
                    </li>
                </ul>
                <a href="php/sair.php" class="btn btn-outline-danger">Sair</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h3>Seus produtos:</h3>
        <div class="d-flex gap-2">
            <div class="d-flex flex-column gap-1" style="grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr))">
                <?php if (empty($produtosCarrinho)) { ?>
                    <div class="card" style="width:540px;">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title">Seu carrinho está vazio.</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <?php foreach ($produtosCarrinho as $p) { ?>
                    <div class="card" style="max-width:540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?php echo $p['imagem'] ?>" class="img-fluid rounded-start w-100 object-fit-contain" style="aspect-ratio:4/3" alt="produto">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Preço: R$<?php echo number_format($p['preco'], 2, ',', '.') ?></p>
                                    <p class="card-text"><small class="text-body-secondary">Quantidade: <?php echo $p['quantidade'] ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="d-flex flex-column">
                <h4>Total: R$<?php echo number_format($total, 2, ',', '.') ?></h4>
                <div class="hstack gap-1">
                    <a href="dashboard.php" class="btn btn-primary">Finalizar compra</a>
                    <a href="php/limpar-carrinho.php" class="btn btn-danger">Limpar carrinho</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>