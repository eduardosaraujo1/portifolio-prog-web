<?php

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
