<?php

    function encodeWidgetTemperaturaV1($nome, $indice, $max_temp, $min_temp, $freq_agg) {
        $array = array('nome' => $nome, 'indice' => $indice, 'max_temp' => $max_temp, 'min_temp' => $min_temp, 'freq_agg' => $freq_agg);
        return $array;
    }

?>