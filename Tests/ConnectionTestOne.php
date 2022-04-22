<?php
use PHPUnit\Framework\TestCase;

final class ConnectionTestOne extends TestCase{
    public function testDbConnection():void{
        $this->assertIsObject(ConnectionTest::conn());
    }
}

?>