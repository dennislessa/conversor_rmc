<?php

function dsm_to_input_bunch(array $dependencias) {
    if (is_array($dependencias)):
        foreach ($dependencias as $d):
            echo $d . '<br/>';
        endforeach;
    endif;
}

function dsm_to_input_tgf(array $dependencias) {
    $entidades = [];
    $aux = [];
    if (is_array($dependencias)):
        foreach ($dependencias as $d):
            $e  = explode(' ', $d);
            $e1 = $e[0];
            $e2 = $e[1];
            
            if (!in_array($e1, $entidades)):
                $entidades[] = $e1;
            endif;
            
            if (!in_array($e2, $entidades)):
                $entidades[] = $e2;
            endif;
        endforeach;
        
        $aux = $entidades;
        $entidades = [];
        for($i=0,$j=count($aux); $i<$j;$i++):
            $entidades[$aux[$i]] = $i;
        endfor;
        
        foreach($entidades as $i => $v):
            echo "{$i} {$v}<br/>";
        endforeach;
        
        echo '#<br/>';
        $i = 0;
        foreach ($dependencias as $d):
            $e  = explode(' ', $d);
            $p  = explode(' ', $aux[$i]);
            $e1 = $e[0];
            $e2 = $e[1];
            
            echo $entidades[$e1] . ' ' . $entidades[$e2] . '<br/>';
            $i++;
        endforeach;
    endif;
}
