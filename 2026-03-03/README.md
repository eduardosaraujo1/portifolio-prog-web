## O formulário HTML deve conter os seguintes elementos de entrada:

### Nome do Cliente

- Campo de texto (input type="text")
- Sabor da Pizza
- Campo de seleção (select) com 3 opções:
  - Mussarela – R$50,00
  - Calabresa – R$52,00
  - Portuguesa – R$60,00

### Borda Recheada

- Conjunto de botões rádio (input type="radio")
- Opções:
  - Sim – adiciona R$5,00 ao valor total
  - Não – sem custo adicional

### Bebidas

- Conjunto de caixas de seleção (checkbox) que permite múltiplas escolhas
- Opções disponíveis:
  - Refrigerante Lata – R$8,00
  - Refrigerante 2L – R$20,00
  - Água – R$5,00

### Botão de envio

- Botão (input type="submit")
- Submete o pedido e exibe um resumo do pedido com o valor total a pagar.

Após o envio do formulário, o sistema deve processar os dados com PHP e exibir:

- Nome do cliente
- Sabor da pizza selecionada
- Se a borda foi adicionada ou não
- Lista das bebidas escolhidas (ou "nenhuma", se nenhuma bebida for selecionada)
- Cálculo e exibição do valor total a pagar.

**Toda página deve ser estilizada com CSS ou Bootstrap.**
