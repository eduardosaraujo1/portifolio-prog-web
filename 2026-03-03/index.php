
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pizzaria</title>
    <link rel="shortcut icon" href="icon.webp" type="image/x-icon">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="bg-dark">
    <?php
    var_dump($_POST);
    echo '<p class="text-white">'.$_POST['nome'].'</p>'
    ?>
    <div class="container d-flex justify-content-center mt-4">
      <div class="card bg-dark" style="width: 18rem">
        <form class="card-body" action="#" method="post">
          <h3 class="fw-bold text-warning">Pizzatech</h3>
          <div class="mb-3">
            <!-- 
        Nome do Cliente (text)
        Sabor da pizza (select)
        Borda Recheada (radio)
        Bebidas (checkbox)
        -->
            <label for="nome" class="form-label text-white"
              >Digite seu nome:</label
            >
            <input type="text" class="form-control" id="nome" name="nome" />
          </div>
          <label class="text-white">Selecione o sabor da pizza: </label>
          <select class="form-select" aria-label="Exemplo de select" name="sabor">
            <option value="Mussarela">Mussarela – R$50,00</option>
            <option value="Calabresa">Calabresa – R$52,00</option>
            <option value="Portuguesa">Portuguesa – R$60,00</option>
          </select>
          <br />
          <label class="text-white">Borda Recheada:</label>
          <div class="form-check">
            <input
              class="form-check-input"
              type="radio"
              name="borda_recheada"
              value="sim"
              id="radio1"
            />
            <label class="form-check-label text-white" for="radio1">
              Sim – adiciona R$5,00 ao valor total
            </label>
          </div>
          <div class="form-check">
            <input
              class="form-check-input"
              type="radio"
              name="borda_recheada"
              id="radio2"
              checked
            />
            <label class="form-check-label text-white" for="radio2">
              Não – sem custo adicional
            </label>
          </div>
          <button>Enviar</button>
        </form>
      </div>

      <div class="card bg-warning" style="width: 18rem">
        <div class="card-body">
          <h3 class="text-light fw-bold text-center">Resumo do Pedido</h3>
          <!-- 
            Nome do cliente 
            Sabor da pizza selecionada 
            Se a borda foi adicionada ou não 
            Lista das bebidas escolhidas (ou "nenhuma", se nenhuma bebida for selecionada) 
            Cálculo e exibição do valor total a pagar.  
          -->
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
