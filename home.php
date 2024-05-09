<?php require_once("models/seg.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="css/style.css">

    <title>SIPH</title>
</head>
<body>
    <?php
        include("models/conexion.php");
        $pg = isset($_REQUEST["pg"]) ? $_REQUEST["pg"]:NULL;
    ?>
    <header class="cabecera">
        <?php include("views/header.php"); ?>
    </header>

    <div class="menu">
        <?php 
            include("views/menu.php"); 
            if(!$pg){
                $ddf = $mmmenu->getPagIniD();
                if($ddf) $pg = $ddf[0]['pagini'];
            }
        ?>
    </div>
    <main class="content">
        <?php
            $rut = vlaidar($pg);
            if($rut){
                include($rut[0]['rutpag']);
            }else{
                echo "<h3>Sin acceso</h3>";
            }
        ?>
    </main>

    <footer class="pie">
        <?php include("views/footer.php"); ?>
    </footer>

    <script src="js/code.js"></script>
</body>
</html>