<?php

require '../Controlador/crl.config.php';


class Receta
    {

#Declaracion de variables dentro de la clase tambien llamado atributos de clase

        public string $tituloReceta;
        public string $descripcionReceta;
        public string $pasosReceta;
        public string $imagenReceta;
        public object $db;

#Declaracion del metodo constructor para pasar argumentos

        public function __construct($tituloReceta,$descripcionReceta,$pasosReceta,$imagenReceta)
            {
                global $conn;
                $this->tituloReceta = $tituloReceta;
                $this->descripcionReceta = $descripcionReceta;
                $this->pasosReceta = $pasosReceta;
                $this->imagenReceta = $imagenReceta;
                 $this->db = $conn;
            }

# Este bloque crea una receta dentro de la base de datos

        public function createReceta()
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

#Este bloque busca una receta por ID

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

#Este bloque obtiene todas las recetas de la base de datos

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

#Este bloque borra la receta de la base de datos buscada por ID

        static public function deleteById($id)
            {

                global $conn;
                $query = "DELETE FROM receta WHERE idReceta = :id";
                $statement = $conn->prepare($query);
                $statement->bindValue(":id",$id);
                $statement->execute();
                $statement->closeCursor();
            }

#Este bloque actualiza una receta buscada por ID dentro de la base de datos

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





/* 
QUEDA COMENTARIADA ESTA FUNCION PORQUE DA ERROR DE SINTAXIS POR FAVOR ARREGLAR

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