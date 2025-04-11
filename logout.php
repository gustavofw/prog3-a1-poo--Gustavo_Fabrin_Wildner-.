<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();
Sessao::set('usuario', null);

header('Location: login.php');
exit;