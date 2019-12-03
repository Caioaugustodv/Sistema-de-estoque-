<?php
/**
 * 
 */
class Usuarios {

	private $id;
	private $pdo;
	private $permissao;

	function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	// verifica se usuario existe no banco de dados , se sim ele aloca o id do usuario à SESSION e retorna

	public function fazerLogin($email,$senha){

		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email",$email);
		$sql->bindValue(":senha",$senha);
		$sql->execute();

		if ($sql->rowCount() > 0 ) {

			$sql = $sql->fetch();
			$_SESSION['logado'] = $sql['id'];

			return true;
		}
		return false;
	}

	// seleciona a permissao do usuario eviado pelo ID , caso retorne algum usuario a function aloca suas permissoes na variávle $permissao.
	

	public function setUsuario($id) {
		$this->id = $id;

		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id",$id);
		$sql->execute();

		if ($sql->rowCount() > 0 ) {

			$sql = $sql->fetch();
			$this->permissao = explode(',', $sql['permissao']);

		}


	}

	// Pega a permissao do usuarios logado.

	public function getPermissao() {
		return $this->permissao;
	}

	//verifica se tal usuario tem a permissao de ver conteudos do sistema, se sim retorna TRUE , se não FALSE. 

	public function temPermissao($p) {

		
		if (in_array($p, $this->permissao)) {
			return true; 
		}else {
			return false;
		}
	}

}

?>