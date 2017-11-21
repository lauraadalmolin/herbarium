<form method="post" action="/CRUD_Planta/cadastrar" enctype="multipart/form-data">
	<label for='nome'>Nome: </label>
	<input type="text" name="nome" id="nome">

	<br>

	<label for="pais">País:</label>
	<input type="text" name="pais" id="pais">

	<br>

	<label for="estado">Estado: </label>
	<input type="text" name="estado" id="estado">

	<br>

	<label for="cidade">Cidade:</label>
	<input type="text" name="cidade" id="cidade">

	<br>

	<label for="descricao">Descrição:</label>
	<textarea name="descricao" id="descricao"></textarea>

	<br>

	<label for="data">Data: </label>
	<input type="date" name="data" id="data">

	<br>

	<label for="foto">Foto: </label>
	<input type="file" name="foto" id="foto" accept="image/*">

	<br>

	<input type="submit" value="Cadastrar">
</form>