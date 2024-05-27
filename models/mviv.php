<?php 
class Mviv{
	//atributos
	private $idviv;
	private $nomviv;
	private $tpoviv;
	private $depviv;
	private $idpsn;
	//metodos get
	function getIdviv(){
		return $this->idviv;
	}
	function getNomviv(){
		return $this->nomviv;
	}
	function getTpoviv(){
		return $this->tpoviv;
	}
	function getDepviv(){
		return $this->depviv;
	}
	function getIdpsn(){
		return $this->idpsn;
	}
	//metodos SET
	function setIdviv($idviv){
		$this->idviv =$idviv;
	}
	function setNomviv($nomviv){
		$this->nomviv =$nomviv;
	}
	function setTpoviv($tpoviv){
		$this->tpoviv =$tpoviv;
	}
	function setDepviv($depviv){
		$this->depviv =$depviv;
	}
	function setIdpsn($idpsn){
		$this->idpsn =$idpsn;
	}
	//metodos publicos
	public function getAll(){
		$res = NULL;
		/* $sql = "SELECT v.idpsn, v.tpoviv, w.idviv AS cd, w.nomviv AS nd
		, v.idviv AS cm,v.nomviv AS nm FROM
		 vivienda AS v LEFT JOIN vivienda AS w ON v.depviv
		 =w.idviv"; */
		$sql = "SELECT vi.idviv AS viiv, vi.tpoviv AS vitp, vi.nomviv AS vinv, vv.idviv AS vviv, vv.tpoviv AS vvtv, vv.nomviv AS vvnv, v.idval, v.nomval, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.telpsn, ps.emapsn, ps.genpsn, ps.fhnapsn 
		FROM vivienda AS vi INNER JOIN vivienda AS vv ON vi.depviv=vv.idviv INNER JOIN valor AS v ON vi.tpoviv=v.idval INNER JOIN persona AS ps ON vi.idpsn=ps.idpsn";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function getOne(){
		$res = NULL;
		$sql = "SELECT vi.idviv AS viiv, vi.tpoviv AS vitp, vi.nomviv AS vinv, vv.idviv AS vviv, vv.tpoviv AS vvtv, vv.nomviv AS vvnv, v.idval, v.nomval, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.telpsn, ps.emapsn, ps.genpsn, ps.fhnapsn 
		FROM vivienda AS vi INNER JOIN vivienda AS vv ON vi.depviv=vv.idviv INNER JOIN valor AS v ON vi.tpoviv=v.idval INNER JOIN persona AS ps ON vi.idpsn=ps.idpsn WHERE vi.idviv=:idviv";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idviv = $this->getIdviv();
		$result->bindParam(":idviv", $idviv);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function save(){
		$sql = "INSERT INTO vivienda (nomviv, tpoviv,depviv, idpsn) VALUES (:nomviv, :tpoviv,:depviv, :idpsn)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nomviv = $this->getNomviv();
		$result->bindParam(":nomviv", $nomviv);
		$tpoviv = $this->getTpoviv();
		$result->bindParam(":tpoviv", $tpoviv);
		$depviv = $this->getDepviv();
		$result->bindParam(":depviv", $depviv);
		$idpsn = $this->getIdpsn();
		$result->bindParam(":idpsn", $idpsn);
		$result->execute();
	}
	public function edit(){
		$sql = "UPDATE vivienda SET nomviv=:nomviv, tpoviv=:tpoviv,depviv=:depviv, idpsn=:idpsn WHERE idviv=:idviv";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idviv = $this->getIdviv();
		$result->bindParam(":idviv", $idviv);
		$nomviv = $this->getNomviv();
		$result->bindParam(":nomviv", $nomviv);
		$tpoviv = $this->getTpoviv();
		$result->bindParam(":tpoviv", $tpoviv);
		$depviv = $this->getDepviv();
		$result->bindParam(":depviv", $depviv);
		$idpsn = $this->getIdpsn();
		$result->bindParam(":idpsn", $idpsn);
		$result->execute();
	}

	public function del(){
		$sql = "DELETE FROM vivienda WHERE idviv=:idviv";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idviv = $this->getIdviv();
		$result->bindParam(":idviv", $idviv);
		$result->execute();
	}
	
	public function getDep($depviv){
		$resultado = NULL;
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$sql="SELECT * FROM vivienda WHERE depviv=:depviv
			ORDER BY nomviv";
		$result = $conexion->prepare($sql);
		$result->bindParam(":depviv", $depviv);
		$result->execute();
		$resultado=$result->fetchall(PDO::FETCH_ASSOC);
		return $resultado;
	}
}
?>