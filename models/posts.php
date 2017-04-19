<?php

class posts extends model{

	public function inserirPost($msg){

		$sql = "INSERT INTO POSTS (ID, ID_USUARIO, DATA_POST, MENSAGEM) VALUES (NULL,:ID_USUARIO,now(),:MENSAGEM);";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ID_USUARIO',$_SESSION['twlg']);	
		$sql->bindValue(':MENSAGEM',$msg);
		$sql->execute();
	}

	public function getFeed($lista, $limit){
		$array = array();
		if(count($lista)>0){
			$sql = "SELECT *, (SELECT NOME FROM USUARIOS U WHERE U.ID = P.ID_USUARIO) AS NOME FROM POSTS P WHERE P.ID_USUARIO IN (".implode(',', $lista).") ORDER BY P.DATA_POST DESC LIMIT ".$limit;
		}
		$sql = $this->db->query($sql);
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

}