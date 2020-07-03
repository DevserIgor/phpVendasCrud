<?php



$var([id] => 26f92c2b-bd91-4b1d-9d78-f20d17160600 [tipo] => NFS-e [idExterno] => 75488 [status] => Negada [motivoStatus] => Código: RPS Descrição: 8964 Correção: Identificação do número do RPS. Código: E116 Descrição: A UF do tomador não foi encontrada ou não corresponde ao código do município do mesmo. Correção: Informe a UF correta do tomador. Em caso de cidades do exterior (fora do país), preencher a UF com 'EX' e a cidade do tomador com '9999999'. [ambienteEmissao] => Producao [enviadaPorEmail] => [dataCriacao] => 2020-06-05T19:10:13Z [dataUltimaAlteracao] => 2020-06-05T19:10:21Z [cliente] => stdClass Object ( [tipoPessoa] => F [nome] => ARLEIDE RODRIGUES DA INVENCAO [email] => [cpfCnpj] => 01276599510 [inscricaoMunicipal] => [telefone] => [endereco] => stdClass Object ( [pais] => Brasil [uf] => sc [cidade] => Blumenau [logradouro] => PONTA DA OESTE [numero] => 98 [complemento] => [bairro] => ITOUPAVAZINHA [cep] => 89050172 ) ) [numeroRps] => 8964 [serieRps] => E [dataCompetenciaRps] => 2020-06-05T19:10:13Z [servico] => stdClass Object ( [descricao] => PROCEDIMENTO DE ORTODONTIA SINDI NOEMIA INVENCAO DE OLIVEIRA 01/09/2004 127.604.289-23 [aliquotaIss] => 2 [issRetidoFonte] => [codigoServicoMunicipio] => 412 [itemListaServicoLC116] => 412 [cnae] => 8630504 [municipioPrestacaoServico] => 4202404 ) [naturezaOperacao] => 1 [valorCofins] => 0 [valorCsll] => 0 [valorInss] => 0 [valorIr] => 0 [valorPis] => 0 [valorTotal] => 80 [valorIss] => 1.6 [observacoes] => Valor aprox. dos tributos R$9,06 (11,33%) [metadados] => stdClass Object ( ));

$response = html_entity_decode($var);     
$response = json_decode($var, true);      

echo($var->id);
// if(isset($response['errors'])){


?>