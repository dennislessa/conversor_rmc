<?php

function dsm_to_csv(array $dependencias, array $classes) {
    $dependencias = $dependencias;
    $classes = $classes;

    $csv = [];

    # Cabeçalho do arquivo
    $header = implode(',', $classes);
    
    # Inicializa o arquivo CSV
    for ($i = 0, $j = count($classes); $i < $j; $i++):
        for ($k = 0, $l = count($classes); $k < $l; $k++):
            if ($i == $k):
                $csv[$i][$k] = 1;
            else:
                $csv[$i][$k] = 0;
            endif;

        endfor;
    endfor;

    # Preenche arquivo CSV
    for ($i = 0, $j = count($dependencias); $i < $j; $i++):
        $a_b = explode(' ', $dependencias[$i]);
        $ii = array_search($a_b[0], $classes);
        $jj = array_search($a_b[1], $classes);
        $csv[$ii][$jj] = 1;
    endfor;

    normaliza_matriz($csv, count($classes), count($classes));
    
    # Imprime arquivo CSV
    echo $header . '<br/>';
    for ($i = 0, $j = count($classes); $i < $j; $i++):
        $a = implode(',', $csv[$i]);
        echo $a . '<br/>';
    endfor;
}

function get_classe($path) {
    $p = explode('/', $path);

    return $p[count($p) - 1];
}

function normaliza_matriz(array &$matriz, $m, $n) {
    # Soma valor da linha
    $soma_linha = [];

    for ($i = 0; $i < $m; $i++):
        $soma_linha[$i] = 0;
    endfor;

    // Soma os valores das linhas
    for ($i = 0; $i < $m; $i++):
        for ($j = 0; $j < $n; $j++):
            if ($matriz[$i][$j] == 1):
                $soma_linha[$i] ++;
            endif;
        endfor;
    endfor;

    // Aplica a matriz
    for ($i = 0; $i < $m; $i++):
        for ($j = 0; $j < $n; $j++):
            if ($matriz[$i][$j] == 1):
                $matriz[$i][$j] = round(1 / $soma_linha[$i], 5);
            endif;
        endfor;
    endfor;
}
