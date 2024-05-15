<?php 
	include("controllers/cviv.php");	
?>
<div id="ins fondo">
	<form name="frm1" action="#" method="POST">
		<div class="row">
			<h1>VIVIVENDA</h1>
			<div class="form-group col-md-6">
				<label for="nomviv">Nombre de vivienda</label>
				<input type="text" class="form-control form-control" name="nomviv" id="nomviv" value="<?php if($dtOne && $dtOne[0]['nomviv']) echo $dtOne[0]['nomviv']; ?>" required>
			</div>
				<label for="tpoviv">Tipo de vivienda</label>
				<input type="text" class="form-control form-control" name="tpoviv" id="tpoviv" value="<?php if($dtOne && $dtOne[0]['tpoviv']) echo $dtOne[0]['tpoviv']; ?>" required>
			</div>	
			<div class="form-group col-md-4">
				<label for="depviv">Depende2:</label>
				<select class="form-control form-select" id="depviv" name="depviv">
					<option value="0">Seleccione dependencia:</option>
					<?php if($dtViv){ foreach($dtViv as $dtD){ ?>
					<option value="<?=$dtD['idviv'];?>" <?php if($dtOne && $dtOne[0]['depviv']==$dtD['idviv']) echo "selected"; ?><?=$dtD['nomviv']; ?>"</option>
					<?php }} ?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="idpsn">No° Propietario</label>
				<input type="text" class="form-control form-control" name="idpsn" id="idpsn" value="<?php if($dtOne && $dtOne[0]['idpsn']) echo $dtOne[0]['idpsn']; ?>" required>
			</div>
			<div class="form-group col-md-4">
				<br>
				<input type="hidden" name="ope" value="save">
				<input type="hidden" name="idviv" value="<?php if($dtOne && $dtOne[0]['idviv']) echo $dtOne[0]['idviv']; ?>" required>
				<input type="submit" class="btn btn-primary" value="Enviar">
			</div>
		</div>
	</form>
</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
			<th>Id</th>
			<th>Nom.vivienda</th>
            <th>Nom. torre</th>
			<th>tipo de vivienda</th>
            <th>Propietario</th>
		</tr>
    </thead>
	<tbody>
		<?php if($dat){ foreach ($dat as $dt) { ?>
			<tr>
				<td><?=$dt["cm"];?></td>
				<td><?=$dt["nm"];?></td>
				<td><?=$dt["nd"];?></td>
				<td><?=$dt["tpoviv"];?></td>
				<td><?=$dt["idpsn"];?></td>
				<td>
					<a href="home.php?pg=003&ope=del&idviv=<?=$dt["cm"];?>" //onclick="return eli();" title="Eliminar">
						<i class="fa-solid fa-trash"></i>
					</a>
					<a href="home.php?pg=003&ope=edit&idviv=<?=$dt["cm"];?>" title="Editar">
						<i class="fa-solid fa-pen-to-square"></i>
					</a>
				</td>
			</tr>
		<?php }} ?>
	</tbody>
    <tfoot>
        <tr>
		    <th>Id</th>
			<th>Nom.vivienda</th>
            <th>Tip.vivienda</th>
            <th>Propietario</th>
			<th><th>
		</tr>
    </tfoot>
</table>