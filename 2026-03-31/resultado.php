<?php
require 'scripts/global.php';
require 'scripts/get-perguntas.php';

auth_check();
$pageTitle = "Resultado - QuizMe";

function determinar_mensagem_desempenho(int $qtAcertos): string
{
    if ($qtAcertos < 11) {
        return 'Precisa revisar';
    } else if ($qtAcertos < 18) {
        return 'Quase lá';
    } else {
        return 'Excelente';
    }
}

function determinar_cor_desempenho(int $qtAcertos): string
{
    if ($qtAcertos < 11) {
        return 'danger';
    } else if ($qtAcertos < 18) {
        return 'warning';
    } else {
        return 'primary';
    }
}

function compare_answers(array $submission, array $correct): int
{
    $acertos = 0;

    foreach ($correct as $questionId => $correctAnswers) {
        if (!isset($submission[$questionId])) {
            continue;
        }

        $userAnswers = $submission[$questionId];

        // normaliza (ordem não importa)
        sort($userAnswers);
        sort($correctAnswers);

        if ($userAnswers === $correctAnswers) {
            $acertos++;
        }
    }

    return $acertos;
}

function get_frase_motivacional()
{
    $c = curl_init("https://motivacional.top/api.php?acao=aleatoria");

    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($c);

    if (curl_errno($c)) {
        curl_close($c);
        return "Continue tentando, você está no caminho certo!";
    }

    curl_close($c);

    $data = json_decode($response, true);

    if (
        !$data ||
        $data['status'] !== 'sucesso' ||
        empty($data['dados'][0]['frase'])
    ) {
        return "A persistência leva ao sucesso.";
    }

    $frase = $data['dados'][0]['frase'];
    $autor = $data['dados'][0]['autor'] ?: 'Autor desconhecido';

    return "{$frase} — {$autor}";
}

//{"1":["1"],"2":["1"],"3":["1"],"4":["1"],"5":["1","2"],"6":["2"],"7":["1"],"8":["1"],"9":["1"],"10":["2"],"11":["2"],"12":["1"],"13":["1"],"14":["1"],"15":["1"],"16":["1"],"17":["0","1"],"18":["1"],"19":["1"],"20":["1"]} 
$perguntas = array_reduce(get_perguntas(), function ($carry, $item) {
    $carry[$item['id']] = $item['correct'];
    return $carry;
}, []);

//EXEMPLO DO $_POST;
//{"1":["1"],"2":["1"],"3":["1"],"4":["1"],"5":["1","2"],"6":["2"],"7":["1"],"8":["1"],"9":["1"],"10":["2"],"11":["2"],"12":["1"],"13":["1"],"14":["1"],"15":["1"],"16":["1"],"17":["0","1"],"18":["1"],"19":["1"],"20":["1"]}
$qtdeAcertos = compare_answers($_POST, $perguntas);
$mensagem = determinar_mensagem_desempenho($qtdeAcertos);
$corBadge = determinar_cor_desempenho($qtdeAcertos);
$fraseMotivacional = get_frase_motivacional();
?>

<?php require 'view/header.phtml' ?>
<div class="container-fluid bg-dark min-vh-100 py-5">
    <div class="card mx-auto w-100" style='max-width:36rem'>
        <div class="card-header">
            <h4 class="mb-0">Resultado do Quiz</h4>
        </div>
        <div class="card-body">
            <div class="mb-4 w-100 text-center">
                <h5>Resultado:</h5>
                <h2 class="mb-1">
                    <?= e($qtdeAcertos) ?>/<?= count($perguntas) ?>
                </h2>
                <h3 class="mb-0">
                    <span class="badge bg-<?= $corBadge ?>"><?= e($mensagem) ?></span>
                </h3>
            </div>
            <div class="mb-4 text-center">
                <h5>Realizado por:
                    <?= e($_SESSION['nome_usuario'] ?? 'N/A') ?> |
                    <strong><?= e($_COOKIE['emailCache'] ?? 'N/A') ?></strong>
                </h5>
            </div>
            <hr>
            <div class="mb-4">
                <blockquote class="blockquote">
                    <i>
                        <p class="mb-0"><?= e($fraseMotivacional) ?></p>
                    </i>
                </blockquote>
            </div>
            <div class="d-flex flex-wrap gap-2 justify-content-end">
                <a href="quiz.php" class="btn btn-secondary">
                    Responder novamente
                </a>
                <a href="logout.php" class="btn btn-danger">
                    Encerrar sessão
                </a>
            </div>
        </div>
    </div>
</div>
<?php require 'view/footer.phtml' ?>