<?php

use PHPUnit\Framework\TestCase;
use Model\User;

class UserTest extends TestCase {
    private $user;

    protected function setUp(): void {

        $this->user = new User();
    }

    public function testRegisterUserComDadosValidos() {

        $resultado = $this->user->registerUser("Fernanda", "fernanda@gmail.com", "123456", "Os Dados foram informados corretamente.");
        $this->assertTrue($resultado);
    }

    public function testRegisterUserComDadosVazios() {

        $resultado = $this->user->registerUser("", "", "", "");
        $this->assertFalse($resultado);
    }

}

?>
