<?php
class Mper{
    private $idper;
    private $nomper;
    private $pagini;

    function getIdper(){
        return $this->idper;
    }
    function getNomper(){
        return $this->nomper;
    }
    function getPagini(){
        return $this->pagini;
    }

    function setIdper($idper){
        $this->idper = $idper;
    }
    function setNomper($nomper){
        $this->nomper = $nomper;
    }
    function setPagini($pagini){
        $this->pagini = $pagini;
    }

    public function getAll(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT pf.idper, pf.nomper, pf.pagini, pg.nompag, pg.icopag FROM perfil AS pf LEFT JOIN pagina AS pg ON pf.pagini=pg.idpag";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT pf.idper, pf.nomper, pf.pagini, pg.nompag, pg.icopag FROM perfil AS pf LEFT JOIN pagina AS pg ON pf.pagini=pg.idpag WHERE pf.idper=:idper";
        $result->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getPag(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idpag, nompag, icopag FROM pagina";
        $result->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function getCantpg(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT COUNT(idpag) AS cant FROM pagper WHERE idper=:idper";
        $result->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save(){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO perfil(nomper, pagini) VALUES(:nomper, :pagini)";
        $result->prepare($sql);
        $nomper = $this->getNomper();
        $result->bindParam(":nomper", $nomper);
        $pagini = $this->getPagini();
        $result->bindParam(":pagini", $pagini);
        $result->execute();
    }

    public function edit(){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE perfil SET nomper=:nomper, pagini=:pagini WHERE idper=:idper";
        $result->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $nomper = $this->getNomper();
        $result->bindParam(":nomper", $nomper);
        $pagini = $this->getPagini();
        $result->bindParam(":pagini", $pagini);
        $result->execute();
    }

    public function del(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM perfil WHERE idper=:idper";
        $result->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $result->execute();
    }

    public function getCheckpg(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT COUNT(idpag) AS cant FROM pagper WHERE idper=:idper AND idpag=:idpag";
        $result->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $idpag = $this->getIdpag();
        $result->bindParam(":idpag", $idpag);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
}
?>