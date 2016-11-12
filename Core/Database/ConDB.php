<?php 

namespace Core\Database;

use \PDO;

class ConDB
{
	private static $conexao;

	private static function setCon()
	{
		$DRIVE = getenv('DRIVE');
		$HOST = getenv('HOST');
		$DB_NAME = getenv('DB_NAME');
		$USER = getenv('USER');
		$PASSWORD = getenv('PASSWORD');

		try {

			return self::$conexao = new PDO($DRIVE.$HOST.$DB_NAME, $USER, $PASSWORD);

		} catch (PDOException $e) {

			return "Erro: " . $e->getMessage;

		}
	}

	public static function getCon()
	{
		if (is_null(self::$conexao)) {
			return self::setCon();
		}

		return self::$conexao;
	}
}