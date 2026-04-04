<?php
require 'scripts/global.php';
require 'model/perguntas.php';

if (!isset($_SESSION['email_user'])) {
    redirect('/');
    die();
}

$pageTitle = "Perguntas PHP - QuizMe";

$perguntas = get_perguntas();
?>

<?php require 'view/header.phtml' ?>
<div class="w-100 min-vh-100 pt-3 bg-dark text-light overflow-hidden">
    <h1 class="text-center">Quiz de PHP!</h1>
    <noscript>
        <p class="p-2 bg-danger text-light"><b>AVISO: </b>O quiz precisa de JavaScript para funcionar corretamente.</p>
    </noscript>
    <div class="js-question-carousel d-flex text-dark" data-carousel-index="0">
        <?php foreach ($perguntas as $pergunta): ?>
            <div class="w-100 flex-shrink-0 px-2">
                <div class="card mx-auto w-100" style="max-width:36rem;min-height:20.25rem;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Pergunta <?= e($pergunta['id']) ?> - <?= e($pergunta['text']) ?></h5>
                        <?php if ($pergunta['formType'] === 'select'): ?>
                            <select class="form-select" name="<?= e($pergunta['id']) ?>[]" aria-label="Drop list para pergunta <?= e($pergunta['id']) ?>">
                                <option selected>Selecione uma opção</option>
                                <?php foreach ($pergunta['alternatives'] as $i => $alternativa): ?>
                                    <option value="<?= e($i) ?>"><?= e($alternativa) ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <ol class="list-group list-group-flush list-group-numbered-alpha">
                                <?php foreach ($pergunta['alternatives'] as $i => $alternativa): ?>
                                    <?php
                                    // Problema: quero que o 'id' seja único na página toda, para que assim o label aponte para o item certo
                                    // Não há nenhum identificador único de alternativa de pergunta (apesar de existir $pergunta['id'] e $i, combinar esses dois números é complicado)
                                    // Solução simples: usar um hash
                                    $hash = md5($alternativa);
                                    ?>
                                    <li class="list-group-item d-flex gap-2">
                                        <div class="form-check w-100">
                                            <input class="form-check-input" type="<?= e($pergunta['formType']) ?>" name="<?= e($pergunta['id']) ?>[]"
                                                value="<?= e($i) ?>" id="<?= e($hash) ?>">
                                            <label class="form-check-label w-100" for="<?= e($hash) ?>"><?= e($alternativa) ?></label>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        <?php endif; ?>
                        <div class="d-flex mt-auto">
                            <button class="btn btn-secondary js-btn-previous">Anterior</button>
                            <button class="btn btn-primary js-btn-next ms-auto">Próximo</button>
                            <!-- <button class="btn btn-success js-btn-next ms-auto">Enviar respostas</button> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    class CarouselController {
        /**
         * @param {HTMLDivElement} carouselElem
         */
        constructor(carouselElem) {
            this.carouselElem = carouselElem;
        }

        updateDOM() {
            const idx = this.carouselElem.dataset['carouselIndex'] ?? 0;
            this.carouselElem.style.transform = `translateX(${-idx * 100}%)`
        }

        next() {
            const cur = this.carouselElem.dataset['carouselIndex'];
            const len = this.carouselElem.childElementCount;

            this.carouselElem.dataset['carouselIndex'] = Math.min(len - 1, +cur + 1);

            this.updateDOM();
        }

        previous() {
            const cur = this.carouselElem.dataset['carouselIndex'];

            this.carouselElem.dataset['carouselIndex'] = Math.max(0, cur - 1);
            this.updateDOM();
        }
    }

    document.addEventListener('DOMContentLoaded', () => {

        const carouselController = new CarouselController(document.querySelector(".js-question-carousel"));

        for (const btn of document.querySelectorAll(".js-btn-next")) {
            btn.addEventListener('click', carouselController.next.bind(carouselController));
        }

        for (const btn of document.querySelectorAll(".js-btn-previous")) {
            btn.addEventListener('click', carouselController.previous.bind(carouselController));
        }

        carouselController.updateDOM();
    });
</script>
<?php require 'view/footer.phtml'; ?>