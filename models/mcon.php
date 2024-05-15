<?php
class Mcon{

    /*Atributos*/
    private $idcon;
    private $nitcon;
    private $titcon;
    private $imgcon;
    private $descon;
    private $piecon;

    /*Metodos Get*/

     function getIdcon(){
        return $this->idcon;
    }
     function getNitcon(){
        return $this->nitcon;
    }
     function getTitcon(){
        return $this->titcon;
    }
     function getImgcon(){
        return $this->imgcon;
    }
     function getDescon(){
        return $this->descon;
    }
     function getPiecon(){
        return $this->piecon;
    }

    /*Metodos Set*/

     function setIdcon($idcon){
        $this->idcon = $idcon;
    }
     function setNitcon($nitcon){
        $this->nitcon = $nitcon;
    }
     function setTitcon($titcon){
        $this->titcon = $titcon;
    }
     function setImgcon($imgcon){
        $this->imgcon = $imgcon;
    }
     function setDescon($descon){
        $this->descon = $descon;
    }
     function setPiecon($piecon){
        $this->piecon = $piecon;
    }

    /*Metodos Publicos*/

    public function getAll(){
        $res = NULL;
        $sql = "SELECT * FROM configuracion";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result ->execute();
        $res = $result ->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne(){
        $res = NULL;
        $sql = "SELECT * FROM configuracion WHERE idcon=:idcon";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idcon = $this->getIdcon();
        $result ->bindParam(":idcon", $idcon);
        $result ->execute();
        $res = $result -> fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save(){
        $res = NULL;
        $sql = "INSERT INTO config(nitcon, titcon, imgcon, descon, piecon)
        VALUES(:nitcon, :titcon, :imgcon, :descon, :piecon)";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nitcon= $this->getNitcon();
        $result ->bindParam(":nitcon", $nitcon);
        $titcon= $this->getTitcon();
        $result ->bindParam(":titcon", $titcon);
        $imgcon= $this->getImgcon();
        $result ->bindParam(":imgcon", $imgcon);
        $descon= $this->getDescon();
        $result ->bindParam(":descon", $descon);
        $piecon= $this->getPiecon();
        $result ->bindParam(":piecon", $piecon);
        $result ->execute();
    }

    public function edit(){
        $sql = "UPDATE cofiguracion SET nitcon=:nitcon, titcon=:titcon, imgcon=:imgcon, descon=:descon, piecon=:piecon WHERE idcon=:idcon";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idcon = $this->getIdcon();
        $result->bindParam(":idcon", $idcon);
        $nitcon= $this->getNitcon();
        $result ->bindParam(":nitcon", $nitcon);
        $titcon= $this->getTitcon();
        $result ->bindParam(":titcon", $titcon);
        $imgcon= $this->getImgcon();
        $result ->bindParam(":imgcon", $imgcon);
        $descon= $this->getDescon();
        $result ->bindParam(":descon", $descon);
        $piecon= $this->getPiecon();
        $result ->bindParam(":piecon", $piecon);
        $result ->execute();
    }

    public function del(){
        $sql = "DELETE FROM configuracion WHERE idcon=:idcon";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idcon = $this->getIdcon();
        $result->bindParam(":idcon", $idcon);
        $result->execute();
    }
}

?>