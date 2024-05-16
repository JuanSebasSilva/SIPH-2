<?php
    include("models/mper.php");

    $idper = isset($_REQUEST['idper']) ? $_REQUEST['idper']:NULL;
    $nomper = isset($_POST['nomper']) ? $_POST['nomper']:NULL;
    $pagini = isset($_POST['pagini']) ? $_POST['pagini']:NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

    $mper = new Mper();
    $mper->setIdper($idper);
    if($ope=="save"){
        $mper->setNomper($nomper);
        $mper->setpPagini($pagini);
        if($idper) $mper->edit();
        else $mper->save();
    }

    //$m = 2;
    if($ope=="del" && $idper) $mper->del();
    if($ope=="edit" && $idper){
        $dtOne = $mper->getOne();
        //$m = 1;
    }else{
        $dtOne = NULL;
    }

    $dat = $mper->getAll();
    $datPg = $mper->getPag();
?>