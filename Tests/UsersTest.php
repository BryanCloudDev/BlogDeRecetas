<?php

use PHPUnit\Framework\TestCase;

final class UsersTest extends TestCase{
    private $op;

    public function setUp():void
    {
        $this->op = new User;
    }
    
    //tests

    public function testUserName() : void{
        $this->assertIsNumeric(User::existsEmail('bportillo701@gmail.com'));
    }
    public function testGetUsername() : void{
        $this->assertEquals('root',User::getUsername(37));
    }
    public function testGetUserImagePath() : void{
        $this->assertEquals('https://i.imgur.com/GvUsGWz.jpg',User::getUserImagePath(37));
    }
    public function testGetUserRol() : void{
        $this->assertIsNumeric(User::getUserRol(37));
    }
}