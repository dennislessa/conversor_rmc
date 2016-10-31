<?php

function dsm_to_input_bunch(array $dependencias) {
    if (is_array($dependencias)):
        foreach ($dependencias as $d):
            echo $d . '<br/>';
        endforeach;
    endif;
}
