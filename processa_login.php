<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    $lembrar = isset($_POST['lembrar']);

    if (!$email || !$senha) {
        Sessao::set('erro', 'Preencha todos os campos!');
        header('Location: login.php');
        exit;
    }

    $usuario = Autenticador::logarUsuario($email, $senha);

    if ($usuario) {
        Sessao::set('usuario', $usuario);
        
        if ($lembrar) {
            setcookie('email_salvo', $email, time() + (60 * 60 * 24 * 30)); 
        } else {
            setcookie('email_salvo', '', time() - 3600); 
        }

        header('Location: dashboard.php');
        exit;
    } else {
        Sessao::set('erro', 'Credenciais inválidas.');
        header('Location: login.php');
        exit;
    }
}

Sessao::set('erro', 'Requisição inválida.');
header('Location: login.php');
exit;