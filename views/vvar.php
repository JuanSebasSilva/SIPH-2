<?php include("controllers/cvar.php"); ?>

<div id="ins">
<form name="frm1" action="#" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="form-group col-md-4">
			<label for="nomvar">Nombre:</label>
			<input type="text" class="form-control form-control" name="nomvar" id="nomvar" value="<?php if($dtOne && $dtOne[0]['nomvar']) echo $dtOne[0]['nomvar']; ?>" required>
		</div>
		<div class="form-group col-md-4">
			<label for="tpovar">Tipo de pertenencia:</label>
			<input type="number" class="form-control form-control" name="tpovar" id="tpovar" value="<?php if($dtOne && $dtOne[0]['tpovar']) echo $dtOne[0]['tpovar']; ?>" required>
		</div>
		<div class="form-group col-md-4">
			<label for="nompsn">Nombre de pertenencia:</label>
			<input type="number" class="form-control form-control" name="nompsn" id="nompsn" value="<?php if($dtOne && $dtOne[0]['nompsn']) echo $dtOne[0]['nompsn']; ?>" required>
		</div>
</form>
</div>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
			<th>Nombre</th>
			<th>Tipo</th>
            <th>Nombre de pertenencia:</th>
			<th></th>
		</tr>
    </thead>
	<tbody>
		<?php if($dat){ foreach ($dat as $dt) { ?>
			<tr>
				<td><?=$dt["idvar"];?> <?=$dt["nomvar"];?></td>
				<td>
					<a href="index.php?pg=007&ope=del&id=<?=$dt["idvar"];?>" onclick="return eli();" title="Eliminar"><i class="fa-solid fa-trash"></i></a>
					<a href="index.php?pg=007&ope=edi&id=<?=$dt["idvar"];?>" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
				</td>
				<td>
				<a href="home.php?pg=007&ope=del&idvar=<?=$dt["idvar"];?>///" onclick="return eli();" title="Eliminar"><i class="fa-solid fa-trash"></i></a>
				</td>
			</tr>
		<?php }} ?>
	</tbody>

    <tfoot>
        <tr>
			<th>Id</th>
			<th>Producto</th>
			<th></th>
		</tr>
    </tfoot>
</table>