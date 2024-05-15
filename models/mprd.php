<?php 
class Mprd{
	//atributos
	private $idprd;
	private $finiprd;
	private $ffinprd;
	private $actprd;

	//metodos get
	function getIdprd(){
		return $this->idprd;
	}
	function getFiniprd(){
		return $this->finiprd;
	}
	function getFfinprd(){
		return $this->ffinprd;
	}
	function getActprd(){
		return $this->actprd;
	}
	//metodos SET
	function setIdprd($idprd){
		$this->idprd =$idprd;
	}
	function setFiniprd($finiprd){
		$this->finiprd =$finiprd;
	}
	function setFfinprd($ffinprd){
		$this->ffinprd =$ffinprd;
	}
	function setActprd($actprd){
		$this->actprd =$actprd;
	}
	//metodos publicos
	public function getAll(){
		$res = NULL;
		$sql = "SELECT * FROM periodo";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function getOne(){
		$res = NULL;
		$sql = "SELECT * FROM periodo WHERE idprd=:idprd";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idprd = $this->getIdprd();
		$result->bindParam(":idprd", $idprd);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function save(){
		$sql = "INSERT INTO periodo (finiprd, ffinprd,actprd) VALUES (:finiprd, :ffinprd,:actprd)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$finiprd = $this->getFiniprd();
		$result->bindParam(":finiprd", $finiprd);
		$ffinprd = $this->getFfinprd();
		$result->bindParam(":ffinprd", $ffinprd);
		$actprd = $this->getActprd();
		$result->bindParam(":actprd", $actprd);
		$result->execute();
	}
	public function edit(){
		$sql = "UPDATE periodo SET finiprd=:finiprd, ffinprd=:ffinprd,actprd=:actprd WHERE idprd=:idprd";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idprd = $this->getIdprd();
		$result->bindParam(":idprd", $idprd);
		$finiprd = $this->getFiniprd();
		$result->bindParam(":finiprd", $finiprd);
		$ffinprd = $this->getFfinprd();
		$result->bindParam(":ffinprd", $ffinprd);
		$actprd = $this->getActprd();
		$result->bindParam(":actprd", $actprd);
		$result->execute();
	}

	public function del(){
		$sql = "DELETE FROM periodo WHERE idprd=:idprd";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idprd = $this->getIdprd();
		$result->bindParam(":idprd", $idprd);
		$result->execute();
	}
}
?>