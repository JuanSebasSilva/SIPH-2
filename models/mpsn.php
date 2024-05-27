<?php
class Mpsn{
    private $idpsn;
    private $nompsn;
    private $apepsn;
    private $docpsn;
    private $tpdcpsn;
    private $telpsn;
    private $emapsn;
    private $passpsn;
    private $actpsn;
    private $idper;
    private $genpsn;
    private $fhnapsn;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               

    function getIdpsn(){
        return $this->$idpsn;
    }
    function getNompsn(){
        return $this->$nompsn;
    }
    function getApepsn(){
        return $this->$apepsn;
    }
    function getDocpsn(){
        return $this->$docpsn;
    }
    function getTpdcpsn(){
        return $this->$tpdcpsn;
    }
    function getTelpsn(){
        return $this->$telpsn;
    }
    function getEmapsn(){
        return $this->$emapsn;
    }
    function getPasspsn(){
        return $this->$passpsn;
    }
    function getActpsn(){
        return $this->$actpsn;
    }
    function getIdper(){
        return $this->$idper;
    }
    function getGenpsn(){
        return $this->$genpsn;
    }
    function getFhnapsn(){
        return $this->$fhnapsn;
    }

    function setIdpsn($idpsn){
        $this->idpsn = $idpsn;
    }
    function setNompsn($nompsn){
        $this->nompsn = $nompsn;
    }
    function setApepsn($apepsn){
        $this->apepsn = $apepsn;
    }
    function setDocpsn($docpsn){
        $this->docpsn = $docpsn;
    }
    function setTpdcpsn($tpdcpsn){
        $this->tpdcpsn = $tpdcpsn;
    }
    function setTelpsn($telpsn){
        $this->telpsn = $telpsn;
    }
    function setEmapsn($emapsn){
        $this->emapsn = $emapsn;
    }
    function setPasspsn($passpsn){
        $this->passpsn = $passpsn;
    }
    function setActpsn($actpsn){
        $this->actpsn = $actpsn;
    }
    function setIdper($idper){
        $this->idper = $idper;
    }
    function setGenpsn($genpsn){
        $this->genpsn = $genpsn;
    }
    function setFhnapsn($fhnapsn){
        $this->fhnapsn = $fhnapsn;
    }

    public function getAll(){
        $res = NULL;
        $sql = "SELECT ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.telpsn, ps.emapsn, ps.passpsn, ps.actpsn, ps.genpsn, ps.fhnapsn,
        pf.idper, pf.nomper, pf.pagini,
        td.idval AS tdiv, td.nomval AS tdnv, 
        gv.idval AS gviv, gv.nomval AS gvnv
        FROM persona AS ps INNER JOIN valor AS td ON ps.tpdcpsn=td.idval 
        INNER JOIN valor AS gv ON ps.genpsn=gv.idval
        INNER JOIN perfil AS pf ON ps.idper=pf.idper";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne(){
        $res = NULL;
        $sql = "SELECT ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.telpsn, ps.emapsn, ps.passpsn, ps.actpsn, ps.genpsn, ps.fhnapsn,
        pf.idper, pf.nomper, pf.pagini,
        td.idval AS tdiv, td.nomval AS tdnv, 
        gv.idval AS gviv, gv.nomval AS gvnv
        FROM persona AS ps INNER JOIN valor AS td ON ps.tpdcpsn=td.idval 
        INNER JOIN valor AS gv ON ps.genpsn=gv.idval
        INNER JOIN perfil AS pf ON ps.idper=pf.idper WHERE ps.idpsn=:idpsn";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idpsn = $this->getIdpsn();
        $result->bindParam(":idpsn", $idpsn);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getVal(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idval, nomval, iddom FROM valor";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save(){
        $sql = "INSERT INTO persona(nompsn, apepsn, docpsn, tpdcpsn, telpsn, emapsn, passpsn, actpsn, idper, genpsn, fhnapsn) 
                VALUES (:nompsn, :apepsn, :docpsn, :tpdcpsn, :telpsn, :emapsn, :passpsn, :actpsn, :idper, :genpsn, :fhnapsn)";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nompsn = $this->getNompsn();
        $result->bindParam(":nompsn", $nompsn)
        $apepsn = $this->getApepsn();
        $result->bindParam(":apepsn", $apepsn)
        $docpsn = $this->getDocpsn();
        $result->bindParam(":docpsn", $docpsn)
        $tpdcpsn = $this->getTpdcpsn();
        $result->bindParam(":tpdcpsn", $tpdcpsn)
        $telpsn = $this->getTelpsn();
        $result->bindParam(":telpsn", $telpsn)
        $emapsn = $this->getEmapsn();
        $result->bindParam(":emapsn", $emapsn)
        $passpsn = $this->getPasspsn();
        $result->bindParam(":passpsn", $passpsn)
        $actpsn = $this->getActpsn();
        $result->bindParam(":actpsn", $actpsn)
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper)
        $genpsn = $this->getGenpsn();
        $result->bindParam(":genpsn", $genpsn)
        $fhnapsn = $this->getFhnapsn();
        $result->bindParam(":fhnapsn", $fhnapsn)
        $result->execute();
    }

    public function edit(){
        $sql = "UPDATE persona SET nompsn=:nompsn, apepsn=:apepsn, docpsn=:docpsn, tpdcpsn=:tpdcpsn, telpsn=:telpsn, emapsn=:emapsn, 
                passpsn=:passpsn, actpsn=:actpsn, idper=:idper, genpsn=:genpsn, fhnapsn=:fhnapsn WHERE idpsn=:idpsn";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idpsn = $this->getIdpsn();
        $result->bindParam(":idpsn", $idpsn)
        $nompsn = $this->getNompsn();
        $result->bindParam(":nompsn", $nompsn)
        $apepsn = $this->getApepsn();
        $result->bindParam(":apepsn", $apepsn)
        $docpsn = $this->getDocpsn();
        $result->bindParam(":docpsn", $docpsn)
        $tpdcpsn = $this->getTpdcpsn();
        $result->bindParam(":tpdcpsn", $tpdcpsn)
        $telpsn = $this->getTelpsn();
        $result->bindParam(":telpsn", $telpsn)
        $emapsn = $this->getEmapsn();
        $result->bindParam(":emapsn", $emapsn)
        $passpsn = $this->getPasspsn();
        $result->bindParam(":passpsn", $passpsn)
        $actpsn = $this->getActpsn();
        $result->bindParam(":actpsn", $actpsn)
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper)
        $genpsn = $this->getGenpsn();
        $result->bindParam(":genpsn", $genpsn)
        $fhnapsn = $this->getFhnapsn();
        $result->bindParam(":fhnapsn", $fhnapsn)
        $result->execute();
    }

    public function del(){
        $sql = "DELETE FROM persona WHERE idpsn=:idpsn";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idpsn = $this->getIdpsn();
        $result->bindParam(":idpsn", $idpsn);
        $result->execute();
    }
}
?>