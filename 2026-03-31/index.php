<?php
session_start();

if (isset($_SESSION['email_user'])) {
    header("Location: quiz.php");
    die();
}

$emailCache = $_COOKIE['emailCache'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;

    if (!isset($email)) {
        header('Location: .');
        die();
    }

    setcookie('emailCache', $email, time() + 30 * 60 * 60);

    $_SESSION['email_user'] = $email;

    header("Location: quiz.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - QuizMe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center mt-3">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center fw-bold">QuizMe</h3>
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?= $emailCache ?>">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <button class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>