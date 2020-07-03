<?php

class VendaProduto
{

    public $venCodigo;
    public $proCodigo;
    public $proNome;
    public $venQuantidade;
    public $venValor;
    public $venDesconto;     

    public function __construct($venCodigo = false,$proCodigo = false)
    {
        if ($venCodigo) {
            $this->venCodigo = $venCodigo;
            $this->proCodigo = $proCodigo;
            $this->carregar();
        }
    }

    public function carregar()
    {        
        $query = "  SELECT 
                        ven_pro.VenCodigo,
                        pro.ProCodigo,
                        pro.ProDescricao,
                        ven_pro.VenQuantidade,
                        ven_pro.VenValor,
                        ven_pro.VenDesconto                        
                    FROM 
                        Produtos pro
                        Inner Join Vendas_Produtos ven_pro on (ven_pro.ProCodigo = pro.ProCodigo)
                        Inner Join Vendas ven  on (ven.Vencodigo = ven_pro.Vencodigo)
                    WHERE
                        ven_pro.VenCodigo = ". $this->venCodigo;
                    if($this->proCodigo){
                        $query = $query . " And ProCodigo = ". $this->proCodigo;
                    }    
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {            
            $this->venCodigo     = $linha['VenCodigo'];
            $this->proCodigo     = $linha['ProCodigo'];
            $this->proNome       = $linha['ProDescricao'];
            $this->venQuantidade = $linha['VenQuantidade'];            
            $this->venValor      = $linha['VenValor'];            
            $this->venDesconto   = $linha['VenDesconto'];                                             
        }
    }

    public function inserir()
    {
        $query = "INSERT INTO Vendas_Produtos (VenCodigo, ProCodigo, VenQuantidade, VenValor, VenDesconto) VALUES (" . $this->venCodigo . "," . $this->proCodigo . "," . $this->venQuantidade . "," . $this->venValor . "," . $this->venDesconto . ")";
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function atualizar()
    {
        $query = "UPDATE Vendas_Produtos set VenCodigo = " . $this->venCodigo . ", ProCodigo = " . $this->proCodigo . ", VenQuantidade = " . $this->venQuantidade . ", VenValor = " . $this->venValor . ", VenDesconto = " . $this->venDesconto . " WHERE VenCodigo = " . $this->venCodigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

    public function excluir()
    {
        $query = "DELETE FROM Vendas_Produtos WHERE VenCodigo = " . $this->venCodigo;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }
}