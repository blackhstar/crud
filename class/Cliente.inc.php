<?php
class Cliente
{

    public function __construct($idCte = null) {
        
        
    }

    private function connect(){

        $conn = mysqli_connect(
            'localhost',
            'root',
            'root',
            'php_crud'
        );

        return $conn;
    }

    private function appQuery($query){
        $conn = $this->connect();
        return mysqli_query( $conn , $query );
    }

    private function getQuery($action , $data){

        switch ( $action ) {
            case 'create':
                $name = $data['name'];
                return " INSERT INTO costumers(name) VALUES ('$name') ";
            break;
            case 'delete':
                $id = $data['id'];
                return " UPDATE costumers SET status = 0 WHERE id = '$id' ";
            break;
            case 'update':
                $name = $data['name'];
                $id = $data['id'];
                return " UPDATE costumers SET name = '$name' WHERE id = '$id' ";
            break;
            case 'getCtes' :
                return " SELECT * FROM costumers WHERE status = 1 ";
            break;
    
            default:
                break;
        }

    }

    public function createCte($name){

        $data = array(
            'name' => $name,
        );

        $query = $this->getQuery('create' , $data);

        return $this->appQuery($query);

    }

    public function updateCte($datos){

        $data = array(
            'name' => $datos['name'],
            'id' => $datos['id'],
        );

        $query = $this->getQuery('update' , $data);

        return $this->appQuery($query);

    }
    
    public function deleteCte($datos){

        $data = array(
            'id' => $datos['id'],
        );

        $query = $this->getQuery('delete' , $data);

        return $this->appQuery($query);

    }

    public function getCtes(){

        $query = $this->getQuery('getCtes' , null);



        return mysqli_fetch_all($this->appQuery($query));
    }
    
}

?>