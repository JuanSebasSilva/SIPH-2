<?php
class Mvar {
    // Atributos
    private $idvar;
    private $nomvar;
    private $tpovar;
    private $idviv;

    function getIdvar(){
        return $this->idvar;
    }
    function getNomvar(){
        return $this->nomvar;
    }
    function getTpovar(){
        return $this->tpovar;
    }
    function getIdviv(){
        return $this->idviv;
    }

    function setIdvar($idvar){
        $this->idvar = $idvar;
    }
    function setNomvar($nomvar){
        $this->nomvar = $nomvar;
    }
    function setTpovar($tpovar){
        $this->tpovar = $tpovar;
    }
    function setIdviv($idviv){
        $this->idviv = $idviv;
    }

	//metodos publicos
    public function getAll(){
        $res = NULL;
        $sql = "SELECT va.idvar, va.nomvar, va.tpovar, v.idval, v.nomval, vv.idviv, vv.idpsn, vv.tpoviv, vv.nomviv, vv.depviv 
        FROM vario AS va INNER JOIN valor AS v ON va.tpovar=v.idval INNER JOIN vivienda AS vv ON va.idviv=vv.idviv";
        $modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
    }

    public function getOne(){
        $sql = "SELECT va.idvar, va.nomvar, va.tpovar, v.idval, v.nomval, vv.idviv, vv.idpsn, vv.tpoviv, vv.nomviv, vv.depviv 
        FROM vario AS va INNER JOIN valor AS v ON va.tpovar=v.idval INNER JOIN vivienda AS vv ON va.idviv=vv.idviv WHERE va.idvar=:idvar";
        $modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idvar = $this->getIdvar();
		$result->bindParam(":idvar", $idvar);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
    }

    // Guardar un nuevo registro
    public function save(){
        $sql = "INSERT INTO vario (nomvar, tpovar, idviv) VALUES (:nomvar, :tpovar, :idviv)";
        $modelo = new Conexion();
		$conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nomvar = $this->getNomvar();
        $result->bindParam(":nomvar", $nomvar);
        $tpovar = $this->getTpovar();
        $result->bindParam(":tpovar", $tpovar);
        $idviv = $this->getIdviv();
        $result->bindParam(":idviv", $idviv);
        $result->execute();
    }


    public function edit(){
        $sql = "UPDATE vario SET nomvar=:nomvar, tpovar=:tpovar, idviv=:idviv WHERE idvar=:idvar";
        $modelo = new Conexion();
		$conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idvar = $this->getIdvar();
        $result->bindParam(":idvar", $idvar);
        $nomvar = $this->getNomvar();
        $result->bindParam(":nomvar", $nomvar);
        $tpovar = $this->getTpovar();
        $result->bindParam(":tpovar", $tpovar);
        $idviv = $this->getIdviv();
        $result->bindParam(":idviv", $idviv);
        $result->execute();
    }


    public function del(){
        $sql = "DELETE FROM vario WHERE idvar=:idvar";
        $modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idvar = $this->getIdvar();
		$result->bindParam(":idvar", $idvar);
		$result->execute();
    }
}
?>