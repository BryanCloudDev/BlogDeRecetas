<?php
use PHPUnit\Framework\TestCase;

final class ConexionTest extends TestCase{
    public function testDbConnection():void{
        $this->assertIsObject(ConexionTest::conn());
    }
}

?>