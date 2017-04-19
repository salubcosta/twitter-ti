<?php
require_once 'environment.php';

if(ENVIRONMENT == 'development'){
	//INFORMAÇÕES DO AMBIENTE DE DESENVOLVIMENTO
	define('HOST','localhost');
	define('DBNAME','db_twitter');
	define('DBUSER','root');
	define('DBPASS','');
}else{
	//INFORMAÇÕES DO AMBIENTE DE PRODUÇÃO
	define('HOST',''); 
	define('DBNAME','');
	define('DBUSER','');
	define('DBPASS','');
}

spl_autoload_register(function($class){
	if(file_exists(DIRETORIO.'/controllers/'.$class.'.php')){
		require_once DIRETORIO.'/controllers/'.$class.'.php';
	}elseif(file_exists(DIRETORIO.'/models/'.$class.'.php')){
		require_once DIRETORIO.'/models/'.$class.'.php';
	}else{
		require_once DIRETORIO.'/core/'.$class.'.php';
	}
});