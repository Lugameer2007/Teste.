<?php

use PHPUnit\Framework\TestCase;
use Config\Connection;
use PDO;

class ConnectionTest extends TestCase {

    public function testSeConexaoRetornaInstanciaPDO() {

        $conn = Connection::getConnection();
        $this->assertInstanceOf(PDO::class,$conn, "A conexão não retornou uma instância PDO");
    }

    public function testSeConexaoSempreRetornaAMesmaInstancia() {

        $conn1 = Connection::getConnection();
        $conn2 = Connection::getConnection();
        $this->assertSame($conn1, $conn2, "A conexão não está retornando sempre a mesma instância");
    }
}

?>
