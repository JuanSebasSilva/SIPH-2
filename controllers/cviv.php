<?php 
include("models/mviv.php");

$idviv = isset($_REQUEST['idviv']) ? $_REQUEST['idviv']:NULL;
$nomviv = isset($_POST['nomviv']) ? $_POST['nomviv']:NULL;
$tpoviv = isset($_POST['tpoviv']) ? $_POST['tpoviv']:NULL;
$depviv = isset($_POST['depviv']) ? $_POST['depviv']:NULL;
$idpsn = isset($_POST['idpsn']) ? $_POST['idpsn']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;


$mviv=new Mviv();
$mviv->setIdviv($idviv);
if ($ope=="save") {
	$mviv->setNomviv($nomviv);
	$mviv->setTpoviv($tpoviv);
	$mviv->setDepviv($depviv);
	$mviv->setIdpsn($idpsn);
	if($idviv) $mviv->edit();
	else $mviv->save();
}
//$m=2;
if ($ope=="del" && $idviv) $mviv->del();
if ($ope=="edit" && $idviv){
	$dtOne = $mviv->getOne();
	//$m=1;
}else{ 
	$dtOne=NULL;
}

$dat=$mviv->getAll();
$dtViv =$mviv->getDepviv(0);

?>