<?php
    include("models/mpsn.php");
    include("models/mval.php");
    $mpsn = new Mval();
    $datTp = $mpsn->getVal(1);
    $datGn = $mpsn->getVal(2);

    $idpsn = isset($_REQUEST['idpsn']) ? $_REQUEST['idpsn']:NULL;
    $nompsn = isset($_POST['nompsn']) ? $_POST['nompsn']:NULL;
    $apepsn = isset($_POST['apepsn']) ? $_POST['apepsn']:NULL;
    $docpsn = isset($_POST['docpsn']) ? $_POST['docpsn']:NULL;
    $tpdcpsn = isset($_POST['tpdcpsn']) ? $_POST['tpdcpsn']:NULL;
    $telpsn = isset($_POST['telpsn']) ? $_POST['telpsn']:NULL;
    $emapsn = isset($_POST['emapsn']) ? $_POST['emapsn']:NULL;
    $passpsn = isset($_POST['passpsn']) ? $_POST['passpsn']:NULL;
    $actpsn = isset($_POST['actpsn']) ? $_POST['actpsn']:NULL;
    $idper = isset($_POST['idper']) ? $_POST['idper']:NULL;
    $genpsn = isset($_POST['genpsn']) ? $_POST['genpsn']:NULL;
    $fhnapsn = isset($_POST['fhnapsn']) ? $_POST['fhnapsn']:NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $mpsn = new Mpsn();
    $mpsn->setIdpsn($idpsn);
    if($ope=="save"){
        $mpsn->setNompsn($nompsn);
        $mpsn->setApepsn($apepsn);
        $mpsn->setDocpsn($docpsn);
        $mpsn->setTpdcpsn($tpdcpsn);
        $mpsn->setTelpsn($telpsn);
        $mpsn->setEmapsn($emapsn);
        $mpsn->setPasspsn($passpsn);
        $mpsn->setActpsn($actpsn);
        $mpsn->setIdper($idper);
        $mpsn->setGenpsn($genpsn);
        $mpsn->setFhnapsn($fhnapsn);
        if($idpsn) $mpsn->edit();
        else $mpsn->save();
    }

    if($ope=="del" && $idpsn) $mpsn->del();

    if($ope=="edit" && $idpsn){
        $dtOne = $mpsn->getOne();
    }else{
        $dtOne = NULL;
    }

    $dat = $mpsn->getAll();
?>