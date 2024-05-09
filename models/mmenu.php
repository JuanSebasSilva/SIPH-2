<?php
class Mmenu{
    private $idpag;
    
    function getIdpag(){
        return $this->idpag;
    }

    function setIdpag($idpag){
        $this->idpag = $idpag;
    }

    public function getMenu(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT pg.idpag, pg.nompag, pg.rutpag, pg.mospag, pg.ordpag, pp.idper, pg.icopag FROM pagina AS pg INNER JOIN pagper AS pp ON pg.idpag=pp.idpag WHERE pp.idper=:idper";
        $result = $conexion->prepare($sql);
        $idper = isset($_SESSION['idper']) ? $SESSION['idper']:0;
        $result->bindParam(':idper', $idper);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getVal(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT pg.idpag, pg.nompag, pg.rutpag, pg.mospag, pg.ordpag, pp.idper, pg.icopag FROM pagina AS pg INNER JOIN pagper AS pp ON pg.idpag=pp.idpag WHERE pp.idper=:idper AND pg.idpag=:idpag";
        $result = $conexion->prepare($sql);
        $idper = isset($_SESSION['idper']) ? $_SESSION['idper'];
        $result->bindParam(":idper", $idper);
        $idpag = $this->getIdpag();
        $result->bindParam(':idpag', $idpag);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getPagIniD(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idper, nomper, pagini FROM perfil WHERE idper=:ipder";
        $result = $conexion->prepare($sql);
        $idper = isset($_SESSION['idper']) ? $_SESSION['idper'];
        $result->bindParam(':idper', $idper);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
}
?>