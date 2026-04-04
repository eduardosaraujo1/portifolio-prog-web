<?php
require 'scripts/global.php';
$pageTitle = "Login - QuizMe";

if (isset($_SESSION['nome_usuario'])) {
    redirect('quiz.php');
}

$emailCache = $_COOKIE['emailCache'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? null;
    $nome = $_POST['nome'] ?? null;

    if (empty($email) || empty($nome)) {
        redirect('/');
        die();
    }

    setcookie('emailCache', $email, time() + 30 * 60 * 60);

    $_SESSION['nome_usuario'] = $nome;

    redirect('/quiz.php');
    die();
}
?>

<?php require 'view/header.phtml'; ?>
<div class="container-fluid d-flex align-items-center justify-content-center bg-dark min-vh-100 pt-3">
    <div class="card w-100" style="max-width:20rem;">
        <div class="card-body">
            <h3 class="text-center fw-bold">QuizMe</h3>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input
                        required
                        type="text"
                        class="form-control"
                        id="nome"
                        name="nome">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        required
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="nome@example.com"
                        name="email"
                        value="<?= $emailCache ?>">
                </div>
                <button class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</div>
<?php require 'view/footer.phtml'; ?>