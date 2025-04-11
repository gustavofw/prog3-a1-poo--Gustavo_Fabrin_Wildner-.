<?php
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

Sessao::iniciar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!$nome || !$email || !$senha) {
        Sessao::set('erro', 'Preencha todos os campos!');
        header('Location: cadastro.php');
        exit;
    }

    $usuario = new Usuario($nome, $email, $senha);
    Autenticador::registrarUsuario($usuario);

    Sessao::set('mensagem', 'Cadastro realizado com sucesso! Faça login.');
    header('Location: login.php');
    exit;
}

Sessao::set('erro', 'Requisição inválida.');
header('Location: cadastro.php');
exit;