<?php 
class Mnot{
	//atributos
	private $idnot;
	private $titnot;
	private $fhnot;
	private $ffinnot;
	private $desnot;
    private $idpsn;
	//metodos get
	 function getIdnot(){
		return $this->idnot;
	}
	function getTitnot(){
		return $this->titnot;
	}
	function getFhnot(){
		return $this->fhnot;
	}
	function getFfinnot(){
		return $this->ffinnot;
	}
	function getDesnot(){
		return $this->desnot;
	}
     function getIdpsn(){
		return $this->idpsn;
	}
	//metodos SET
	function setIdnot($idnot){
		$this->idnot =$idnot;
	}
	function setTitnot($titnot){
		$this->titnot =$titnot;
	}
	function setFhnot($fhnot){
		$this->fhnot =$fhnot;
	}
	function setFfinnot($ffinnot){
		$this->ffinnot =$ffinnot;
	}
	function setDesnot($desnot){
		$this->desnot =$desnot;
	}
   	function setIdpsn($idpsn){
		$this->idpsn =$idpsn;
	}
	//metodos 
	   function getAll(){
		$res = NULL;
		$sql = "SELECT nt.idnot, nt.titnot, nt.fhnot, nt.ffinnot, nt.desnot, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.idper 
		FROM notificacion AS nt INNER JOIN persona AS ps ON nt.idpsn=ps.idpsn";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	 function getOne(){
		$res = NULL;
		$sql = "SELECT nt.idnot, nt.titnot, nt.fhnot, nt.ffinnot, nt.desnot, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.idper 
		FROM notificacion AS nt INNER JOIN persona AS ps ON nt.idpsn=ps.idpsn WHERE nt.idnot=:idnot";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idnot = $this->getIdnot();
		$result->bindParam(":idnot", $idnot);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	 function save(){
		$sql = "INSERT INTO notificacion (titnot, fhnot,ffinnot, desnot,idpsn) VALUES (:titnot, :fhnot,:ffinnot, :desnot, :idpsn)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$titnot = $this->getTitnot();
		$result->bindParam(":titnot", $titnot);
		$fhnot = $this->getFhnot();
		$result->bindParam(":fhnot", $fhnot);
		$ffinnot = $this->getFfinnot();
		$result->bindParam(":ffinnot", $ffinnot);
		$desnot = $this->getDesnot();
		$result->bindParam(":desnot", $desnot);
		$idpsn = $this->getIdpsn();
		$result->bindParam(":idpsn", $idpsn);
		$result->execute();
	}
	 function edit(){
		$sql = "UPDATE notificacion SET titnot=:titnot, fhnot=:fhnot,ffinnot=:ffinnot, idpsn=:idpsn, WHERE idnot=:idnot";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idnot = $this->getIdnot();
		$result->bindParam(":idnot", $idnot);
		$titnot = $this->getTitnot();
		$result->bindParam(":titnot", $titnot);
		$fhnot = $this->getFhnot();
		$result->bindParam(":fhnot", $fhnot);
		$ffinnot = $this->getFfinnot();
		$result->bindParam(":ffinnot", $ffinnot);
		$desnot = $this->getDesnot();
		$result->bindParam(":desnot", $desnot);
		$idpsn = $this->getIdpsn();
		$result->bindParam(":idpsn", $idpsn);
		$result->execute();
	}

	 function del(){
		$sql = "DELETE FROM notificacion WHERE idnot=:idnot";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idnot = $this->getIdnot();
		$result->bindParam(":idnot", $idnot);
		$result->execute();
	}
}
?>