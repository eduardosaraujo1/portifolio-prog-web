<?php
session_start();

if (! empty($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null; // Operador '??': se o atributo 'email' não exisitr no POST, simplesmente definir a variável como nulo.
    $password = $_POST['password'] ?? null;
    $rememberme = ($_POST['remember'] ?? null) === "sim";

    if ($rememberme) {
        define("TRINTA_DIAS", 3600 * 24 * 30);
        setcookie("email", $email, time() + TRINTA_DIAS);
    }

    $_SESSION['usuario'] = $email;
    header("Location: dashboard.php");
    die(); // para a execução do código PHP (previne o HTML de ser renderizado e faz a request ser um pouco mais rápida)
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

<body style="background-color: #f6f6f6">
    <div class="container mt-4 d-flex justify-content-center">
        <form action="#" method="post" class="card" style="width: 24rem">
            <div class="card-body">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input required type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo $_COOKIE['email'] ?? '' ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha:</label>
                    <input required type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="sim" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Lembre-me
                    </label>
                </div>
                <button class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>