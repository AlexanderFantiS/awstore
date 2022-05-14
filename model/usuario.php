<?php 
require_once 'model/conexao.php';
class usuario
{


	function inserir($dados)
	{
		//montar script de INSERT	
		$con = get_conexao();
		$sql = $con->prepare('INSERT into cadastro (nome,email,senha) VALUES (:nome,:email,:senha)');

		//utilizamos as variaveis BIND para evitar SQL INJECTION(HACKEAMENTOS)
			$sql->bindParam(':nome',$dados['nome']);
		$sql->bindParam(':email',$dados['email']);
		$sql->bindParam(':senha',$dados['senha']);
		$sql->execute();
	}
}
?>