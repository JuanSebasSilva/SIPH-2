<?php
class Mpag{
    private $idpag;
    private $nompag;
    private $rutpag;
    private $mospag;
    private $ordpag;
    private $icopag;

    function getidpag(){
        return $this->idpag;
    }
    function getnompag(){
        return $this->nompag;
    }
    function getrutpag(){
        return $this->rutpag;
    }
    function getmospag(){
        return $this->mospag;
    }
    function getordpag(){
        return $this->ordpag;
    }
    function geticopag(){
        return $this->icopag;
    }

    function setidpag($idpag){
        $this->idpag = $idpag;
    }
    function setnompag($nompag){
        $this->nompag = $nompag;
    }
    function setrutpag($rutpag){
        $this->rutpag = $rutpag;
    }
    function setmospag($mospag){
        $this->mospag = $mospag;
    }
    function setordpag($ordpag){
        $this->ordpag = $ordpag;
    }
    function seticopag($icopag){
        $this->icopag = $icopag;
    }

    public function getAll(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM pagina";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT * FROM pagina WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $idpag = $this->getIdpag();
        $result->bindParam(":idpag", $dpag);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save(){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO pagina(nompag, rutpag, mospag, ordpag, icopag) VALUES(nompag, rutpag, mospag, ordpag, icopag)";
        $result = $conexion->prepare($sql);
        $nompag = $this->getNompag();
        $result->bindParam("nompag", $nompag);
        $rutpag = $this->getRutpag();
        $result->bindParam("rutpag", $rutpag);
        $mospag = $this->getMospag();
        $result->bindParam("mospag", $mospag);
        $ordpag = $this->getOrdpag();
        $result->bindParam("ordpag", $ordpag);
        $icopag = $this->getIcopag();
        $result->bindParam("icopag", $icopag);
        $result->execute();
    }

    public function edit(){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE pagina SET nompag=:nompag, rutpag=:rutpag, mospag=:mospag, ordpag=:ordpag, icopag=:icopag WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $idpag = $this->getIdpag();
        $result->bindParam(":idpag", $idpag);
        $nompag = $this->getNompag();
        $result->bindParam(":nompag", $nompag);
        $rutpag = $this->getRutpag();
        $result->bindParam(":rutpag", $rutpag);
        $mospag = $this->getMospag();
        $result->bindParam(":mospag", $mospag);
        $ordpag = $this->getOrdpag();
        $result->bindParam(":ordpag", $ordpag);
        $icopag = $this->getIcopag();
        $result->bindParam(":icopag", $icopag);
        $result->execute();
    }

    public function del(){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM pagina WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $idpag = $this->getIdpag();
        $result->bindParam(":idpag", $idpag);
        $result->execute();
    }
}
?>