<?php

$input_post = filter_input_array(INPUT_POST);

if (is_array($input_post) && (count($input_post) > 0)):
    include('../lib/bunch.php');
    include('../lib/csv.php');
    include('../lib/rsf.php');

    switch ($input_post['acao']):
        case 'gerar_bunch': /* OK */
            dsm_to_input_bunch($input_post['dependencias']);
            break;
        
        case 'gerar_tgf':  /* OK */
            dsm_to_input_tgf($input_post['dependencias']);
            break;

        case 'gerar_rsf': /* OK */
            dsm_to_rsf($input_post['dependencias']);
            break;

        case 'gerar_csv': /* OK */
            dsm_to_csv($input_post['dependencias'], $input_post['classes']);
            break;

        case 'converter_bunch': /* OK */
            bunch_to_rsf($input_post['conteudo']);
            break;

        case 'converter_arff': /* OK */
            arff_to_rsf($input_post['conteudo']);
            break;

        case 'converter_arqref': /* OK */
            arqref_to_rsf($input_post['conteudo']);
            break;
        
        case 'rsf_to_model_analizo': /* OK */
            rsf_to_model_analizo($input_post['conteudo']);
            break;
        
        case 'conta_cluster': /* OK */
            rsf_count_clusters($input_post['conteudo']);
            break;
        default:
            echo('Ação não existente');
            break;
    endswitch;
else:
    echo('Os dados informados não são válidos.');
endif;
