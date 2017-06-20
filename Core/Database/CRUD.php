<?php

namespace Core\Database;

use Core\Database\ConDB;
use Core\Helpers\Sanitize;

class CRUD extends ConDB
{
	private $con;
	
	public function __construct()
	{
		$this->con = ConDB::getCon();
	}

	final public function ready()
	{
		$sql = "SELECT * FROM aguillar_arts.portfolio";

		$consulta = $this->con->prepare($sql);
		$consulta->execute();
		$resultado = $consulta->fetchAll();

		return $resultado;
	}

	final public function insert(Array $dados)
	{
		$sql = "INSERT INTO `aguillar_arts`.`contato` (`nome`, `email`, `assunto`, `mensagem`, `data`) VALUES (:nome, :email, :assunto, :mensagem, :data)";

		$insert = $this->con->prepare($sql);
		$insert->bindValue(':nome', $dados['name']);
		$insert->bindValue(':email', Sanitize::sanitizeEmail($dados['email']));
		$insert->bindValue(':assunto', $dados['subject']);
		$insert->bindValue(':mensagem', $dados['message']);
		$insert->bindValue(':data', $dados['data']);

		$resultado = $insert->execute();

		if ($resultado) {
			return true;
		} else {
			return false;
		}
	}
}