<?php include ("controllers/cdoc.php"); ?>
<div class="cont-doc">
    <h1>Listado de Documentación</h1>
    <table id="example" class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>ID Persona</th>
            <th>Fecha Documento</th>
            <th>Ruta Documento</th>
            <th>Tipo Documento</th>
            <th>Acciones</th>
        </tr>
        <?php if($dat){foreach ($dat as $dt) { ?>
            <tr>
                <td><?=$dt['iddoc']; ?></td>
                <td><?=$dt['nomdoc']; ?></td>
                <td><?=$dt['idpsn']; ?></td>
                <td><?=$dt['fhdoc']; ?></td>
                <td><?=$dt['rutdoc']; ?></td>
                <td><?=$dt['tpodoc']; ?></td>
                <td>
                    <a href="home.php?pg=007&ope=edit&iddoc=<?=$dt["iddoc"];?>" title="Editar">
                        <i class="fa-solid fa-file-pen"></i>
                    </a>
                    <a href="home.php?pg=007&ope=del&iddoc=<?=$dt["iddoc"];?>" title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php }} ?>
    </table>
    <h2>Editar/Agregar Documento</h2>
    <form action="#" method="post"  enclype="multipart/">        
        <div>
            <label for="nomdoc">Nombre Documento:</label>
            <input type="text" name="nomdoc" value="<?php if($dtOne && $dtOne[0]['nomdoc']) echo $dtOne[0]['nomdoc']; ?>" required><br>
        </div>
        <div>
            <label for="nompsn">ID Persona:</label>
            <input type="text" name="nompsn" value="<?php if($dtOne && $dtOne[0]['nompsn']) echo $dtOne[0]['nompsn']; ?>" required><br>
        </div>
        <!-- <div>
            <label for="fhdoc">Fecha Documento:</label>
            <input type="datetime-local" name="fhdoc" value="<?php if($dtOne && $dtOne[0]['fhdoc']) echo $dtOne[0]['fhdoc']; ?>" required><br>
        </div> -->
        <div>
            <label for="rutdoc">Documento</label>
            <input id="rutdoc" name="doc">
            <input type="hidden" name="rutdoc" value="<?php if($dtOne && $dtOne[0]['rutdoc']) echo $dtOne[0]['rutdoc']; ?>" required><br>
        </div>
        <!-- <div>
            <label for="tpodoc">Tipo Documento:</label>
            <input type="number" name="tpodoc" value="<?php if($dtOne && $dtOne[0]['tpodoc']) echo $dtOne[0]['tpodoc']; ?>" required><br>
        </div> -->
        <div>
            <input type="hidden" name="ope" value="save">
            <input type="hidden" name="iddoc" value="<?php if($dtOne && $dtOne[0]['iddoc']) echo $dtOne[0]['iddoc']; ?>" required>
            <input type="submit" value="Enviar">
        </div>
    </form>
</div>