<?php

class Usuario {
    private $nome;
    private $email;
    private $senhaHash;

    public function __construct($nome, $email, $senha) {
        $this->nome = $this->sanitizar($nome);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenhaHash() {
        return $this->senhaHash;
    }

    public function autenticar($senhaInformada) {
        return password_verify($senhaInformada, $this->senhaHash);
    }

    private function sanitizar($dado) {
        return htmlspecialchars(strip_tags(trim($dado)));
    }
}