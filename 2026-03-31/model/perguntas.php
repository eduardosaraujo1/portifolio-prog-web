<?php

/**
 * A partir da especificação JSON das perguntas, retornar um array de arrays associativos contendo info das perguntas
 * 
 * @return array<array{id:int,type:string,text:string,options:array<string>,correct:array<int>}>
 */
function get_perguntas(): array
{
    $path = __DIR__ . '/../assets/perguntas.json';
    $jsons = file_get_contents($path);
    if ($jsons === false) throw new Exception("Não foi possível ler o arquivo '$path'. O caminho está correto?");
    $parse = json_decode($jsons, true);

    return $parse['data'];
}
