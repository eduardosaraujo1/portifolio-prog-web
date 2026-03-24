<?php
session_start();

if (isset($_SESSION['user_email'])) {
    header("Location: dashboard.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    define('TRINTA_DIAS', 3600 * 24 * 30);

    $email = $_POST['email'] ?? null;
    $remember_me = ($_POST['lembreme'] ?? null) == 'on';
    // Sem banco de dados, a senha não é utilizada.
    $password = $_POST['senha'] ?? null;

    if (strlen($password) < 8) {
        header('Location: login.php?err=A senha deve ter 8 caracteres ou mais.');
        die();
    }

    if (empty($email)) {
        header('Location: login.php');
        die();
    }

    $_SESSION['user_email'] = $email;

    if ($remember_me) {
        setcookie('user_email', $email, time() + TRINTA_DIAS);
    }

    header("Location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="shortcut icon" href="favicon.jpg" type="image/x-icon">
    <style>
        .min-height-screen {
            min-height: 100vh;
        }

        .w-login-card {
            width: clamp(170px, 100%, 24rem);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body style="background-color: #f6f6f6;">
    <div class="container d-flex flex-column justify-content-center align-items-center min-height-screen">
        <form action="#" method="post" class="card p-4 w-login-card">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" value="<?= $_COOKIE['user_email'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
                <div class="text-danger" id="errMessage">
                    <?= $_GET['err'] ?? '' ?>
                </div>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="on" id="lembreme" name="lembreme">
                <label class="form-check-label" for="lembreme">
                    Lembre-me
                </label>
            </div>
            <input type="submit" value="Entrar" class="btn btn-primary">
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>