<?php

class Receta
    {
        public $idReceta;
        public $tituloPost;
        public $descripcionPost;
        public $imagenPost;
        public $pasosPost;

        function __construct($idReceta, $tituloPost, $descripcionPost, $imagenPost, $pasosPost)
            {
                $this->idReceta = $idReceta;
                $this->tituloPost = $tituloPost;
                $this->descripcionPost = $descripcionPost;
                $this->imagenPost = $imagenPost;
                $this->pasosPost = $pasosPost;
            }
    }
?>