<?php

namespace Controller;

use Model\User;

class UserController {
    private $userModel;

    public function __construct(User $userModel) {
        $this->userModel = $userModel;
    }

    // Registro de Usuário (agora com mensagem)
    public function createUser($user_fullname, $email, $password, $mensagem = null) {
        // Verifica campos obrigatórios
        if (empty($user_fullname) || empty($email) || empty($password)) {
            return false;
        }

        // Criptografa a senha
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Chama o método do model com todos os dados
        return $this->userModel->registerUser($user_fullname, $email, $hashedPassword, $mensagem);
    }

    // Verifica usuário pelo email
    public function checkUserByEmail($email) {
        return $this->userModel->getUserByEmail($email);
    }

    // Login
    public function login($email, $password) {
        $user = $this->userModel->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            if(session_status() !== PHP_SESSION_ACTIVE){
                session_start();
            }
            $_SESSION['id'] = $user['id'];
            $_SESSION['user_fullname'] = $user['user_fullname'];
            $_SESSION['email'] = $user['email'];
            var_dump($_SESSION);
            return true;
        }
        return false;
    }

    // Verifica se usuário está logado
    public function isLoggedIn() {
        return isset($_SESSION['id']);
    }

    // Resgatar dados do usuário
    public function getUserData($id) {
        return $this->userModel->getUserInfo($id);
    }
}

?>
