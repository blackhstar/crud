<?php
include_once('../class/Cliente.inc.php');

function create(){
    
    $name = $_POST['name'];
    
    $cte = new Cliente();

    $cte->createCte($name);

    $return = array(
        'status' => true,
    );

    echo json_encode($return);
    die();

}

function update(){
    
    $name = $_POST['name'];
    $id = $_POST['idCte'];
    $data = array(
        'name' => $name,
        'id' => $id,
    );
    $cte = new Cliente();

    $cte->updateCte($data);

    $return = array(
        'status' => true,
    );

    echo json_encode($return);
    die();

}

function deleteCte(){

    $id = $_POST['idCte'];
    $data = array(
        'id' => $id,
    );
    
    $cte = new Cliente();

    $cte->deleteCte($data);

    $return = array(
        'status' => true,
    );

    echo json_encode($return);
    die();

}

function getCtes(){

    $cte = new Cliente();

    echo json_encode($cte->getCtes());
    die();

}

if( isset( $_POST['function']) ){
    
    switch ( $_POST['function'] ) {
        case 'create':
            create();
        break;
        case 'update':
            update();
        break;
        case 'delete':
            deleteCte();
        break;
        case 'getCtes':
            getCtes();
        break;

        default:
            break;
    }
    

}



?>