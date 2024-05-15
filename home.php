<?php require_once("models/seg.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            $rut = validar($pg);
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