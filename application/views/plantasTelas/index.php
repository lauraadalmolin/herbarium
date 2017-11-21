<table>
	<tr>
		<th>Foto</th>
		<th>Nome</th>
		<th>Ações</th>
	</tr>
	<?php
		foreach ($plantas as $planta) {
	?>
		<tr>
			<td>
				<img width="100" height="100" src="/uploads/<?php echo $planta->id.$planta->foto; ?>">
			</td>
			<td>
				<a href="/CRUD_Planta/Detalhes/<?php echo $planta->id;?>"><?php echo $planta->nome; ?></a>
			</td>

			<td>
				<a href="/CRUD_Planta/editar/<?php echo $planta->id;?>">Editar</a>
				<a href="/CRUD_Planta/excluir/<?php echo $planta->id;?>">Excluir</a>
			</td>
		</tr>

	<?php
		}
	?>
</table>