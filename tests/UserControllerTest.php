<?php

use Controller\UserController;
use Model\User;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase {

    private $controller;

    protected function setUp(): void {
        $userModel = new User();
        $this->controller = new UserController($userModel);
    }

    public function testCreateUserComDadosValidos() {
        $resultado = $this->controller->createUser("Fernanda", "fernanda@gmail.com", "123456", "Os Dados foram informados corretamente.");
        $this->assertTrue($resultado);
    }

    public function testCreateUserComDadosVazios() {
        $resultado = $this->controller->createUser("", "", "", "");
        $this->assertFalse($resultado);
    }
}

?>
