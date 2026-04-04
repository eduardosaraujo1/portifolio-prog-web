<?php
require 'scripts/global.php';

auth_check();
$pageTitle = "Perguntas PHP - QuizMe";

/**
 * A partir da especificação JSON das perguntas, retornar um array de arrays associativos contendo info das perguntas.
 * 
 * A estrutura do array segue:
 * - id: identificador numérico da pergunta, utilizado durante o processamento da requisição GET
 * - formType: tipo de formulário a ser exibido ao usuário. Pode ser 'select', 'checkbox' ou 'radio'.
 * - text: texto da pergunta (a pergunta em si)
 * - alternatives: as alternativas da pergunta
 * - correct: tratando a lista de alternativas como um array, correct determina uma **lista de indexes** das alternativas corretas
 * 
 * @return array<array{id:int,formType:string,text:string,alternatives:array<string>,correct:array<int>}>
 */
function get_perguntas(): array
{
    $path = __DIR__ . '/../assets/perguntas.json';
    $jsons = file_get_contents($path);
    if ($jsons === false) throw new Exception("Não foi possível ler o arquivo '$path'. O caminho está correto?");
    $parse = json_decode($jsons, true);

    return $parse['data'];
}

$perguntas = get_perguntas();
$questionCount = count($perguntas);
?>

<?php require 'view/header.phtml' ?>
<div class="w-100 min-vh-100 pt-3 bg-dark text-light overflow-hidden">
    <h1 class="text-center">Quiz de PHP!</h1>
    <noscript>
        <p class="p-2 bg-danger text-light"><b>AVISO: </b>O quiz precisa de JavaScript para funcionar corretamente.</p>
    </noscript>
    <form action="resultado.php" method="post">
        <div class="js-question-carousel d-flex text-dark" data-carousel-index="0">
            <?php foreach ($perguntas as $idx => $pergunta): ?>
                <div class="w-100 flex-shrink-0 px-2">
                    <div class="card mx-auto w-100" style="max-width:36rem;min-height:20.25rem;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Pergunta <?= e($pergunta['id']) ?> - <?= e($pergunta['text']) ?></h5>
                            <?php if ($pergunta['formType'] === 'select'): ?>
                                <select required class="form-select" name="<?= e($pergunta['id']) ?>[]">
                                    <option value="" selected>Selecione uma opção</option>
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
                                                <input
                                                    <?= $pergunta['formType'] === 'checkbox' ? '' : 'required' ?>
                                                    class="form-check-input" type="<?= e($pergunta['formType']) ?>"
                                                    name="<?= e($pergunta['id']) ?>[]"
                                                    value="<?= e($i) ?>" id="<?= e($hash) ?>">
                                                <label class="form-check-label w-100" for="<?= e($hash) ?>"><?= e($alternativa) ?></label>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ol>
                            <?php endif; ?>
                            <div class="d-flex mt-auto">
                                <button type="button" class="btn btn-secondary js-btn-previous">Anterior</button>
                                <?php if ($idx < $questionCount - 1): ?>
                                    <button type="button" class="btn btn-primary js-btn-next ms-auto">Próximo</button>
                                <?php else: ?>
                                    <button class="btn btn-success js-btn-submit ms-auto">Enviar respostas</button>
                                <?php endif;  ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
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

        /**@param {number} idx */
        go(idx) {
            const len = this.carouselElem.childElementCount;

            this.carouselElem.dataset['carouselIndex'] = Math.min(Math.max(0, idx), len - 1);
            this.updateDOM();
        }
    }

    class QuizValidatorController {
        /**
         * @param {HTMLFormElement} formElem
         * @param {HTMLButtonElement} btnSubmitElem
         */
        constructor(formElem, btnSubmitElem) {
            this.formElem = formElem;
            this.btnSubmitElem = btnSubmitElem;
        }

        check() {
            this.btnSubmitElem.disabled = !this.formElem.checkValidity();
        }
    }

    let carouselController;
    document.addEventListener('DOMContentLoaded', () => {
        const quizForm = document.querySelector('form');
        const quizSubmitButton = document.querySelector('.js-btn-submit');
        carouselController = new CarouselController(document.querySelector(".js-question-carousel"));
        const quizValidatorController = new QuizValidatorController(
            quizForm,
            quizSubmitButton
        );

        for (const btn of document.querySelectorAll(".js-btn-next")) {
            btn.addEventListener('click', () => {
                carouselController.next();
            });
        }

        for (const btn of document.querySelectorAll(".js-btn-previous")) {
            btn.addEventListener('click', () => {
                carouselController.previous();
            });
        }

        for (const input of quizForm.querySelectorAll('select, input')) {
            input.addEventListener('input', () => {
                quizValidatorController.check();
            });
        }

        quizValidatorController.check();
        carouselController.updateDOM();
    });
</script>
<?php require 'view/footer.phtml'; ?>