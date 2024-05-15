<?php 
include("models/mvar.php");

$idvar = isset($_REQUEST['idvar']) ? $_REQUEST['idvar']:NULL;
$nomvar = isset($_POST['nomvar']) ? $_POST['nomvar']:NULL;
$tpovar = isset($_POST['tpovar']) ? $_POST['tpovar']:NULL;
$idviv = isset($_POST['idviv']) ? $_POST['idviv']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

$mvar=new Mvar();
$mvar->setIdvar($idvar);
if ($ope=="save") {
	$mvar->setNomvar($nomvar);
	$mvar->setTpovar($tpovar);
	$mvar->setIdviv($idviv);
	if($idvar) $mvar->edit();
	else $mvar->save();
}

//$m=2;
if ($ope=="del" && $idvar) $mvar->del();
if ($ope=="edi" && $idvar){
	$dtOne = $mvar->getOne();
	//$m=1;
}else{ 
	$dtOne=NULL;
}

$dat=$mvar->getAll();
?>