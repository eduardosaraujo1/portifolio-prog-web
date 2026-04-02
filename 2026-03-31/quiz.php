<?php
require 'scripts/global.php';
$pageTitle = "Perguntas PHP - QuizMe";

if (!isset($_SESSION['email_user'])) {
    redirect('/');
    die();
}
?>

<?php require 'view/header.phtml' ?>
<div class="container-fluid overflow-x-hidden bg-dark text-light min-vh-100 pt-3">
    <h1 class="text-center">Quiz de PHP!</h1>
    <div class="js-question-carousel d-flex text-dark" data-carousel-index="0" style="transform:translateX(calc(0*-100%))">
        <div class="w-100 flex-shrink-0">
            <div class="card mx-auto w-100" style="max-width:36rem">
                <div class="card-body">
                    <h5 class="card-title">PERGUNTA N - Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis asperiores odit inventore veritatis sed accusantium quo repudiandae eaque voluptatem ipsum?</h5>
                </div>
                <ol class="list-group list-group-numbered-alpha">
                    <li class="list-group-item d-flex gap-2">
                        <div class="form-check w-100">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                            <label class="form-check-label w-100" for="radioDefault1">OPT</label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-2">
                        <div class="form-check w-100">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault2">
                            <label class="form-check-label w-100" for="radioDefault2">OPT</label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-2">
                        <div class="form-check w-100">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault3">
                            <label class="form-check-label w-100" for="radioDefault3">OPT</label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex gap-2">
                        <div class="form-check w-100">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault4">
                            <label class="form-check-label w-100" for="radioDefault4">OPT</label>
                        </div>
                    </li>
                </ol>
                <div class="d-flex py-1 px-4" data-show-finish="false">
                    <button class="btn btn-secondary js-btn-previous">Anterior</button>
                    <button class="btn btn-primary js-btn-next ms-auto">Próximo</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>
<?php require 'view/footer.phtml'; ?>