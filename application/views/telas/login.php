<body id="img_body">
<?php
if ($this->session->userdata('logado') == false) {
        echo "<div id='teste' class='container'>
                        <div class='card card-container'>
                                <div class='center_align'>";
                                        echo form_open('CRUD_Usuario/login');
                                                if ($this->session->flashdata('loginbad')):
                                                        echo "<p class='error'>".$this->session->flashdata('loginbad').'</p>';
                                                endif;

                                                $login = array(
                                                                'name'=>'login',
                                                                'class'=>'form-control',
                                                                'placeholder'=>'Login',
                                                                'required'=>'required');
                                                echo form_input($login);
                                                        
                                                echo "<br />";

                                                $senha = array(
                                                                'type'=>'password',
                                                                'name'=>'senha',
                                                                'class'=>'form-control',
                                                                'placeholder'=>'Senha',
                                                                'required'=>'required');
                                                echo form_input($senha);

                                                echo "<br />";
                                                
                                                echo form_submit(array('name'=>'enviar',
                                                                        'class'=>'btn btn-lg btn-primary btn-block btn-signin'), 'Logar');
                                        echo form_close();
                                echo "</div>";
                        echo "</div>";
                echo "</div>";
        echo "</div>";
} else {
        redirect ('CRUD_Usuario/retrieve');
}