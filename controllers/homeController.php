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
		$p = new posts();
		if(isset($_POST['msg']) && !empty($_POST['msg'])){
			$msg = addslashes($_POST['msg']);
			$p->inserirPost($msg);
		}

		$dados['nome'] = $u->getNome();
		$dados['qtdSeguidos'] = $u->countSeguidos();
		$dados['qtdSeguidores'] = $u->countSeguidores();
		$dados['sugestao'] = $u->getUsuarios(5);

		$lista = $u->getSeguidos();
		$lista[] = $_SESSION['twlg'];
		$dados['feed'] = $p->getFeed($lista, 10);
		$this->carregarTemplate('home', $dados);
	}

	public function seguir($id=""){
		if(!empty($id)){
			$u = new usuarios();
			if($u->usuarioExiste('',$id)){
				$r = new relacionamento();
				$r->seguir($_SESSION['twlg'],addslashes($id));
			}
		}
		header('Location: '.URL.'/home');
	}

	public function abandonar($id){
		if(!empty($id)){
			$u = new usuarios();
			if($u->usuarioExiste('',$id)){
				$r = new relacionamento();
				$r->abandonar($_SESSION['twlg'],addslashes($id));
			}
		}
		header('Location: '.URL.'/home');
	}
}