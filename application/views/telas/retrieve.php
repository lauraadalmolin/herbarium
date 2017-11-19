<?php
if ($this->session->userdata('logado') == true) {
	echo "<br>";
	echo "<br>";
	echo "<div class='center center_align table_div'>";

	echo "<h1 class='big_title'>Lista de Usuários</h1>";
	echo '<br>';
	if ($this->session->flashdata('exclusaook')):
		echo "<p class='success'>".$this->session->flashdata('exclusaook').'</p>';
	endif;
	$this->table->set_heading('ID', 'Nome', 'Login','Operações');
	foreach ($usuarios as $linha):
		$this->table->add_row($linha->id,$linha->nome,$linha->login,
			anchor("CRUD_Usuario/update/$linha->id",'Editar').' '. 
			anchor("CRUD_Usuario/delete/?id=$linha->id",'Excluir'));
	endforeach;
	echo $this->table->generate();
	echo "</div>";
} else {
	include "erro_permissao.php";
}