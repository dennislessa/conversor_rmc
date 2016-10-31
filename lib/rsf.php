<?php

function dsm_to_rsf(array $dependencias) {
    if (is_array($dependencias)):
        foreach ($dependencias as $d):
            echo 'depend ' . $d . '<br/>';
        endforeach;
    endif;
}

function bunch_to_rsf($bunch) {
    $clusters = explode("\n", $bunch);
    $i = 0;
    
    foreach($clusters as $c):
        $cluster = explode('=', $c);
        
        if (isset($cluster[0])):
            $ss = 'cluster' . $i . '.ss';
        endif;
        
        if (isset($cluster[1])):
            $elementos = explode(',', $cluster[1]);
            
            foreach($elementos as $e):
                echo 'contain ' . $ss . ' ' . $e . '<br/>';
            endforeach;
        endif;
        
        $i++;
    endforeach;
}


function arqref_to_rsf($arqref) {
    $linhas = explode("\n", $arqref);
    
    foreach($linhas as $l):
        $a_b = explode(' ', $l);
        $ss = $a_b[1];
        $elemento = $a_b[0];
        
        echo 'contain ' . $ss . '.ss ' . $elemento . '<br/>';
    endforeach;
}

function arff_to_rsf($arff) {
    $linhas = explode("\n", $arff);
    $elementos = [];
    
    // Identifica os atributos (elementos) do sistema
    for($i=0; !preg_match('/\@data/', $linhas[$i]);$i++):
        if (preg_match('/\@attribute (.*)/', $linhas[$i])):
            $attr = explode(' ', $linhas[$i]);
            $elementos[] = $attr[1];
        endif;
    endfor;

    // Gera os clusters
    $i++;
    
    // Final do arquivo
    $j = count($linhas); 
    
    // Define posicao de acesso ao elemento
    $k = 1;
    
    // Gera o formato RSF
    while($i < $j):
        $valor_atributos = explode(',', $linhas[$i]);
        $cluster = $valor_atributos[count($valor_atributos) - 1];
        
        echo 'contain ' . $cluster . '.ss ' . $elementos[$k] . '<br/>';
            
        $i++;
        $k++;
    endwhile;
}


function rsf_to_model_analizo($rsf) {
    $linhas = explode("\n", $rsf);
    $novo_padrão = [];
    
    foreach($linhas as $l):
        if (preg_match('/(.*)\.c/', $l)):
            $novo_padrão[] = $l;
        endif;
    endforeach;
    
    $novo_padrão = array_map(function($i){
        return str_replace('.c', '', $i);
    }, $novo_padrão);
    
    foreach ($novo_padrão as $n):
        $rsf = explode(' ', $n);
        echo $rsf[0] . ' ' . $rsf[1] . '.ss ' . $rsf[2] . '<br/>';
    endforeach;
}

function rsf_count_clusters($rsf) {
    $linhas = explode("\n", $rsf);
    $clusters = [];
    
    if (is_array($linhas) && (count($linhas) > 0)):
        foreach($linhas as $l):
            if (preg_match('/contain (.*) (.*)/', $l)):
                $args = explode(' ', $l);
                
                if (is_array($args) && (count($args) === 3)):
                    if (!in_array($args[1], $clusters)):
                        $clusters[] = $args[1];
                    endif;
                else:
                    exit('ERROR de argumentos');
                endif;
            endif;
        endforeach;
    endif;
    
    echo '<hr/>';
    echo 'Numero de clusters: <b>' . count($clusters) . '</b>';
    echo '<hr/>';
    echo '<hr/>';
    echo '<pre>';
    print_r($clusters);
    echo '</pre>';
    echo '<hr/>';
}


































