<?php

class controller{

	public function __construct(){
		
	}
	public function carregarTemplate($view, $array){
		include DIRETORIO.'/views/template.php';
	}

	public function carregarViewNoTemplate($view, $array){
		extract($array); //extrai variáveis das chaves do array
		include DIRETORIO.'/views/'.$view.'.php';
	}
}