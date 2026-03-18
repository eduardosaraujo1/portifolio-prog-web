<?php
session_start();

define('TRINTA_DIAS', 3600 * 24 * 30);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    // $password = $_POST['senha'] ?? null;
    $remember_me = ($_POST['lembreme'] ?? null) == 'on';

    // Sem banco de dados, a senha não é utilizada.
    if (isset($email)) {
        $_SESSION['user_email'] = $email;

        if ($remember_me) {
            setcookie('user_email', $email, time() + TRINTA_DIAS);
        }

        header("Location: dashboard.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .min-height-screen {
            min-height: 100vh;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body style="background-color: #f6f6f6;">
    <div class="container d-flex flex-column justify-content-center align-items-center min-height-screen">
        <form action="#" method="post" class="card p-4" style="width: 24rem;">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" value="<?= $_COOKIE['user_email'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="on" id="lembreme" name="lembreme">
                <label class="form-check-label" for="lembrebe">
                    Lembre-me
                </label>
            </div>
            <input type="submit" value="Entrar" class="btn btn-primary">
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>