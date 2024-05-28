<?php
require_once("conexion.php");

$uss = isset($_POST['usu']) ? $_POST['usu']:NULL;
$pas = isset($_POST['pss']) ? $_POST['pss']:NULL;

if($uss AND $pas){
    valida($uss, $pas);
}else{
    reg();
}

function valida($usu, $pas){
    $res = ingr($usu, $pas);
    $res = isset($res) ? $res:NULL;
    if($res){
        session_start();
        $_SESSION['idpsn'] = $res[0]['idpsn'];
        $_SESSION['nompsn'] = $res[0]['nompsn'];
        $_SESSION['apepsn'] = $res[0]['apepsn'];
        $_SESSION['idper'] = $res[0]['idper'];
        $_SESSION['nomper'] = $res[0]['nomper'];
        $_SESSION['pagini'] = $res[0]['pagini'];
        $_SESSION['aut'] = 'ñasedj12j23jnkj14nñ+;:';
        echo "<script>window.location = '../home.php';</<script>";
    }else{
        reg();
    }
}

function reg(){
    echo "<script>window.location = '../index.php?error=oK';</script>";
}

function ingr($usu, $pas){
    $res = NULL;
    $pas = sha1(md5('pE*r'.$pas));
    echo $pas;
    die();
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $sql = "SELECT p.idpsn, p.nompsn, p.apepsn, p.docpsn, pf.nomper, pf.pagini FROM persona AS p INNER JOIN perfil AS pf ON p.idper=pf.idper WHERE p.actpsn=1 AND p.emapsn=:emapsn AND p.passpsn=:passpsn";
    $result = $conexion->prepare($sql);
    $result->bindParam(':emapsn', $usu);
    $result->bindParam(':passpsn', $pas);
    $result->execute();
    $res = $result->fetchall(PDO::FETCH_ASSOC);
    return $res;
}
?>