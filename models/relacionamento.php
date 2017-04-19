<?php

class relacionamento extends model{

	public function seguir($seguidor, $seguido){
		$sql = "INSERT INTO RELACIONAMENTO (ID, ID_SEGUIDOR, ID_SEGUIDO) VALUES (NULL, :ID_SEGUIDOR, :ID_SEGUIDO)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ID_SEGUIDOR',$seguidor);
		$sql->bindValue(':ID_SEGUIDO',$seguido);
		$sql->execute();
		return $sql->rowCount()>0;
	}

	public function abandonar($seguidor, $seguido){
		$sql = "DELETE FROM RELACIONAMENTO WHERE ID_SEGUIDOR=:ID_SEGUIDOR AND ID_SEGUIDO=:ID_SEGUIDO";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':ID_SEGUIDOR',$seguidor);
		$sql->bindValue(':ID_SEGUIDO',$seguido);
		$sql->execute();
		return $sql->rowCount()>0;
	}
}