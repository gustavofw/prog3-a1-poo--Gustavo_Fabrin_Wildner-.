<?php

require_once 'Usuario.php';
require_once 'Sessao.php';

class Autenticador {
    private static $usuarios = [];

    public static function carregarUsuarios() {
        Sessao::iniciar();
        self::$usuarios = Sessao::get('usuarios') ?? [];
    }

    public static function salvarUsuarios() {
        Sessao::set('usuarios', self::$usuarios);
    }

    public static function registrarUsuario(Usuario $usuario) {
        self::carregarUsuarios();
        self::$usuarios[] = $usuario;
        self::salvarUsuarios();
    }

    public static function logarUsuario($email, $senha) {
        self::carregarUsuarios();
        foreach (self::$usuarios as $usuario) {
            if ($usuario->getEmail() === $email && $usuario->autenticar($senha)) {
                return $usuario;
            }
        }
        return null;
    }

    public static function getTodosUsuarios() {
        self::carregarUsuarios();
        return self::$usuarios;
    }
}