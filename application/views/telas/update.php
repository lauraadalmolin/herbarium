<?php 
if ($this->session->userdata('logado') == true) {

	$iduser = $this->uri->segment(3);
	if ($iduser == NULL) redirect ('CRUD_Usuario/retrieve');

	$query = $this->Usuario_model->get_byid($iduser)->row();
	echo "<br>";
	echo "<br>";
	echo "<div class='center_align micro_div'>";
	echo "<h1 class='center big_title'>Update Usuário</h1>";
	echo form_open("CRUD_Usuario/update/$iduser");
	if ($this->session->flashdata('edicaook')):
		echo "<p class='success'>".$this->session->flashdata('edicaook').'</p>';
	endif;
	echo "<br>";
	echo "<br>";
	echo form_label('Nome Completo: ');
	echo form_input(array('name'=>'nome'),set_value('nome',$query->nome),'autofocus');
	echo "<br>";
	echo "<br>";
	echo form_label('Login: ');
	echo form_input(array('name'=>'login'),set_value('login',$query->login));
	echo "<br>";
	echo "<br>";
	echo form_label('Senha: ');
	echo form_password(array('name'=>'senha'));
	echo "<br>";
	echo "<br>";
	echo form_label('Repita a Senha: ');
	echo form_password(array('name'=>'senha2'));
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br><div class='center'>";	
	echo form_submit(array('name'=>'atualizar'), 'Alterar Dados');
	echo "</div>";
	echo form_hidden('idusuario',$query->id);
	echo form_close();
	echo "</div>";
} else {
	include "erro_permissao.php";
}