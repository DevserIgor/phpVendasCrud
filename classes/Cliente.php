<?php

class Cliente
{

    public $codigo;
    public $nome;
    public $cpf;
    public $cnpj;
    public $endereco;
    public $bairro;    

    public function __construct($codigo = false)
    {
        if ($codigo) {
            $this->codigo = $codigo;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "SELECT CliCodigo, CliNome, CliCPF, CliCNPJ, CliEndereco, CliBairro FROM Clientes";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT CliCodigo, CliNome, CliCPF, CliCNPJ, CliEndereco, CliBairro FROM Clientes WHERE CliCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {   
            
            $this->codigo   = $linha["CliCodigo"];
            $this->nome     = $linha["CliNome"];
            $this->cpf      = $linha["CliCPF"];
            $this->cnpj     = $linha["CliCNPJ"];
            $this->endereco = $linha["CliEndereco"];
            $this->bairro   = $linha["CliBairro"];
        }
    }

    public function inserir()
    {
        $query = "INSERT INTO Clientes (CliNome, CliCPF, CliCNPJ, CliEndereco, CliBairro) VALUES ('" . $this->nome . "','" . $this->cpf . "','" . $this->cnpj . "','" . $this->endereco . "','" . $this->bairro . "')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function atualizar()
    {
        $query = "UPDATE Clientes set CliNome = '" . $this->nome . "', CliCPF = '" . $this->cpf . "', CliCNPJ = '" . $this->cnpj . "', Cliendereco = '" . $this->endereco . "', CliBairro = '" . $this->bairro . "' WHERE CliCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM Clientes WHERE CliCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }
}