<?php
#Llamado de libreria Unit Test 
use PHPUnit\Framework\TestCase;
#require_once ('../Controlador/crl.resultados.php');

#Clase base para trabajar el testeo
class OperationsTest extends TestCase
    {
        private $op;

# Funcion de php Unit para inicializar los objetos que requerimos en los tests
#basicamente un constructor de unit testing
        public  function setUp():void
            {
                $this->op = new Operations();
            }

            public function testSumWithTwoValues()
                {
                    $this->assertEquals(7,$this->op->sum(2,5));
                }
    }