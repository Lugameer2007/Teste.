<?php

namespace Config;

use PDOException;

class Connection {
    private static $instance;

    public static function getConnection() {
        if (!isset(self::$instance)) {
            try {
                //Configurações do Banco
                $host = "localhost";
                $dbname = "meu_banco";
                $user = "root";
                $pass = "";

                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

                //Criação da estancia 
                self::$instance = new PDO($dsn, $user, $pass);

                //Configura PDO para lançar exceções em caso de erro
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                // Se der erro na conexão, mostra mensagem
                die("Erro de conexão: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}

?>   
?>
