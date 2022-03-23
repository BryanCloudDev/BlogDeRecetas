<?php

class Receta
{

    public string $tituloReceta;
    public string $descripcionReceta;
    public string $pasosReceta;
    public string $imagenReceta;
    public object $db;
    
    public function __construct($tituloReceta,$descripcionReceta,$pasosReceta,$imagenReceta)
    {
        global $conn;
        $this->tituloReceta = $tituloReceta;
        $this->descripcionReceta = $descripcionReceta;
        $this->pasosReceta = $pasosReceta;
        $this->imagenReceta = $imagenReceta;
        $this->db = $conn;
    }


    public function insertReceta(){
        $query = "INSERT INTO receta (tituloPost, descripcionPost, imagenPost, pasosPost) 
                    VALUES (:tituloPost, :descripcionPost, :imagenPost,:pasosPost)";

        $statement = $this->db->prepare($query);
        $statement->bindValue(":tituloPost", $this->tituloReceta);
        $statement->bindValue(":descripcionPost", $this->descripcionReceta);
        $statement->bindValue(":imagenPost", $this->imagenReceta);
        $statement->bindValue(":pasosPost", $this->pasosReceta);

        $statement->execute();
        
    }

    public function getRecetaById($id){
        global $conn;
        $query = "SELECT * FROM receta WHERE idReceta = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllRecetas(){
        global $conn;
        $query = "SELECT * FROM receta";
        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}


#funcion eliminar receta tengo que hacer la funcion de eliminar y de editar
######################################
########################
##############
############################


function randomDIR($n){
    $options = "abcdefghijklmnoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $result = "";
    for($i = 0; $i < $n; $i++){
        $random = rand(0,strlen($options) - 1);
        $result .= $options[$random];
    }

    return $result;
}
?>