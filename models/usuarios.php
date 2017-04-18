<?php

class usuarios extends model{

	private $uid;

	public function __construct($id = ''){
		parent::__construct();
		if(!empty($id)){
			$this->uid = $id;
		}
	}
	public function isLogged(){
		if(isset($_SESSION['twlg']) && !empty($_SESSION['twlg'])){
			return true;
		}else{
			return false;
		}
	}

	public function usuarioExiste($email){
		$sql = "SELECT * FROM USUARIOS where EMAIL=:email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email',$email);

		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function inserirUsuario($nome, $email, $senha){
		$sql = "INSERT INTO USUARIOS (ID, NOME, EMAIL, SENHA)values(null,:nome,:email,:senha)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome',$nome);
		$sql->bindValue(':email',$email);
		$sql->bindValue(':senha',$senha);

		$sql->execute();

		$id = $this->db->lastInsertId();

		return $id;
	}

	public function fazerLogin($email, $senha){
		$sql = "SELECT * FROM USUARIOS WHERE EMAIL=:email and SENHA=:senha";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email',$email);
		$sql->bindValue(':senha',$senha);
		$sql->execute();

		if($sql->rowCount()>0){
			$sql = $sql->fetch();
			$_SESSION['twlg'] = $sql['ID'];
			return true;
		}else{
			return false;
		}
	}

	public function getNome(){
		if(!empty($this->uid)){
			$sql = "SELECT NOME FROM USUARIOS WHERE ID=:id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id',$this->uid);
			$sql->execute();

			if($sql->rowCount()>0){
				$sql = $sql->fetch();
				return $sql['NOME'];
			}
		}
	}

	public function countSeguidos(){
		$sql = "SELECT COUNT(ID) as QTD FROM RELACIONAMENTO WHERE ID_SEGUIDOR = :id";
		$sql = $this->db->prepare($sql);
			$sql->bindValue(':id',$this->uid);
			$sql->execute();

			if($sql->rowCount()>0){
				$sql = $sql->fetch();
				return $sql['QTD'];
			}else{
				return 0;
			}
	}
	public function countSeguidores(){
		$sql = "SELECT COUNT(ID) as QTD FROM RELACIONAMENTO WHERE ID_SEGUIDO = :id";
		$sql = $this->db->prepare($sql);
			$sql->bindValue(':id',$this->uid);
			$sql->execute();

			if($sql->rowCount()>0){
				$sql = $sql->fetch();
				return $sql['QTD'];
			}else{
				return 0;
			}
	}

	public function getUsuarios($limite){
		$array = array();
		$sql = "SELECT * FROM USUARIOS WHERE ID != {$this->uid} LIMIT $limite";
		$sql = $this->db->query($sql);
		

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
}