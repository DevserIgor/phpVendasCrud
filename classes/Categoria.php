<?php

class Categoria
{

    public $codigo;
    public $nome;
    public $grupo;
    public $subgrupo;

    public function __construct($codigo = false)
    {
        if ($codigo) {
            $this->codigo = $codigo;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "SELECT CatCodigo, CatNome, CatGrupo, CatSubGrupo FROM Categorias";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query = "SELECT CatCodigo, CatNome, CatGrupo, CatSubGrupo FROM Categorias WHERE CatCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {            
            $this->codigo = $linha['CatCodigo'];
            $this->nome = $linha['CatNome'];
            $this->grupo = $linha['CatGrupo'];
            $this->subgrupo = $linha['CatSubGrupo'];            
        }
    }

    public function inserir()
    {
        $query = "INSERT INTO Categorias (CatNome, CatGrupo, CatSubGrupo) VALUES ('" . $this->nome . "','" . $this->grupo . "','" . $this->subgrupo . "')";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function atualizar()
    {
        $query = "UPDATE Categorias set CatNome = '" . $this->nome . "', CatGrupo = '" . $this->grupo . "', CatSubGrupo = '" . $this->subgrupo . "' WHERE CatCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM Categorias WHERE CatCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }
}