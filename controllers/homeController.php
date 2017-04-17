<?php

class homeController extends controller{

	public function __construct(){
		parent::__construct();

		$u = new usuarios();

		if(!$u->isLogged()){
			header('Location: '.URL.'/login');
		}
	}

	public function index(){
		$this->carregarTemplate('home',[]);
	}
}