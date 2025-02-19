<?php
date_default_timezone_set('America/Sao_Paulo');

define('DATA_BASE_ANTIGA', strtotime('1997-10-07'));
define('DATA_LIMITE', strtotime('2025-02-22'));
define('DATA_BASE_NOVA', DATA_LIMITE - 1000 * 24 * 60 * 60);

function calcular_fator_antigo($data_vencimento) {
    return ($data_vencimento - DATA_BASE_ANTIGA) / (60 * 60 * 24);
}

function calcular_fator_novo($data_vencimento) {
    return ($data_vencimento - DATA_BASE_NOVA) / (60 * 60 * 24);
}

function calcular_fator_vencimento($data_vencimento) {
    if (($data_vencimento - DATA_LIMITE) < 0) {
        return calcular_fator_antigo($data_vencimento);
    } else {
        return calcular_fator_novo($data_vencimento);
    }
}

echo "Digite a data de vencimento (dd/mm/yyyy): ";
$vencimento_str = trim(fgets(STDIN));
$data_vencimento = strtotime(str_replace("/", "-", $vencimento_str));
$fator_vencimento = calcular_fator_vencimento($data_vencimento);

echo "Data de vencimento: " . date('d/m/Y', $data_vencimento) . "\n";
echo "Fator de vencimento: " . $fator_vencimento . "\n";

