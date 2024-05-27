<?php
class Mdoc{
    //atributos
    private $iddoc;
    private $nomdoc;
    private $idpsn;
    private $fhdoc;
    private $rutdoc;
    private $tpodoc;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
    //metodo get
     function getIddoc(){
        return $this->iddoc;
    }
     function getNomdoc(){
        return $this->nomdoc;
    }
     function getIdpsn(){
        return $this->idpsn;
    }
     function getFhdoc(){
        return $this->fhdoc;
    }
     function getRutdoc(){
        return $this->rutdoc;
    }
     function getTpodoc(){
        return $this->tpodoc;
    }

    //metodo set
     function setIddoc($iddoc){
        $this->iddoc = $iddoc;
    }
     function setNomdoc($nomdoc){
        $this->nomdoc = $nomdoc;
    }
     function setIdpsn($idpsn){
        $this->idpsn = $idpsn;
    }
     function setFhdoc($fhdoc){
        $this->fhdoc = $fhdoc;
    }
     function setRutdoc($rutdoc){
        $this->rutdoc = $rutdoc;
    }
     function setTpodoc($tpodoc){
        $this->tpodoc = $tpodoc;
    }
    
   
    //metodos publicos
    public function getAll(){
        $res = NULL;
        $sql = "SELECT dc.iddoc, dc.nomdoc, dc.fhdoc, dc.rutdoc, dc.tpodoc, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.telpsn, ps.emapsn, ps.idper, ps.genpsn, tpd.idval, tpd.nomval 
        FROM documentacion AS dc INNER JOIN persona AS ps ON dc.idpsn=ps.idpsn INNER JOIN valor AS tpd ON dc.tpodoc=tpd.idval";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne(){
        $res = NULL;
        $sql = "SELECT dc.iddoc, dc.nomdoc, dc.fhdoc, dc.rutdoc, dc.tpodoc, ps.idpsn, ps.nompsn, ps.apepsn, ps.docpsn, ps.tpdcpsn, ps.telpsn, ps.emapsn, ps.idper, ps.genpsn, tpd.idval, tpd.nomval 
        FROM documentacion AS dc INNER JOIN persona AS ps ON dc.idpsn=ps.idpsn INNER JOIN valor AS tpd ON dc.tpodoc=tpd.idval WHERE dc.iddoc=:iddoc";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddoc = $this->getIddoc();
        $result->bindParam(":iddoc", $iddoc);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save(){
        $sql = "INSERT INTO documentacion(nomdoc, idpsn, fhdoc, rutdoc, tpodoc) VALUES (:nomdoc, :idpsn, :fhdoc, :rutdoc, :tpodoc)";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nomdoc = $this->getNomdoc();
        $result->bindParam(":nomdoc", $nomdoc);
        $idpsn = $this->getIdpsn();
        $result->bindParam(":idpsn", $idpsn);
        $fhdoc = $this->getFhdoc();
        $result->bindParam(":fhdoc", $fhdoc);
        $rutdoc = $this->getRutdoc();
        $result->bindParam(":rutdoc", $rutdoc);
        $tpodoc = $this->getTpodoc();
        $result->bindParam(":tpodoc", $tpodoc);
        $result->execute();
    }

    public function edit(){
        $sql = "UPDATE documentacion SET nomdoc=:nomdoc, idpsn=:idpsn, fhdoc=:fhdoc, rutdoc=:rutdoc, tpodoc=:tpodoc WHERE iddoc=:iddoc";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddoc = $this->getIddoc();
        $result->bindParam(":iddoc", $iddoc);
        $nomdoc = $this->getNomdoc();
        $result->bindParam(":nomdoc", $nomdoc);
        $idpsn = $this->getIdpsn();
        $result->bindParam(":idpsn", $idpsn);
        $fhdoc = $this->getFhdoc();
        $result->bindParam(":fhdoc", $fhdoc);
        $rutdoc = $this->getRutdoc();
        $result->bindParam(":rutdoc", $rutdoc);
        $tpodoc = $this->getTpodoc();
        $result->bindParam(":tpodoc", $tpodoc);
        $result->execute();
    }

    public function del(){
        $sql = "DELETE FROM documentacion WHERE iddoc=:iddoc";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $iddoc = $this->getIddoc();
        $result->bindParam(":iddoc", $iddoc);
        $result->execute();
    }
}
?>