<?php

$curso = [
    'DSM' => 'Desenvolvimento de Software Multiplataformas',
    'ADS' => 'Análise e Desenvolvimento de Sistemas',
    'GE' => 'Gestão Empresarial',
    'COMEX' => 'Comércio Exterior',
    'PQ' => 'Processos químicos'

];

$periodos = ['Matutino', 'Vespertino', 'Noturno'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <form method="post" action="#">
        <label>Nome</label><br>
        <input type="text" name="txtnome"><br><br>

        <label>Curso</label><br>
        <select name="txtcurso">
            <?php foreach ($curso as $chave => $valor) { ?>
                <option value="<?php echo $chave ?>">
                    <?php echo $valor ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label>Período</label><br>
        <?php foreach ($periodos as $p) { ?>
            <input type="radio" name="txtperiodo" value="">
            <?php echo $p; ?>
            <br><br>
        <?php } ?>
        <br><br>
        <input type="submit" value="Cadastrar"><br><br>
    </form>
</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aluno = [
        'nome' => $_POST['txtnome'],
        'curso' => $_POST['txtcurso'],
        'periodo' => $_POST['txtperiodo'],
    ];

    foreach ($aluno as $chave => $valor) {
        echo "<br>" . $chave . ": " . $valor;
    }
}

?>