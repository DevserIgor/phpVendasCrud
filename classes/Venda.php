<?php

class Venda
{

    public $codigo;
    public $data;
    public $cliCodigo;
    public $cliNome;
    public $valor;
    public $desconto;
    public $frete;    

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
                        ven.VenCodigo,
                        ven.VenData,
                        cli.CliCodigo,
                        cli.CliNome,
                        ven.VenValor,
                        ven.VenDesconto,
                        ven.VenFrete
                    FROM 
                        Vendas ven 
                        Inner Join Clientes cli  on(cli.CliCodigo = ven.CliCodigo)";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {        
        $query = "  SELECT 
                        ven.VenCodigo,
                        ven.VenData,
                        cli.CliCodigo,
                        cli.CliNome,
                        ven.VenValor,
                        ven.VenDesconto,
                        ven.VenFrete 
                    FROM 
                        Vendas ven 
                        Inner Join Clientes cli  on(cli.CliCodigo = ven.CliCodigo)
                    WHERE
                        VenCodigo = ". $this->codigo;
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {            
            $this->codigo     = $linha['VenCodigo'];
            $this->data       = $linha['VenData'];
            $this->cliCodigo  = $linha['CliCodigo'];
            $this->cliNome    = $linha['CliNome'];            
            $this->valor      = $linha['VenValor'];            
            $this->desconto   = $linha['VenDesconto'];            
            $this->frete      = $linha['VenFrete'];                        
        }
    }

    public function inserir()
    {
        $query = "INSERT INTO Vendas (VenData, CliCodigo, VenValor, VenDesconto, VenFrete) VALUES ('" . $this->data . "'," . $this->cliCodigo . "," . $this->valor . "," . $this->desconto . "," . $this->frete . ")";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
        $this->codigo = $conexao->lastInsertId();
    }

    public function atualizar()
    {
        $query = "UPDATE Vendas set VenData = '" . $this->data . "', CliCodigo = " . $this->cliCodigo . ", VenValor = " . $this->valor . ", VenDesconto = " . $this->desconto . ", VenFrete = " . $this->frete . " WHERE VenCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM Vendas WHERE VenCodigo = " . $this->codigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }
}