<?php
    include("models/mdoc.php");

    $iddoc = isset($_REQUEST['iddoc']) ? $_REQUEST['iddoc']:NULL;
    $nomdoc = isset($_POST['nomdoc']) ? $_POST['nomdoc']:NULL;
    $idpsn = isset($_POST['idpsn']) ? $_POST['idpsn']:NULL;
    $fhdoc = isset($_POST['fhdoc']) ? $_POST['fhdoc']:NULL;
    $rutdoc = isset($_POST['rutdoc']) ? $_POST['rutdoc']:NULL;
    $tpodoc = isset($_POST['tpodoc']) ? $_POST['tpodoc']:NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
   
    $mdoc = new Mdoc();
    $mdoc->setIddoc($iddoc);
    if($ope=="save"){
        $mdoc->setNomdoc($nomdoc);
        $mdoc->setIdpsn($idpsn);
        $mdoc->setFhdoc($fhdoc);
        $mdoc->setRutdoc($rutdoc);
        $mdoc->setTpodoc($tpodoc);
        if($iddoc) $mdoc->edit();
        else $mdoc->save();
    }

    if($ope=="del" && $iddoc) $mdoc->del();

    if($ope=="edit" && $iddoc){
        $dtOne = $mdoc->getOne();
    }else{
        $dtOne = NULL;
    }

    $dat = $mdoc->getAll();

?>