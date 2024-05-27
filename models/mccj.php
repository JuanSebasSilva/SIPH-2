<?php 
class Mccj {
	// Atributos
	private $idccj;
	private $idprd;
	private $idpsn;
	private $tpoccj;
	

	// Métodos get
	function getIdccj(){
		return $this->idccj;
	}
	function getIdprd(){
		return $this->idprd;
	}
	function getIdpsn(){
		return $this->idpsn;
	}
	function getTpoccj(){
		return $this->tpoccj;
	}
	// Métodos set
	function setIdccj($idccj){
		$this->idccj = $idccj;
	}
	function setIdprd($idprd){
		$this->idprd = $idprd;
	}
	function setIdpsn($idpsn){
		$this->idpsn = $idpsn;
	}
	function setTpoccj($tpoccj){
		$this->tpoccj = $tpoccj;
	}
	// Métodos públicos
	public function getAll(){
		$res = NULL;
        $sql = "SELECT cj.idccj, cj.tpoccj, pr.idprd, pr.finiprd, pr.ffinprd, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.telpsn, ps.emapsn, ps.idper, ps.genpsn, tpv.idval, tpv.nomval 
		FROM concejo AS cj INNER JOIN periodo AS pr ON cj.idprd=pr.idprd INNER JOIN persona AS ps ON cj.idpsn=ps.idpsn INNER JOIN valor AS tpv ON cj.tpoccj=tpv.idval";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne(){
        $res = NULL;
		$sql = "SELECT cj.idccj, cj.tpoccj, pr.idprd, pr.finiprd, pr.ffinprd, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.telpsn, ps.emapsn, ps.idper, ps.genpsn, tpv.idval, tpv.nomval 
		FROM concejo AS cj INNER JOIN periodo AS pr ON cj.idprd=pr.idprd INNER JOIN persona AS ps ON cj.idpsn=ps.idpsn INNER JOIN valor AS tpv ON cj.tpoccj=tpv.idval WHERE cj.idccj=:idccj";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idccj = $this->getIdccj();
        $result->bindParam(":idccj", $idccj);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

	public function save(){
		$sql = "INSERT INTO concejo (idprd, idpsn, tpoccj) VALUES (:idprd, :idpsn, :tpoccj)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idprd = $this->getIdprd();
		$result->bindParam(":idprd", $idprd);
		$idpsn = $this->getIdpsn();
		$result->bindParam(":idpsn", $idpsn);
		$tpoccj = $this->getTpoccj();
		$result->bindParam(":tpoccj", $tpoccj);
		$result->execute();
	}

	public function edit(){
		$sql = "UPDATE concejo SET idprd=:idprd, idpsn=:idpsn, tpoccj=:tpoccj WHERE idccj=:idccj";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idccj = $this->getIdccj();
		$result->bindParam(":idccj", $idccj);
		$idprd = $this->getIdprd();
		$result->bindParam(":idprd", $idprd);
		$idpsn = $this->getIdpsn();
		$result->bindParam(":idpsn", $idpsn);
		$tpoccj = $this->getTpoccj();
		$result->bindParam(":tpoccj", $tpoccj);
		$result->execute();
	}

	public function del(){
        $sql = "DELETE FROM concejo WHERE idccj=:idccj";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idccj = $this->getIdccj();
        $result->bindParam(":idccj", $idccj);
        $result->execute();
    }
}
?>