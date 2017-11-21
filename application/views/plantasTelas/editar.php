<form method="post" action="/CRUD_Planta/editar" enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?php echo $planta->id; ?>">

	<label for='nome'>Nome: </label>
	<input type="text" name="nome" id="nome" value="<?php echo $planta->nome; ?>">

	<br>

	<label for="pais">País:</label>
	<input type="text" name="pais" id="pais" value="<?php echo $planta->pais; ?>">

	<br>

	<label for="estado">Estado: </label>
	<input type="text" name="estado" id="estado" value="<?php echo $planta->estado; ?>">

	<br>

	<label for="cidade">Cidade:</label>
	<input type="text" name="cidade" id="cidade" value="<?php echo $planta->cidade; ?>">

	<br>

	<label for="descricao">Descrição:</label>
	<textarea name="descricao" id="descricao"><?php echo $planta->descricao; ?></textarea>

	<br>

	<label for="data">Data: </label>
	<input type="date" name="data" id="data" value="<?php echo $planta->data; ?>">

	<br>

	<input type="hidden" name="oldExt" value="<?php echo $planta->foto; ?>">

	<img width="200" height="200" src='/uploads/<?php echo "$planta->id" . "$planta->foto"; ?>'>

	<br>

	<label for="foto">Foto: </label>
	<input type="file" name="foto" id="foto" accept="image/*">

	<br>

	<input type="submit" value="Editar">
</form>