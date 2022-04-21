<?php
#Warning = el nombre del archivo tiene que llevar la palabra 'Test' como segunda parte del nombre ege. archivoTest.algo para que sea reconocido por PHP Unit Test

#Llamado de libreria Unit Test 
use PHPUnit\Framework\TestCase;

#Clase base para trabajar el testeo, esta debe hacer match el nombre de la clase con el nombre del archivo
#todas las funciones para testear los archivos dentro de controlares/test00.php esta llama toda la carpeta desde el archivo composer.json 
#dentro del archivo json se debe ingresar el siguiente codigo
// {
//     "autoload": {
//         "classmap": [
//             "Controlador/"
//         ]
//     },

#esto va por encima de "require-dev"

#agregando...

class operationTest extends TestCase
    {
        private $op;

    # Funcion de php Unit para inicializar los objetos que requerimos en los tests
    #basicamente un constructor de unit testing eso hace setUp
        public  function setUp():void
            {
                $this->op = new Operations();
            }

        #la funcion assertEquals nos sirve para verificar que el primer parametro es igual al segundo esta es una funcion de PHP Unit Testing
            public function testSumWithTwoValues()
                {
                    $this->assertEquals(7,$this->op->sum(2,5));
                }

                public function testSumWithNullValues()
                    {
                        #$this->assertEquals(NULL,$this->op->sum(NULL,NULL));
                        $this->expectException(InvalidArgumentException::class);
                        $this->op->sum(NULL,NULL);
                    }

                public function testSumWithNotNumericValues()
                    {
                        $this->expectException(InvalidArgumentException::class);
                        $this->op->sum('a','hello');
                    }
    }