<?php

// Carrega o autoload do Composer (não precisa mais de require_once individuais)
require_once __DIR__ . '/vendor/autoload.php';

use Model\User;
use Controller\UserController;

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    // Instancia do Model e do Controller
    $userModel = new User();
    $userController = new UserController($userModel);

    // Tentando criar o usuário
    $resultado = $userController->createUser($nome, $email, $senha, $mensagem);

    if ($resultado) {
        echo "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro: preencha todos os campos corretamente.</p>";
    }
}

?>
