<?php

namespace Core\Database;

use Core\Database\ConDB;

class CRUD extends ConDB
{
	private $con;
	
	public function __construct()
	{
		$this->con = ConDB::getCon();
	}

	public function ready()
	{
		$sql = "SELECT * FROM aguillar_arts.portfolio";

		$consulta = $this->con->prepare($sql);
		$consulta->execute();
		$resultado = $consulta->fetchAll();

		return $resultado;

	}
}