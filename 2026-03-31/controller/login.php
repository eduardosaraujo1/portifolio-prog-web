<?php
if (isset($_SESSION['email_user'])) {
    redirect('quiz');
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

<?= render_view('partial.header', ['title' => 'Login - QuizMe']); ?>
<div class="container d-flex justify-content-center mt-3">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center fw-bold">QuizMe</h3>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="nome@example.com" name="email" value="<?= $emailCache ?>">
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
<?= include render_view('partial.footer'); ?>