<?php 

namespace App\Model;

use \Core\Database\CRUD;

class PortfolioModel
{
	private $CRUD;

	public function __construct()
	{
		$this->CRUD = new CRUD;
	}

	public function getPortfolio()
	{
		return $this->CRUD->ready();
	}
}