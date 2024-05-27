<?php 
class Mineg{
	//atributosidineg
	private $idineg;
	private $tpoineg;
	private $fhineg;
	private $cctineg;
	private $desineg;
    private $valineg;
	private $sopineg;
	private $idpsn;
	private $idprd;

	//metodos get
	return $this->idineg;
	function getIdineg(){
	}
	function getTpoineg(){
		return $this->tpoineg;
	}
	function getFhineg(){
		return $this->fhineg;
	}
	function getCctineg(){
		return $this->cctineg;
	}
	function getDesineg(){
		return $this->desineg;
	}
    function getValineg(){
		return $this->valineg;
	}
     function getSopineg(){
		return $this->sopineg;
	}
    function getIdpsn(){
		return $this->idpsn;
	}
    function getIdprd(){
		return $this->idprd;
	}
	//metodos SET
	function setIdineg($idineg){
		$this->idineg =$idineg;
	}
	function setTpoineg($tpoineg){
		$this->tpoineg =$tpoineg;
	}
	function setFhineg($fhineg){
		$this->fhineg =$fhineg;
	}
	function setCctineg($cctineg){
		$this->cctineg =$cctineg;
	}
	function setDesineg($desineg){
		$this->desineg =$desineg;
	}
    function setValineg($valineg){
		$this->valineg =$valineg;
	}
    function setSopineg($sopineg){
		$this->sopineg =$sopineg;
	}
    function setIdpsn($idpsn){
		$this->idpsn =$idpsn;
	}
    function setIdprd($idprd){
		$this->idprd =$idprd;
	}
	//metodos publicos
	public function getAll(){
		$res = NULL;
		//$sql = "SELECT ie.idineg, ie.tpoineg, ie.fhineg, ie.cctineg, ie.desineg, ie.valineg, ie.sopineg, ps.idpsn, ie.idprd FROM ingegr AS ie INNER JOIN persona AS ps ON ie.idpsn=ps.idpsn";
		//$sql = "SELECT ie.idineg, ie.fhineg, ie.cctineg, ie.desineg, ie.valineg, ie.sopineg, ps.idpsn AS ip, ps.nompsn AS np, pr.idprd AS ir, pr.finiprd AS fi, pr.ffinprd AS ff FROM ingegr AS ie INNER JOIN persona AS ps ON ie.idpsn=ps.idpsn INNER JOIN periodo AS pr ON ie.idprd=pr.idprd";
		$sql = "SELECT ie.idineg, v.idval AS iv, v.nomval AS nv, d.iddom AS id, d.nomdom AS nd, ie.fhineg, ie.cctineg, ie.desineg, ie.valineg, ie.sopineg, ps.idpsn AS ip, ps.nompsn AS np, pr.idprd AS ir, pr.finiprd AS fi, pr.ffinprd AS ff
		FROM ingegr AS ie
		INNER JOIN persona AS ps ON ie.idpsn=ps.idpsn
		INNER JOIN periodo AS pr ON ie.idprd=pr.idprd
		INNER JOIN valor AS v ON ie.tpoineg=v.idval
		INNER JOIN dominio AS d ON v.iddom=d.iddom";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function getOne(){
		$res = NULL;
		//$sql = "SELECT ie.idineg, ie.fhineg, ie.cctineg, ie.desineg, ie.valineg, ie.sopineg, ps.idpsn AS ip, ps.nompsn AS np FROM ingegr AS ie INNER JOIN persona AS ps ON ie.idpsn=ps.idpsn WHERE ie.idineg=:idineg";
		$sql = "SELECT ie.idineg, v.idval AS iv, v.nomval AS nv, d.iddom AS id, d.nomdom AS nd, ie.fhineg, ie.cctineg, ie.desineg, ie.valineg, ie.sopineg, ps.idpsn AS ip, ps.nompsn AS np, pr.idprd AS ir, pr.finiprd AS fi, pr.ffinprd AS ff
		FROM ingegr AS ie INNER JOIN persona AS ps ON ie.idpsn=ps.idpsn
		INNER JOIN periodo AS pr ON ie.idprd=pr.idprd
		INNER JOIN valor AS v ON ie.tpoineg=v.idval
		INNER JOIN dominio AS d ON v.iddom=d.iddom
		WHERE ie.idineg=:idineg";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idineg = $this->getIdineg();
		$result->bindParam(":idineg", $idineg);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function save(){
		$sql = "INSERT INTO ingegr (tpoineg, fhineg, cctineg, desineg, valineg, sopineg, idpsn, idprd) VALUES (:tpoineg, :fhineg, :cctineg, :desineg, :valineg, :sopineg, :idpsn, :idprd)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$tpoineg = $this->getTpoineg();
		$result->bindParam(":tpoineg", $tpoineg);
		$fhineg = $this->getFhineg();
		$result->bindParam(":fhineg", $fhineg);
		$cctineg = $this->getCctineg();
		$result->bindParam(":cctineg", $cctineg);
		$desineg = $this->getDesineg();
		$result->bindParam(":desineg", $desineg);
        $valineg = $this->getValineg();
        $result->bindParam(":valineg", $valineg);
        $sopineg = $this->getSopineg();
        $result->bindParam(":sopineg", $sopineg);
        $idpsn = $this->getIdpsn();
        $result->bindParam(":idpsn", $idpsn);
        $idprd = $this->getIdprd();
        $result->bindParam(":idprd", $idprd);
		$result->execute();
	}
	public function edit(){
		$sql = "UPDATE ingegr SET tpoineg=:tpoineg, fhineg=:fhineg, cctineg=:cctineg, desineg=:desineg, valineg=:valineg, sopineg=:sopineg, idpsn=:idpsn, idprd=:idprd WHERE idineg=:idineg";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idineg = $this->getIdineg();
		$result->bindParam(":idineg", $idineg);
		$tpoineg = $this->getTpoineg();
		$result->bindParam(":tpoineg", $tpoineg);
		$fhineg = $this->getFhineg();
		$result->bindParam(":fhineg", $fhineg);
		$cctineg = $this->getCctineg();
		$result->bindParam(":cctineg", $cctineg);
		$desineg = $this->getDesineg();
		$result->bindParam(":desineg", $desineg);
		$valineg = $this->getValineg();
        $result->bindParam(":valineg", $valineg);
        $sopineg = $this->getSopineg();
        $result->bindParam(":sopineg", $sopineg);
        $idpsn = $this->getIdpsn();
        $result->bindParam(":idpsn", $idpsn);
        $idprd = $this->getIdprd();
        $result->bindParam(":idprd", $idprd);
		$result->execute();
	}

	public function del(){
		$sql = "DELETE FROM ingegr WHERE idineg=:idineg";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idineg = $this->getIdineg();
		$result->bindParam(":idineg", $idineg);
		$result->execute();
	}
}
?>
SELECT ie.idineg, ie.tpoineg, ie.fhineg, ie.cctineg, ie.desineg, ie.valineg, ie.sopineg, tpie.idval, tpie.nomval, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.emapsn, ps.idper, pr.idprd, pr.finiprd, pr.ffinprd 
FROM ingegr AS ie INNER JOIN valor AS tpie ON ie.tpoineg=tpie.idval INNER JOIN persona AS ps ON ie.idpsn=ps.idpsn INNER JOIN periodo AS pr ON ie.idprd=pr.idprd