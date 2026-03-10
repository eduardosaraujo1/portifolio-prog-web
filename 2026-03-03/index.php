<!-- Feito por Eduardo Soares e Jorge Cannalonga -->

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pizzaria</title>
  <link rel="shortcut icon" href="icon.webp" type="image/x-icon" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
</head>

<body class="bg-dark">
  <div class="container d-flex justify-content-center mt-4 gap-2">
    <div class="card bg-dark" style="width: 36rem">
      <form class="card-body" action="#" method="post">
        <h3 class="fw-bold text-warning">Pizzatech</h3>
        <div class="mb-3">
          <!-- 
        Nome do Cliente (text)
        Sabor da pizza (select)
        Borda Recheada (radio)
        Bebidas (checkbox)
        -->
          <label for="nome" class="form-label text-white fw-bold">Digite seu nome:</label>
          <input
            type="text"
            class="form-control"
            id="nome"
            name="nome"
            required />
        </div>
        <label class="text-white fw-bold">Selecione o sabor da pizza: </label>
        <select
          class="form-select"
          aria-label="Exemplo de select"
          name="sabor">
          <option value="Mussarela">Mussarela – R$50,00</option>
          <option value="Calabresa">Calabresa – R$52,00</option>
          <option value="Portuguesa">Portuguesa – R$60,00</option>
        </select>
        <br />
        <label class="text-white fw-bold">Borda Recheada:</label>
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="borda_recheada"
            value="sim"
            id="radio1" />
          <label class="form-check-label text-white" for="radio1">
            Sim – adiciona R$5,00 ao valor total
          </label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="borda_recheada"
            value="nao"
            id="radio2"
            required />
          <label class="form-check-label text-white" for="radio2">
            Não – sem custo adicional
          </label>
        </div>
        <br />
        <label class="text-white fw-bold">Acompanhamentos:</label>
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value="sim"
            name="RefriLata"
            id="RefriLata" />
          <label class="form-check-label text-white" for="RefriLata">
            Refrigerante Lata - R$8,00
          </label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value="sim"
            name="Refri2L"
            id="Refri2L" />
          <label class="form-check-label text-white" for="Refri2L">
            Refrigerante 2L – R$20,00
          </label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value="sim"
            name="Agua"
            id="Agua" />
          <label class="form-check-label text-white" for="Agua">
            Água – R$5,00
          </label>
        </div>
        <br />
        <button type="submit" class="btn btn-warning rounded-pill text-white">
          Enviar
        </button>
      </form>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] === "POST"): ?>
      <div class="card bg-warning" style="width: 18rem">
        <div class="card-body">
          <h3 class="text-dark fw-bold">Resumo do Pedido</h3>

          <?php
          $preco = 0;

          $exibirRefriLata = $_POST['RefriLata'] ?? 'nao';
          $exibirRefri2l = $_POST['Refri2L'] ?? 'nao';
          $exibirAgua = $_POST['Agua'] ?? 'nao';

          $sabor = $_POST['sabor'] ?? null;
          $bordaRecheada = $_POST['borda_recheada'] ?? 'nao';

          // Preço do sabor da pizza
          if (isset($sabor)) {
            if ($sabor === 'Mussarela') $preco += 50;
            if ($sabor === 'Calabresa') $preco += 52;
            if ($sabor === 'Portuguesa') $preco += 60;
          }

          // Preço borda recheada
          if ($bordaRecheada) $preco += 5;

          // Preço acompanhamentos
          if (isset($_POST['RefriLata'])) {
            $preco += 8;
          }
          if (isset($_POST['Refri2L'])) {
            $preco += 20;
          }
          if (isset($_POST['Agua'])) {
            $preco += 5;
          }
          ?>
          <b>Nome: </b> <?php echo $_POST['nome'] ?>
          <br />
          <b>Sabor da Pizza: </b><?php echo $_POST['sabor'] ?? 'N/A' ?>
          <br />
          <b>Borda Recheada: </b><?php echo ($bordaRecheada == 'sim' ? 'Sim' : 'Não') ?>
          <br />
          <b>Acompanhamentos: </b>
          <ul>
            <?php
            if ($exibirRefriLata == "sim") {
              echo "<li>Refrigerante Lata</li>";
            }
            ?>
            <?php
            if ($exibirRefri2l == 'sim') {
              echo "<li>Refrigerante 2L</li>";
            }
            ?>
            <?php
            if ($exibirAgua == 'sim') {
              echo "<li>Água</li>";
            }
            ?>
          </ul>
          <hr>
          <!-- number_format: faz o número '5' ficar como '5,00' -->
          <b>Total: </b><?php echo 'R$' . number_format($preco, 2, ',', '') ?>
        </div>
      </div>
      <script>
        console.table(JSON.parse(`<?php echo json_encode($_POST); ?>`));
      </script>
    <?php endif; ?>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>