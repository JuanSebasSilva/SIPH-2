<?php
include("models/mineg.php");
include("models/mpsn.php");
$mpsn = new Mpsn();
$pers = $mpsn->getPers(0);
include("models/mperiodo.php");
$mprd = new Mprd();
$peri = $mprd->getPeri(0);
include("models/mval.php");
$mval = new Mval();
$tip = $mval->getTip(0);

date_default_timezone_set('America/Bogota');

$idineg = isset($_REQUEST['idineg']) ? $_REQUEST['idineg']:NULL;
$tpoineg = isset($_POST['tpoineg']) ? $_POST['tpoineg']:NULL;
$fhineg = date(format: 'Y-m-d H:i:s');
$cctineg = isset($_POST['cctineg']) ? $_POST['cctineg']:NULL;
$desineg = isset($_POST['desineg']) ? $_POST['desineg']:NULL;
$valineg = isset($_POST['valineg']) ? $_POST['valineg']:NULL;
$sopineg = isset($_POST['sopineg']) ? $_POST['sopineg']:NULL;
$soporte = isset($_FILES['soporte']['name']) ? $_FILES['soporte']['name']:NULL;
$idpsn = isset($_POST['idpsn']) ? $_POST['idpsn']:NULL;
$idprd = isset($_POST['idprd']) ? $_POST['idprd']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

// Verificar si $sopineg ya tiene un valor
if (!isset($sopineg)) {
    if(isset($_FILES['soporte']['name'])) {
        // Código para manejar la carga del archivo
        $nombre_archivo = $_FILES['soporte']['name'];
        $nombre_temporal = $_FILES['soporte']['tmp_name'];
        $ruta_destino = "sprts/"; // Ruta donde quieres guardar el archivo

        // Obtener la extensión del archivo original
        $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

        // Nuevo nombre para el archivo con fecha y hora
        $fecha_hora = date('YmdHis'); // Formato: Año-Mes-Día_Hora-Minuto-Segundo
        $nuevo_nombre = "soporte_$fecha_hora.$extension"; // Concatenamos la fecha y hora

        // Mueve el archivo al directorio de destino con el nuevo nombre
        if(move_uploaded_file($nombre_temporal, $ruta_destino . $nuevo_nombre)) {
            echo "Archivo guardado correctamente.";
            $sopineg = $ruta_destino . $nuevo_nombre;
        } else {
            echo "Error al guardar el archivo.";
        }
    }
} else {
    echo "Ya existe un valor para \$sopineg. No se ejecutó la carga del archivo.";
}

$mineg=new Mineg();
$mineg->setIdineg($idineg);
if ($ope=="save") {
    $mineg->setTpoineg($tpoineg);
	$mineg->setFhineg($fhineg);
	$mineg->setCctineg($cctineg);
	$mineg->setDesineg($desineg);
	$mineg->setValineg($valineg);
	$mineg->setSopineg($sopineg);
	$mineg->setIdpsn($idpsn);
    $mineg->setIdprd($idprd);
	if($idineg) $mineg->edit();
	else $mineg->save();
}

if ($ope=="del" && $idineg) $mineg->del();
if ($ope=="edi" && $idineg){
	$dtOne = $mineg->getOne();
}else{ 
	$dtOne=NULL;
}

$dat=$mineg->getAll();

?>