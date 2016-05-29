<?php

namespace Exemplo;

class Usuario 
{
    private $nome;
    private $idade;

    public function __construct($nome, $sobrenome, $idade = 18)
    {
        $this->nome = $nome . ' ' . $sobrenome;
        $this->idade = $idade;
    }

    public function getNomeCompleto() {
        return $this->nome;
    }

    public function getIdade() {
        return $this->idade;
    }
}