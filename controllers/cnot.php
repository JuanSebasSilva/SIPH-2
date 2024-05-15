
<?php 
include("models/mnot.php");

$idnot = isset($_REQUEST['idnot']) ? $_REQUEST['idnot']:NULL;
$titnot = isset($_POST['titnot']) ? $_POST['titnot']:NULL;
$fhnot = isset($_POST['fhnot']) ? $_POST['fhnot']:NULL;
$ffinnot = isset($_POST['ffinnot']) ? $_POST['ffinnot']:NULL;
$desnot = isset($_POST['desnot']) ? $_POST['desnot']:NULL;
$idpsn = isset($_POST['idpsn']) ? $_POST['idpsn']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

$mnot=new Mnot();
$mnot->setIdnot($idnot);
if ($ope=="save") {
	$mnot->setIdpsn($idpsn);
	$mnot->setFhnot($titnot);
	$mnot->setFhnot($fhnot);
	$mnot->setFfinnot($ffinnot);
    $desnot->setDesnot($desnot);
	if($idnot) $mnot->edit();
	else $mnot->save();
}

//$m=2;
if ($ope=="del" && $idnot) $mnot->del();
if ($ope=="edit" && $idnot){
	$dtOne = $mnot->getOne();
	//$m=1;
}else{ 
	$dtOne=NULL;
}

$dat=$mnot->getAll();
?>
