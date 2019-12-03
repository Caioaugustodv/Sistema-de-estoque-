<?php 

class Documentos {


	function __construct($pdo)
	{
		$this->pdo = $pdo;


	}

	// Pega os documentos da tabela documentos e colocar em um array 

	public function getDocumentos() {

		$array = array();

		$sql = "SELECT * FROM documentos";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0 ) {

			$array = $sql->fetchAll();

		}

		return $array;

	}


}
?>