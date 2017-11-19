<?php 
if ($this->session->userdata('logado') == false) {
        echo "<br>";
        echo "<br>";
        echo "<div class='center center_align micro_div'>";
        echo "<h1 class='center big_title'>Login</h1>";
        echo form_open('CRUD_Usuario/login');
        if ($this->session->flashdata('loginbad')):
                echo "<p class='error'>".$this->session->flashdata('loginbad').'</p>';
        endif;
        echo form_label('Login: ');
        echo form_input(array('name'=>'login'),set_value('login'));
        echo "<br>";
        echo "<br>";
        echo form_label('Senha: ');
        echo form_password(array('name'=>'senha'),set_value('senha'));
        echo "<br>";
        echo "<br>";
        echo form_submit(array('name'=>'enviar'), 'Logar');
        echo form_close();
} else {
        redirect ('CRUD_Usuario/retrieve');
}

