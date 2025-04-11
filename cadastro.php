<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>

    <?php if (Sessao::get('erro')): ?>
        <p style="color:red;"><?php echo Sessao::get('erro'); Sessao::set('erro', null); ?></p>
    <?php endif; ?>

    <form action="processa_cadastro.php" method="post">
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>E-mail: <input type="email" name="email" required></label><br><br>
        <label>Senha: <input type="password" name="senha" required></label><br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
</body>
</html>