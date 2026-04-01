<?php
require 'scripts/autoload.php';

if (!isset($_SESSION['email_user'])) {
    redirect('/');
    die();
}
?>

<?= render_view('header.phtml', ['title' => 'Responda as perguntas - QuizMe']); ?>
<div class="container-fluid overflow-x-hidden bg-dark text-light min-vh-100 pt-3">
    <h1 class="text-center">Quiz de PHP!</h1>
    <div class="question-carousel d-flex" style="transform:translateX(calc(0*-100%))">
        <div class="question-carousel__item">
            <div class="card question-card">
                <div class="card-body">
                    <h5 class="card-title">PERGUNTA N - Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis asperiores odit inventore veritatis sed accusantium quo repudiandae eaque voluptatem ipsum?</h5>
                </div>
                <ol class="list-group">
                    <li class="list-group-item d-flex gap-2">
                        a)
                        <div class="form-check w-100">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                            <label class="form-check-label w-100" for="radioDefault1">OPT1</label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-2">
                        b)
                        <div class="form-check w-100">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2">
                            <label class="form-check-label w-100" for="radioDefault2">OPT2</label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-2">
                        c)
                        <div class="form-check w-100">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault3">
                            <label class="form-check-label w-100" for="radioDefault3">OPT3</label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-2">
                        c)
                        <div class="form-check w-100">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault4">
                            <label class="form-check-label w-100" for="radioDefault4">OPT4</label>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?= render_view('footer.phtml'); ?>