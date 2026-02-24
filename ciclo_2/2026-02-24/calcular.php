<?php

$num = (int) $_GET["num"];

$unidade = $num % 10;
$dezena = (int)($num / 10) % 10;
$centena = (int)($num / 100);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Separador de algarismos</title>
</head>
<body>
    <ul>
        <li>Centena: <?= $centena?></li>
        <li>Dezena: <?= $dezena?></li>
        <li>Unidade: <?= $unidade?></li>
    </ul>
</body>
</html>