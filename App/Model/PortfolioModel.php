<?php 

namespace App\Model;

use \Core\Database\CRUD;

class PortfolioModel
{
	private $CRUD;
	private $assets;

	public function __construct()
	{
		$this->CRUD = new CRUD;
	}

	public function getPortfolio()
	{
		return $this->CRUD->ready();
	}

	private function setAssets()
	{
		$this->assets = [
			'css' => [
	            'inc/bootstrap.min.css',
	            'inc/bootstrap-theme.min.css',
	            'inc/owl.carousel.css',
	            'inc/owl.theme.css',
	            'inc/owl.transitions.css',
	            'reset.css',
	            'header.css',
	            'portfolio.css',
	            'footer.css'
	        ],
	        'js' => [
	            'jquery.min.js',
	            'bootstrap.min.js',
	            'owl.carousel.min.js',
	            'owl.js',
	            'footer.js',
	            'header.js'
	        ]
		];
	}

	public function getAssets()
	{
		$this->setAssets();
		return $this->assets;
	}
}