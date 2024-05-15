<?php
include("controllers/ccjj.php");
?>

<div class="container">
<h2>Integrantes del Concejo de Administración</h2>

<!-- Mostrar mensajes de éxito o error -->
<?php if(isset($msg)): ?>
<div class="alert <?php echo $msg_class; ?>">
    <?php echo $msg; ?>
</div>
<?php endif; ?>

<!-- Formulario para agregar/editar integrantes -->
<form action="controller.php" method="post">
    <input type="hidden" name="ope" value="<?php echo isset($dtOne) ? 'edit' : 'save'; ?>">
    <input type="hidden" name="idccj" value="<?php echo isset($dtOne['idccj']) ? $dtOne['idccj'] : ''; ?>">
    <div class="form-group">
        <label for="nombre">Nombre del Integrante:</label>
        <input type="text" class="form-control" id="nombre" name="idpsn"
            value="<?php echo isset($dtOne['idpsn']) ? $dtOne['idpsn'] : ''; ?>" placeholder="Nombre">
    </div>
    <div class="form-group">
        <label for="cargo">Cargo del Integrante:</label>
        <input type="text" class="form-control" id="cargo" name="tpoccj"
            value="<?php echo isset($dtOne['tpoccj']) ? $dtOne['tpoccj'] : ''; ?>" placeholder="Cargo">
    </div>
    <button type="submit" class="btn btn-primary">
        <?php echo isset($dtOne) ? 'Actualizar' : 'Agregar'; ?>
    </button>
</form>

<hr>

<!-- Mostrar la lista de integrantes -->
<h3>Lista de Integrantes</h3>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dat as $integrante): ?>
        <tr>
            <td>
                <?php echo $integrante['nombre']; ?>
            </td>
            <td>
                <?php echo $integrante['cargo']; ?>
            </td>
            <td>
                <a href="controller.php?ope=edit&idccj=<?php echo $integrante['idccj']; ?>"
                    class="btn btn-sm btn-info">Editar</a>
                <a href="controller.php?ope=del&idccj=<?php echo $integrante['idccj']; ?>"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar este integrante?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>