<?php

class usuarios extends model{

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
}