<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();
$emailCookie = $_COOKIE['email_salvo'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (Sessao::get('erro')): ?>
        <p style="color:red;"><?php echo Sessao::get('erro'); Sessao::set('erro', null); ?></p>
    <?php endif; ?>

    <?php if (Sessao::get('mensagem')): ?>
        <p style="color:green;"><?php echo Sessao::get('mensagem'); Sessao::set('mensagem', null); ?></p>
    <?php endif; ?>

    <form action="processa_login.php" method="post">
        <label>E-mail: <input type="email" name="email" value="<?= htmlspecialchars($emailCookie) ?>" required></label><br><br>
        <label>Senha: <input type="password" name="senha" required></label><br><br>
        <label><input type="checkbox" name="lembrar" <?= $emailCookie ? 'checked' : '' ?>> Lembrar e-mail</label><br><br>
        <button type="submit">Entrar</button>
    </form>

    <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
</body>
</html>