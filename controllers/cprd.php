<?php 
include("models/mprd.php");

$idprd = isset($_REQUEST['idprd']) ? $_REQUEST['idprd']:NULL;
$finiprd = isset($_POST['finiprd']) ? $_POST['finiprd']:NULL;
$ffinprd = isset($_POST['ffinprd']) ? $_POST['ffinprd']:NULL;
$actprd = isset($_POST['actprd']) ? $_POST['actprd']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

$mprd=new Mprd();
$mprd->setIdprd($idprd);
if ($ope=="save") {
	$mprd->setFiniprd($finiprd);
	$mprd->setFfinprd($ffinprd);
	$mprd->setActprd($actprd);
	if($idprd) $mprd->edit();
	else $mprd->save();
}

// $m=2;
if ($ope=="del" && $idprd) $mprd->del();
if ($ope=="edit" && $idprd){
	$dtOne = $mprd->getOne();
	// $m=1;
}else{ 
	$dtOne=NULL;
}

$dat=$mprd->getAll();

?>