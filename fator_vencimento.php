<?php

define('DATA_BASE_ANTIGA', strtotime('1997-10-07'));
define('DATA_LIMITE', strtotime('2025-02-22'));
define('DATA_BASE_NOVA', DATA_LIMITE - (1000 * 86400)); // 1000 dias antes de DATA_LIMITE

function calcular_fator_antigo($data_vencimento) {
    return ($data_vencimento - DATA_BASE_ANTIGA) / 86400;
}

function calcular_fator_novo($data_vencimento) {
    return ($data_vencimento - DATA_BASE_NOVA) / 86400;
}

function calcular_fator_vencimento($data_vencimento) {
    if (($data_vencimento - DATA_LIMITE) < 0) {
        return calcular_fator_antigo($data_vencimento);
    } else {
        return calcular_fator_novo($data_vencimento);
    }
}

echo "Digite a data de vencimento (dd/mm/yyyy): ";
