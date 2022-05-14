<?php   
//função para conectar ao banco de dados   
function get_conexao(){ 
	//nome do servidor onde está o banco de dados
	$servidor = 'localhost';
	//variável com o nome do banco de dados
	$nome_banco_dados = 'medicina';
	//variável com o nome de usuário do BD

	$usuario = 'root';
	//senha do BD
	$senha = 'senac2020';

	//abrimos a conexão com o BD e colocamos essa conexão na variável $conexaoDB
    $conexaoDB = new PDO("mysql:host=$servidor;dbname=$nome_banco_dados;port=3308", $usuario, $senha);

    //configuramos a conexão para gerar um ERRO quando algum script SQL não executar com sucesso
    
   $conexaoDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   //configuramos o banco de dados no modo UTF8
    $conexaoDB->exec("set names utf8");
    
    //retorna a conexão feita no BD
    return $conexaoDB;
}
//função para executar um select no BD
//exige um parâmetro chamado $sql que deverá conter o script SELECT 
function executar_select($sql){
	//criamos uma variável $con que receberá a conexão aberta com o BD
	$con = get_conexao();
	//criamos uma outra variável $sql que irá preparar a conexão para a execução do script
	$sql = $con->prepare($sql);
	//a variável $sql executará o script no BD
	$sql->execute();
	//a função retornará todo o resultado obtido pela variável $sql
	return $sql->fetchAll();
}
?>