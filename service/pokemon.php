<?php
include_once('../class/Pokemon.inc.php');


function getPokemon(){

    $idPkm = $_POST['idPkm'];
    $pokemon = new Pokemon();
    $data = array(
        'idPkm' => $idPkm,
    );
    $dataPkm = $pokemon->getPokemon($data);

    $return = array(
        "data" => json_decode($dataPkm),
    );
    
    $returnJson = json_encode($return, JSON_UNESCAPED_UNICODE);
    echo $returnJson;

}

if( isset( $_POST['function']) ){

    switch ( $_POST['function'] ) {
        case 'getPokemon':
            getPokemon();
            break;

        default:
            break;
    }
    

}



?>