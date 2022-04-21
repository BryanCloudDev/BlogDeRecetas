<?php
#todas las excepciones arrojadas dentro de las funciones y las pruebas unitarias 
#deben estar aqui declaradas como validaciones

class Operations
    {
        public function sum($n1,$n2)
            {

                if($n1 == NULL || $n2 == NULL || !is_numeric($n1) || !is_numeric($n2)) throw new InvalidArgumentException('Values are not numeric');
                return $n1 + $n2;

            }
    }
