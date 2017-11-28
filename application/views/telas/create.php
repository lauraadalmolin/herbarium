<?php
    if ($this->session->userdata('logado') == true) {
        echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Cadastro de Usuários </h5>";
                            echo "</div>";
                        echo "</div>";
                                
                        echo "<div class='card-body'>";
                            echo form_open('CRUD_Usuario/create');

                                if ($this->session->flashdata('cadastrook')):
                                    echo "<p class='success'>" . $this->session->flashdata('cadastrook') . "</p>";
                                endif;

                                echo "<div class='form-group'>";
                                    echo form_label('Nome completo: ');
                                    echo form_input(array('name'=>'nome'), set_value('nome'), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Login: ');
                                    echo form_input(array('name'=>'login'), set_value('login'), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Senha: ');
                                    echo form_password(array('name'=>'senha'), set_value('senha'), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Repita a senha: ');
                                    echo form_password(array('name'=>'senha2'), set_value('senha2'), array('class' => 'form-control'));
                                echo "</div> <br />";
                                echo "<div class='text-center'>";
                                    echo form_submit(array('name'=>'cadastrar'), 'Cadastrar', array('class' => 'btn btn-secondary btn-block'));
                                echo "</div>";
                            echo form_close();
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    } else {
        include "erro_permissao.php";
    }