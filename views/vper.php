<?php include("controllers/cper.php"); ?>

<div id="ins person">
    <form name="form1" action="#" method="POST">
        <div class="form-group">
            <label for="nomper">Perfil</label>
            <input type="text" name="nomper" id="nomper" value="<?php if($dtOne && $dtOne[0]['nomper']) echo $dtOne[0]['nomper'];?>" required>
        </div>
        <div class="form-group">
            <label for="pagini">Pagina Inicial</label>
            <select name="pagini" id="pagini">
                <option value="0">Seleccione pagina inicial</option>
                <?php if($datPg){ foreach($datPg as $dtpg) { ?>
                <option value="<?=$dtpg['idpag'];?>" <?php if($dtOne && $dtOne[0]['pagini']==$dtpg['idpag']) echo "selected";?>>
                    <?=$dtpg['idpag']."-".$dtpg['nompag'];?>
                </option>
                <?php }} ?>
            </select>
            <input type="number" name="pagini" id="pagini" value="<?php if($dtOne && $dtOne[0]['pagini']) echo $dtOne[0]['pagini']; ?>" required>
        </div>
        <div class="form-group">
            <br>
            <input type="hidden" name="ope" value="save">
            <input type="hidden" name="idper" value="<?php if($dtOne && $dtOne[0]['idper']) echo $dtOne[0]['idper']; ?>">
            <input type="submit" class="btn" value="Enviar">
        </div>
    </form>
</div>
<table id="example" class="table" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Perfil</th>
            <th>Pag Inicial</th>
            <th>Cant</th>
        </tr>
    </thead>
    <tbody>
        <?php if($dat){ foreach($dat as $dt){ ?>
        <tr>
            <td><?=$dt['idper']; ?></td>
            <?php
                $mper->setIdper($dt['idper']);
                $cant = $mper->getCantpg();
            ?>
            <td><?=$dt['nomper']; ?></td>
            <td><?=$dt['pagini'];."-".$dt['nompag']; ?></td>
            <td><?=$cant[0]['cant']; ?></td>
            <td>
                <?php
                    if($cant && $cant[0]['cant']==0){
                ?>
                <a href="home.php?pg=110&ope=del&idper=<?=$dt['idper']?>" onclick="return del();" title="Eliminar">Eliminar</a>
                <?php } ?>
                <a href="home.php?pg=110&ope=edit&idper=<?=$dt['idper']?>" title="Editar">Editar</a>
                <i class="fa-solid fa-list-check" data-bs-toggle="modal" data-bs-target="#MdPg<?=$dt['idper'];?>"></i>
            </td>
        </tr>
        <?php }} ?>
    </tbody>
</table>
<div class="modal fade" id="MdPg<?=$dt['idper'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h5 class="modal-title" id="exampleModalLabel">
                
            </h5>
        </div>
    </div>
</div>