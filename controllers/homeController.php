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
		$dados = array('nome'=>'');
		$u = new usuarios($_SESSION['twlg']);

		$dados['nome'] = $u->getNome();
		$dados['qtdSeguidos'] = $u->countSeguidos();
		$dados['qtdSeguidores'] = $u->countSeguidores();
		$dados['sugestao'] = $u->getUsuarios(5);
		$this->carregarTemplate('home', $dados);
	}
}