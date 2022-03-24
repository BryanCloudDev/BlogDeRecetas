<?php

require '../Controlador/crl.config.php';


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


        public function insertReceta()
            {
                $query = "INSERT INTO receta (tituloPost, descripcionPost, imagenPost, pasosPost) 
                            VALUES (:tituloPost, :descripcionPost, :imagenPost,:pasosPost)";

                $statement = $this->db->prepare($query);
                $statement->bindValue(":tituloPost", $this->tituloReceta);
                $statement->bindValue(":descripcionPost", $this->descripcionReceta);
                $statement->bindValue(":imagenPost", $this->imagenReceta);
                $statement->bindValue(":pasosPost", $this->pasosReceta);

                $statement->execute();
                $statement->closeCursor();
                
            }

        static public function getRecetaById($id)
            {
                global $conn;
                $query = "SELECT * FROM receta WHERE idReceta = :id";
                $statement = $conn->prepare($query);
                $statement->bindValue(":id", $id);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $statement->closeCursor();
                
                return $result;
            }

        static public function getAllRecetas()
            {
                global $conn;
                $query = "SELECT * FROM receta";
                $statement = $conn->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                $statement->closeCursor();
                
                return $result;
            }

        static public function deleteById($id)
            {

                global $conn;
                $query = "DELETE FROM receta WHERE idReceta = :id";
                $statement = $conn->prepare($query);
                $statement->bindValue(":id",$id);
                $statement->execute();
                $statement->closeCursor();
            }

        public function updateRecetaById($id)
            {
                $query = "UPDATE receta SET tituloPost = :tituloPost, descripcionPost = :descripcionPost, imagenPost = :imagenPost, 
                            pasosPost = :pasosPost WHERE idReceta = :id";
                $statement = $this->db->prepare($query);
                $statement->bindValue(":tituloPost",$this->tituloReceta);
                $statement->bindValue(":descripcionPost",$this->descripcionReceta);
                $statement->bindValue(":imagenPost",$this->imagenReceta);
                $statement->bindValue(":pasosPost",$this->pasosReceta);
                
                $statement->execute();
                $statement->closeCursor();
            }
    }


#$prueba1 = new Receta('titulo de receta','descripcion','pasos','imagen');


#funcion eliminar receta tengo que hacer la funcion de eliminar ->>> Rodrigo Soriano



# y de editar->>>>Kevin Flores
######################################
########################
##############
############################


/* 
QUEDA COMENTARIADA ESTA FUNCION PORQUE DA ERROR DE SINTAXIS POR FAVOR ARREGLAR EN LA LINEA 111

function randomDIR($n)

    {

        $options = "abcdefghijklmnoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $result = "";
        for($i = 0; $i < $n; $i++)
        {
            $random = rand(0,strlen($options) - 1);
            $result .= $options[$random];
        }

        return $result;
    }
*/
?>