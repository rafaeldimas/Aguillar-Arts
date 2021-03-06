<?php 

namespace App\Model;

class HomeModel
{
	private $assets;

	public function __construct()
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
                'home.css',
                'footer.css'
            ],
            'js' => [
                'jquery.min.js',
                'owl.carousel.min.js',
                'owl.js',
                'home.js',
                'footer.js',
                'header.js'
            ]
		];

	}

	public function getAssets()
	{
		return $this->assets;
	}
}