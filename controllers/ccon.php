<?php 
include("models/mcon.php");

$idcon = isset($_REQUEST['idcon']) ? $_REQUEST['idcon']:NULL;
$nitcon = isset($_POST['nitcon']) ? $_POST['nitcon']:NULL;
$titcon = isset($_POST['titcon']) ? $_POST['titcon']:NULL;
$imgcon = isset($_POST['imgcon']) ? $_POST['imgcon']:NULL;
$descon = isset($_POST['descon']) ? $_POST['descon']:NULL;
$piecon = isset($_POST['piecon']) ? $_POST['piecon']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

$mcon = new Mcon();
$mcon ->setIdcon($idcon);
if ($ope=="save"){
    $mcon ->setNitcon($nitcon);
    $mcon ->setTitcon($titcon);
    $mcon ->setImgcon($imgcon);
    $mcon ->setDescon($descon);
    $mcon ->setPiecon($piecon);
    if($idcon) $mcon->edit();
    else $mcon->save();
}
 
if($ope=="del" && $idcon) $mcon->del();
if($ope=="edit" && $idcon){
    $dtOne = $mcon->getOne();
    //$m=1;
}else{
    $dtOne=NULL;
}

$dat=$mcon->getAll();

?>