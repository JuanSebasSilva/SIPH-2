<div class="ingregre">
    <?php
    include("controllers/cineg.php")
    ?>
    <h1>Ingresos / Egresos</h1>

    <h2>Administrador</h2>
    <div id="ins">
        <form name="frm1" action="#" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="form-group col-md-2">
                    <label for="idval">Tipo</label>
                    <select class="form-control form-control"  name="idval" id="idval" required>
                        <option value="">Seleccione Tipo</option>
                        <?php if($tip){ foreach ($tip as $dp){ ?>
                        <?php if($dp['iddom']==1){ ?>
                        <option value="<?=$dp['idval'];?>" <?php if($dtOne && $dtOne[0]['iv']==$dp['idval']) echo 'selected'; ?> > <?=$dp['nomval'];?> </option>
                        <?php } ?>
                        <?php }} ?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="cctineg">Concepto</label>
                    <input class="form-control form-control"  type="text" id="cctineg" name="cctineg" value="<?php if($dtOne && $dtOne[0]['cctineg']) echo $dtOne[0]['cctineg']; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="desineg">Descripción</label>
                    <input class="form-control form-control"  type="text" id="desineg" name="desineg" value="<?php if($dtOne && $dtOne[0]['desineg']) echo $dtOne[0]['desineg']; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="valineg">Valor</label>
                    <input class="form-control form-control"  type="number" id="valineg" name="valineg" value="<?php if($dtOne && $dtOne[0]['valineg']) echo $dtOne[0]['valineg']; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="sopineg">Soporte</label>
                    <input class="form-control form-control"  type="file" id="sopineg" name="soporte" accept=".pdf">
                    <br>
                    <input class="form-control form-control"  type="text" name="sopineg" value="<?php if($dtOne && $dtOne[0]['sopineg']) echo $dtOne[0]['sopineg']; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="idpsn">Persona</label>
                    <select class="form-control form-control"  name="idpsn" id="idpsn" required>
                        <option value="">Seleccione Persona</option>
                        <?php if($pers){ foreach ($pers as $dp){ ?>
                        <option value="<?=$dp['idpsn'];?>" <?php if($dtOne && $dtOne[0]['ip']==$dp['idpsn']) echo 'selected'; ?> > <?=$dp['nompsn'];?></option>
                        <?php }} ?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <label for="idprd">Periodo</label>
                    <select class="form-control form-control"  name="idprd" id="idprd" required>
                        <option value="">Seleccione Periodo</option>
                        <?php if($peri){ foreach ($peri as $dp){ ?>
                        <option value="<?=$dp['idprd'];?>" <?php if($dtOne && $dtOne[0]['ir']==$dp['idprd']) echo 'selected'; ?> > <?=$dp['finiprd'];?> - <?=$dp['ffinprd'];?></option>
                        <?php }} ?>
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <input type="hidden" name="ope" value="save">
                    <input type="hidden" name="idineg" value="<?php if($dtOne && $dtOne[0]['idineg']) echo $dtOne[0]['idineg']; ?>" required>
                    <br>
                    <input class="btn btn-primary"  type="submit" value="Enviar">
                </div>
            </div>
        </form>
    </div>

    <h2>Usuario</h2>
    <div>
        <table>
            <thead>
                <tr>
                    <th>|ID|</th>
                    <th>|Tipo|</th>
                    <th>|Fecha/Hora|</th>
                    <th>|Concepto|</th>
                    <th>|Descripción|</th>
                    <th>|Valor|</th>
                    <th>|Soporte|</th>
                    <th>|ID Persona|</th>
                    <th>|ID Periodo|</th>
                    <th>|botones|</th>
                </tr>
            </thead>
            <tbody>
                <?php if($dat){ foreach ($dat as $dt) { ?>
                <tr>
                    <td><?=$dt["idineg"];?></td>
                    <td><?=$dt["nv"];?></td>
                    <td><?=$dt["fhineg"];?></td>
                    <td><?=$dt["cctineg"];?></td>
                    <td><?=$dt["desineg"];?></td>
                    <td><?=$dt["valineg"];?></td>
                    <td><?=$dt["sopineg"];?></td>
                    <td><?=$dt["ip"];?> <?=$dt["np"];?></td>
                    <td><?=$dt["ir"];?></td>
                    <td>
                        <a href="home.php?pg=002&ope=edi&idineg=<?=$dt["idineg"];?>" title="Editar"><i class="fa-solid fa-file-pen"></i></a>
                        <a href="home.php?pg=002&ope=del&idineg=<?=$dt["idineg"];?>" title="Eliminar"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>|ID|</th>                
                    <th>|Tipo|</th>
                    <th>|Fecha/Hora|</th>
                    <th>|Concepto|</th>
                    <th>|Descripción|</th>
                    <th>|Valor|</th>
                    <th>|Soporte|</th>
                    <th>|ID Persona|</th>
                    <th>|ID Periodo|</th>
                    <th>|botones|</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>