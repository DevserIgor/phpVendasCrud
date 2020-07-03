<?php

class Produto
{

    public $codigo;
    public $descricao;
    public $catCodigo;
    public $catNome;
    public $forCodigo;
    public $forNome;
    public $precoVenda;
    public $margemLucro;
    public $estoque;

    public function __construct($codigo = false)
    {
        if ($codigo) {
            $this->codigo = $codigo;
            $this->carregar();
        }
    }

    public function listar()
    {
        $query = "  SELECT 
                        pro.ProCodigo, 
                        pro.ProDescricao, 
                        cat.CatCodigo, 
                        cat.CatNome, 
                        forn.ForCodigo, 
                        forn.ForNome, 
                        pro.ProPrecoVenda, 
                        pro.ProMargemLucro, 
                        pro.ProEstoque 
                    FROM 
                        Produtos as pro 
                        Inner Join Categorias cat  on(cat.CatCodigo = pro.CatCodigo) 
                        Inner Join Fornecedores forn on (forn.ForCodigo = pro.ProFornecedor)";                        
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function getProduto()
    {
        $obj= array(
            'codigo'      => $this->codigo,     
            'descricao'   => $this->descricao,  
            'catCodigo'   => $this->catCodigo,  
            'catNome'     => $this->catNome,    
            'forCodigo'   => $this->forCodigo,  
            'forNome'     => $this->forNome,    
            'precoVenda'  => $this->precoVenda, 
            'margemLucro' => $this->margemLucro,
            'estoque'     => $this->estoque    
        );
        return json_encode($obj);
    }

    public function carregar()
    {        
        $query = "  SELECT 
                        pro.ProCodigo, 
                        pro.ProDescricao, 
                        cat.CatCodigo, 
                        cat.CatNome, 
                        forn.ForCodigo, 
                        forn.ForNome, 
                        pro.ProPrecoVenda, 
                        pro.ProMargemLucro, 
                        pro.ProEstoque 
                    FROM 
                        Produtos as pro 
                        Inner Join Categorias cat  on(cat.CatCodigo = pro.CatCodigo) 
                        Inner Join Fornecedores forn on (forn.ForCodigo = pro.ProFornecedor)
                    WHERE
                        ProCodigo = ". $this->codigo;                      
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {            
            $this->codigo      = $linha['ProCodigo'];
            $this->descricao    = $linha['ProDescricao'];
            $this->catCodigo   = $linha['CatCodigo'];
            $this->catNome     = $linha['CatNome'];            
            $this->forCodigo   = $linha['ForCodigo'];            
            $this->forNome     = $linha['ForNome'];            
            $this->precoVenda  = $linha['ProPrecoVenda'];            
            $this->margemLucro = $linha['ProMargemLucro'];            
            $this->estoque     = $linha['ProEstoque'];            
        }
    }

    public function inserir()
    {
        $query = "INSERT INTO Produtos (ProDescricao, CatCodigo, ProFornecedor, ProPrecoVenda, ProMargemLucro, ProEstoque) VALUES ('" . $this->descricao . "'," . $this->catCodigo . "," . $this->forCodigo . "," . $this->precoVenda . "," . $this->margemLucro . "," . $this->estoque . ")";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function atualizar()
    {
        $query = "UPDATE Produtos set ProDescricao = '" . $this->descricao . "', CatCodigo = " . $this->catCodigo . ", ProFornecedor = " . $this->forCodigo . ", ProPrecoVenda = " . $this->precoVenda . ", ProMargemLucro = " . $this->margemLucro . ", ProEstoque = " . $this->estoque . " WHERE ProCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM Produtos WHERE ProCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }
}