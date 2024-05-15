<?php
    include("models/mccj.php");

    $idccj = isset($_REQUEST['idccj']) ? $_REQUEST['idccj'] : NULL;
    $idprd = isset($_POST['idprd']) ? $_POST['idprd'] : NULL;
    $idpsn = isset($_POST['idpsn']) ? $_POST['idpsn'] : NULL;
    $tpoccj = isset($_POST['tpoccj']) ? $_POST['tpoccj'] : NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;


    $mccj = new Mccj();
    $mccj->setIdccj($idccj);
    if($ope == "save"){
        $mccj->setIdpsn($idpsn);
        $mccj->setTpoccj($tpoccj);
        $mccj->setIdprd($idprd);
        if($idccj) $mccj->edit(); 
        else $mccj->save(); 
    }

    if($ope == "del" && $idccj) $mccj->del(); 

    if($ope == "edit" && $idccj){
        $dtOne = $mccj->getOne(); 
    }else{
        $dtOne = NULL;
    }

    $dat = $mccj->getAll(); 
?>
