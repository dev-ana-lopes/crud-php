<?php

class Database {
    private $endereco = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $base = 'clientes';
    public $conexao;

    public function __construct()
    {
        $this->conexao = mysqli_connect($this->endereco, $this->usuario, $this->senha, $this->base);
    }

    public function executaQuery($sql)
    {
        return mysqli_query($this->conexao, $sql);
    }
}