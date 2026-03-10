<?php

$dados = ['Ana', 'DSM', '1º ciclo', 'vespertino', 'Fatec', 'superior'];


foreach ($dados as $d) {
    echo "<br>" . $d;
}


$elementos = count($dados);

echo "Nome: " . $dados[0];

for ($i = 0; $i <= 2; $i++) {
    echo "<br>" . $dados[$i];
}


$notas = [
    'p1' => 8,
    'p2' => 7.5,
    'trabalho' => 6

];

$soma = 0;

foreach ($notas as $valor) {
    echo "<br>" . $valor;
    $soma = $soma + $valor;
}

$media = $soma / 3;

$notas['media'] = number_format($media, 2);

echo "<hr>";

foreach ($notas as $chave => $valor) {
    echo "<br>" . $chave . ":" . $valor;
}



echo "<br>Prova: " . $notas['p1'];
