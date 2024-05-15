<?php 
class Mval{
	//atributosidval idineg
	private $idval;
	private $nomval;
	private $iddom;
	private $parval;
	private $actval;

	//metodos get
	function getIdval(){
		return $this->idval;
	}
	function getNomval(){
		return $this->nomval;
	}
	function getIddom(){
		return $this->iddom;
	}
	function getParval(){
		return $this->parval;
	}
	function getActval(){
		return $this->actval;
	}
    
	//metodos SET
	function setIdval($idval){
		$this->idval =$idval;
	}
	function setNomval($nomval){
		$this->nomval =$nomval;
	}
	function setIddom($iddom){
		$this->iddom =$iddom;
	}
	function setParval($parval){
		$this->parval =$parval;
	}
	function setActval($actval){
		$this->actval =$actval;
	}
    
	//metodos publicos
	public function getAll(){
		$res = NULL;
		$sql = "SELECT * FROM valor";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function getOne(){
		$res = NULL;
        $sql = "SELECT * FROM valor WHERE idval=:idval";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idval = $this->getIdval();
		$result->bindParam(":idval", $idval);
		$result->execute();
		$res = $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function save(){
		$sql = "INSERT INTO valor (nomval, iddom, parval, actval) VALUES (:nomval, :iddom, :parval, :actval)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nomval = $this->getNomval();
		$result->bindParam(":nomval", $nomval);
		$iddom = $this->getIddom();
		$result->bindParam(":iddom", $iddom);
		$parval = $this->getParval();
		$result->bindParam(":parval", $parval);
		$actval = $this->getActval();
		$result->bindParam(":actval", $actval);
		$result->execute();
	}
	public function edit(){
		$sql = "UPDATE valor SET nomval=:nomval, iddom=:iddom, parval=:parval, actval=:actval WHERE idval=:idval";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idval = $this->getIdval();
		$result->bindParam(":idval", $idval);
		$nomval = $this->getNomval();
		$result->bindParam(":nomval", $nomval);
		$iddom = $this->getIddom();
		$result->bindParam(":iddom", $iddom);
		$parval = $this->getParval();
		$result->bindParam(":parval", $parval);
		$actval = $this->getActval();
		$result->bindParam(":actval", $actval);
		$result->execute();
	}

	public function del(){
		$sql = "DELETE FROM valor WHERE idval=:idval";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idval = $this->getIdval();
		$result->bindParam(":idval", $idval);
		$result->execute();
	}

    public function getTip($idval){
		$sql = "SELECT idval, nomval, iddom FROM valor";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
	}
}
?>