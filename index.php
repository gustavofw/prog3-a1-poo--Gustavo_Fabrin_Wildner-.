<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();

$usuario = Sessao::get('usuario');

if ($usuario) {
    header('Location: dashboard.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}