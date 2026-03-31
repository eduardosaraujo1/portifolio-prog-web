<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: quiz.php");
    die();
}

function corrigir($respostas, $gabarito)
{
    $qtAcertos = 0;

    foreach ($respostas as $p => $res) {
        if ($res == $gabarito[$p]) {
            $qtAcertos += 1;
        } else {
            echo "RESPOSTA INCORRETA: <br>";
            var_dump($res);
            var_dump($gabarito[$p]);
            echo "<br>FIM RESPOSTA INCORRETA";
        }
    }
    var_dump($respostas);
    echo '<br><br>';
    var_dump($gabarito);
    echo '<br><br>';

    return $qtAcertos;
}

/*
GABARITO
0: pergunta1 → "Exibir Dados"
1: pergunta2 → "$"
2: pergunta3 → "$nome_usuario"
3: pergunta4 → "GET"
4: "pergunta5[]" → "Mais seguro para envio de dados"
5: "pergunta5[]" → "Permite envio de grande volume de dados"
6: pergunta6 → "password"
7: pergunta7 → "radio"
8: pergunta8 → "Multiplas opções"
9: pergunta9 → "Lista Suspensa"
10: pergunta10 → "if"
11: pergunta11 → "for"
12: pergunta12 → "Uma variável com múltiplos valores"
13: pergunta13 → "function"
14: pergunta14 → "Armazenar no servidor"
15: pergunta15 → "No navegador"
16: pergunta16 → "file_get_contents"
17: "pergunta17[]" → "Faz requisições HTTP"
18: "pergunta17[]" → "Consome APIs"
19: pergunta18 → "$_POST"
20: pergunta19 → "isset()"
21: pergunta20 → "session_start()"
*/
$gabarito = [
    "pergunta1" => "Exibir Dados",
    "pergunta2" => "$",
    "pergunta3" => "\$nome_usuario",
    "pergunta4" => "GET",
    "pergunta5" => [
        "Mais seguro para envio de dados",
        "Permite envio de grande volume de dados"
    ],
    "pergunta6" => "password",
    "pergunta7" => "radio",
    "pergunta8" => "Multiplas opções",
    "pergunta9" => "Lista Suspensa",
    "pergunta10" => "if",
    "pergunta11" => "for",
    "pergunta12" => "Uma variável com múltiplos valores",
    "pergunta13" => "function",
    "pergunta14" => "Armazenar no servidor",
    "pergunta15" => "No navegador",
    "pergunta16" => "file_get_contents",
    "pergunta17" => [
        "Faz requisições HTTP",
        "Consome APIs"
    ],
    "pergunta18" => "$_POST",
    "pergunta19" => "isset()",
    "pergunta20" => "session_start()"
];
$correcao = corrigir($_POST, $gabarito);
var_dump($correcao);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>


</body>

</html>