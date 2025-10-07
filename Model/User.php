?php

namespace Model;

use Config\Connection;

class User {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    // aqui você usaria a conexão para salvar dados
    public function registerUser($nome, $email, $senha, $mensagem) {
        if (empty($nome) || empty($email) || empty($senha) || empty($mensagem)) {
            echo "<p style='color:red;'>Erro: preencha todos os campos corretamente.</p>";
            return false;
        }

        // Por enquanto só simulação, sem banco
        // Quando tiver tabela, eu posso tirar esse return true e usar o INSERT
        $resultado = true;

        if ($resultado) {
            echo "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
            return true;
        } else {
            echo "<p style='color:red;'>Erro ao cadastrar o usuário.</p>";
            return false;
        }
    }

    // Buscar usuário por email
    public function getUserByEmail($email) {
        return null;
    }

    // Buscar dados do usuário
    public function getUserInfo($id, $user_fullname = '', $email = '') {
        return [
            'id' => $id,
            'user_fullname' => $user_fullname,
            'email' => $email
        ];
    }
}

?>
