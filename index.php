<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>SIPH</title>
</head>

<body>
    <?php
        include("models/conexion.php");
        $pg = isset($_REQUEST['pg']) ? $_REQUEST['pg']:NULL;
    ?>
    <header class="cabecera">
        <?php include("views/header.php"); ?>
    </header>
    <main>
        <div class="content">
            <form action="models/control.php" method="POST" class="form-ini">
                <h3>Inicio de sesion</h3>
                <label for="emapsn">Correo Electronico</label>
                <input type="email" id="emapsn" name="usu" required>
                <label for="paspsn">Contraseña</label>
                <input type="password" id="paspsn" name="pss" required>
                <?php
                    $err = isset($_GET['error']) ? $_GET['error']:NULL;
                    if($error == 'ok'){
                        echo "<h2>Datos incorrectos</h2>";
                    }
                ?>
                <input type="submit" class="btn">
            </form>
        </div>
        <div>
            <img src="" alt="">
        </div>
    </main>
    <footer class="pie">
        <?php include("views/footer.php"); ?>
    </footer>

    <script src="js/code.js"></script>
</body>

</html>