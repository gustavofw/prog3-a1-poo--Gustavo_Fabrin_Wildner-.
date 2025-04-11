<?php
require_once 'classes/Usuario.php';  
require_once 'classes/Sessao.php';

Sessao::iniciar();

$usuario = Sessao::get('usuario');

if (!$usuario) {
    Sessao::set('erro', 'Acesso negado! Faça login.');
    header('Location: login.php');
    exit;
}

$emailCookie = $_COOKIE['email_salvo'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área Restrita</title>
</head>
<body>
    <h2>Bem-vindo à área restrita!</h2>

    <p>Olá, <strong><?php echo htmlspecialchars($usuario->getNome()); ?></strong>!</p>

    <?php if ($emailCookie): ?>
        <p>Seu e-mail salvo é: <strong><?php echo htmlspecialchars($emailCookie); ?></strong></p>
    <?php endif; ?>

    <p><a href="logout.php">Sair</a></p>
</body>
</html>