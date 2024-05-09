<?php 
    include("controller/cpsn.php");
?>

<!-- <div id="ins person">
    <form name="form1" action="#" method="POST">
        <div class="form-group">
            <label for="nompsn">Nombre</label>
            <input type="text" name="nompsn" id="nompsn" value="">
        </div>
        <div class="form-group">
            <label for="apepsn">Apellidos</label>
            <input type="text" name="apepsn" id="apepsn" value="">
        </div>
        <div class="form-group">
            <label for="tpdcpsn">Tipo de documento</label>
            <input type="text" name="tpdcpsn" id="tpdcpsn" value="">
        </div>
        <div class="form-group">
            <label for="docpsn">Numero de documento</label>
            <input type="text" name="docpsn" id="docpsn" value="">
        </div>
        <div class="form-group">
            <label for="telpsn">Celular</label>
            <input type="text" name="telpsn" id="telpsn" value="">
        </div>
        <div class="form-group">
            <label for="emapsn">Correo</label>
            <input type="text" name="emapsn" id="emapsn" value="">
        </div>
        <div class="form-group">
            <br>
            <input type="hidden" name="ope" value="save">
            <input type="hidden" name="idpsn" value="<?php if($dtOne && $dtOne[0]['idpsn']) echo $dtOne[0]['idpsn']; ?>">
            <input type="submit" class="btn" value="Enviar">
        </div>
    </form>
</div> -->

<table id="example" class="table" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Documento</th>
            <th>Celular</th>
            <th>Correo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if($dat){ foreach($dat as $dt){ ?>
        <tr>
            <td><?=$dt['idpsn']; ?></td>
            <td><?=$dt['nompsn']; ?></td>
            <td><?=$dt['apepsn']; ?></td>
            <td><?=$dt['tpdcpsn']; ?><?=$dt['docpsn']; ?></td>
            <td><?=$dt['telpsn']; ?></td>
            <td><?=$dt['emapsn']; ?></td>
            <td>
                <a href="home.php?pg= &ope=del&id=<?=$dt['idpsn']?>" onclick="return del();" title="Eliminar">Eliminar</a>
                <a href="home.php?pg= &ope=edit&id=<?=$dt['idpsn']?>" title="Editar">Editar</a>
            </td>
        </tr>
        <?php }}?>
    </tbody>
</table>