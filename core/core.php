<?php

class core{

	public function run(){
		$this->processarURL();
	}

	public function processarURL(){
		$params = array();

		if(isset($_GET['url'])){
			$url = filter_var(strtolower(rtrim($_GET['url'])), FILTER_SANITIZE_URL);
			$url = explode('/', $url);

			$controller = $this->validarArray($url,0) ? $url[0].'controller' : 'homeController';
			$action = $this->validarArray($url,1) ? $url[1] : 'index';

			if($this->validarArray($url,2)){
				unset($url[0]);
				unset($url[1]);
				$params = $url;
			}

		}else{
			$controller = 'homeController';
			$action = 'index';
		}

		if(!$this->validarController($controller)){
			echo 'Controlador não existe.'; //chamar página 404.php
			exit;
		}
		$_controller = new $controller;

		if(!$this->validarAction($_controller, $action)){
			echo 'Action não existe'; //chamar página 404.php
			exit;
		}

		call_user_func_array(array($_controller, $action), $params);
	} //fim processarURL();

	public function validarArray($array, $key){
		if(isset($array[$key])){
			return $array[$key];
		}
		return false;
	} //fim validarArray();

	public function validarController($controller){
		return file_exists(DIRETORIO.'/controllers/'.$controller.'.php');
	} //fim validarController();

	public function validarAction($obj, $action){
		return method_exists($obj, $action);
	} //fim validarAction();
}