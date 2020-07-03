<?php

class Fornecedor
{

    public $codigo;
    public $nome;
    public $fantasia;
    public $cnpj;
    public $endereco;
    public $fone;

    public function __construct($codigo = false)
    {
        if ($codigo) {
            $this->codigo = $codigo;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "SELECT ForCodigo, ForNome, ForFantasia, ForCNPJ, ForEndereco, ForFone FROM Fornecedores";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT ForCodigo, ForNome, ForFantasia, ForCNPJ, ForEndereco, ForFone FROM Fornecedores WHERE ForCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {            
            $this->codigo   = $linha['ForCodigo'];
            $this->nome     = $linha['ForNome'];
            $this->fantasia = $linha['ForFantasia'];
            $this->cnpj     = $linha['ForCNPJ'];            
            $this->endereco = $linha['ForEndereco'];            
            $this->fone     = $linha['ForFone'];            
        }
    }

    public function inserir()
    {
        $query = "INSERT INTO Fornecedores (ForNome, ForFantasia, ForCNPJ, ForEndereco, ForFone) VALUES ('" . $this->nome . "','" . $this->fantasia . "','" . $this->cnpj . "','" . $this->endereco . "','" . $this->fone . "')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function atualizar()
    {
        $query = "UPDATE Fornecedores set ForNome = '" . $this->nome . "', ForFantasia = '" . $this->fantasia . "', ForCNPJ = '" . $this->cnpj . "', ForEndereco = '" . $this->endereco . "', ForFone = '" . $this->fone . "' WHERE ForCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM Fornecedores WHERE ForCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }
}