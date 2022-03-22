<?php

/*
#NO ESTOY seguro todavia como usar este codigo de objeto para las recetas, podria servir para heredar y subdividir la informacion especifica que tenemos sobre cada
elemento de la receta sin embargo no se la logica ni la sintaxis para operar con esos datos
de momento aca dejare nada mas a donde llegara la informacion del formulario pero no quiero borrar el objeto recetas tal vez puede servir en el futuro.


class Receta
    {
        public $idReceta;
        public $tituloPost;
        public $descripcionPost;
        public $imagenPost;
        public $pasosPost;

        function __construct($idReceta, $tituloPost, $descripcionPost, $imagenPost, $pasosPost)
            {
                $this->idReceta         = $idReceta;
                $this->tituloPost       = $tituloPost;
                $this->descripcionPost  = $descripcionPost;
                $this->imagenPost       = $imagenPost;
                $this->pasosPost        = $pasosPost;
            }
    }
*/
require "Controlador/config.php";


$tituloPost = $_POST['tituloPost'];
$descripcionPost = $_POST ['descripcionPost'];
$pasosPost = $_POST['pasosPost'];
$imagenPost = $_POST['imagenPost'];

$sqlinsert = "INSERT INTO receta (tituloPost, descripcionPost, pasosPost, imagenPost) VALUES ($tituloPost, $descripcionPost, $pasosPost, $imagenPost)";

?>