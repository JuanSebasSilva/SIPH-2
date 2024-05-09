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

    public function getIdpsn(){
        return $this->$idpsn;
    }
    public function getNompsn(){
        return $this->$nompsn;
    }
    public function getApepsn(){
        return $this->$apepsn;
    }
    public function getDocpsn(){
        return $this->$docpsn;
    }
    public function getTpdcpsn(){
        return $this->$tpdcpsn;
    }
    public function getTelpsn(){
        return $this->$telpsn;
    }
    public function getEmapsn(){
        return $this->$emapsn;
    }
    public function getPasspsn(){
        return $this->$passpsn;
    }
    public function getActpsn(){
        return $this->$actpsn;
    }
    public function getIdper(){
        return $this->$idper;
    }
    public function getGenpsn(){
        return $this->$genpsn;
    }
    public function getFhnapsn(){
        return $this->$fhnapsn;
    }

    public function setIdpsn(){
        $this->idpsn = $idpsn;
    }
    public function setNompsn(){
        $this->nompsn = $nompsn;
    }
    public function setApepsn(){
        $this->apepsn = $apepsn;
    }
    public function setDocpsn(){
        $this->docpsn = $docpsn;
    }
    public function setTpdcpsn(){
        $this->tpdcpsn = $tpdcpsn;
    }
    public function setTelpsn(){
        $this->telpsn = $telpsn;
    }
    public function setEmapsn(){
        $this->emapsn = $emapsn;
    }
    public function setPasspsn(){
        $this->passpsn = $passpsn;
    }
    public function setActpsn(){
        $this->actpsn = $actpsn;
    }
    public function setIdper(){
        $this->idper = $idper;
    }
    public function setGenpsn(){
        $this->genpsn = $genpsn;
    }
    public function setFhnapsn(){
        $this->fhnapsn = $fhnapsn;
    }

    public function getAll(){
        $res = NULL;
        $sql = "SELECT * FROM persona";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne(){
        $res = NULL;
        $sql = "SELECT * FROM persona WHERE idpsn=:idpsn";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idpsn = $this->getIdpsn();
        $result->bindParam(":idpsn", $idpsn);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save(){
        $sql = "INSERT INTO persona(nompsn, apepsn, docpsn, tpdcpsn, telpsn, emapsn, passpsn, actpsn, idper, genpsn, fhnapsn) VALUES (:nompsn, :apepsn, :docpsn, :tpdcpsn, :telpsn, :emapsn, :passpsn, :actpsn, :idper, :genpsn, :fhnapsn)";
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
        $sql = "UPDATE persona SET nompsn=:nompsn, apepsn=:apepsn, docpsn=:docpsn, tpdcpsn=:tpdcpsn, telpsn=:telpsn, emapsn=:emapsn, passpsn=:passpsn, actpsn=:actpsn, idper=:idper, genpsn=:genpsn, fhnapsn=:fhnapsn WHERE idpsn=:idpsn";
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