<label>Nome: </label>
<span><?php echo $planta->nome;?></span>

<br>

<label>País: </label>
<span><?php echo $planta->pais;?></span>

<br>

<label>Estado: </label>
<span><?php echo $planta->estado;?></span>

<br>

<label>Cidade: </label>
<span><?php echo $planta->cidade;?></span>

<br>

<label>Descrição: </label>
<span><?php echo $planta->descricao;?></span>

<br>

<label>Data: </label>
<span><?php echo $planta->data;?></span>

<br>

<label>Foto: </label>
<img src="/uploads/<?php echo ($planta->id . $planta->foto);?>">