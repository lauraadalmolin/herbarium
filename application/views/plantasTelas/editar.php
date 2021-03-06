<?php
    if ($this->session->userdata('logado') == true) {
        echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Edição de Planta</h5>";
                            echo "</div>";
                        echo "</div>";
                                
                        echo "<div class='card-body'>";
                            echo form_open_multipart('/CRUD_Planta/editar');

                                if ($this->session->flashdata('cadastrook')):
                                    echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
                                endif;

                                echo "<div class='form-group'>";
                                    echo form_label('Nome: ');
                                    echo form_input(array('name'=>'nome'), set_value('nome', $planta->nome), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('País: ');
                                    echo form_input(array('name'=>'pais'), set_value('pais', $planta->pais), array('class' => 'form-control'));
                                echo "</div>";
        						echo "<div class='form-row'>";
    	                            echo "<div class='form-group col-md-6'>";
    	                                echo form_label('Estado: ');
    	                                echo form_input(array('name'=>'estado'), set_value('estado', $planta->estado), array('class' => 'form-control'));
    	                            echo "</div>";
    	                            echo "<div class='form-group col-md-6'>";
    	                                echo form_label('Cidade: ');
    	                                echo form_input(array('name'=>'cidade'), set_value('cidade', $planta->cidade), array('class' => 'form-control'));
    	                            echo "</div>";
    	                        echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Descrição: ');
                                    echo form_textarea(array('name'=>'descricao', 'rows'=>'5'), set_value('descricao', $planta->descricao), array('class' => 'form-control'));
                                echo "</div>";
        						echo "<div class='form-row'>";
                                	echo "<div class='form-group col-md-6'>";
    	                                echo form_label('Data: ');
    	                                echo "<input type='date' name='data' id='data' value='$planta->data' class='form-control'>";
    	                            echo "</div>";
    	                            echo "<div class='form-group col-md-6'>";
    	                                echo form_label('Foto: ');
    	                                echo "<input type='file' name='foto' id='foto' accept='image/*' class='form-control'>";
    	                            echo "</div>";
    	                        echo "</div> <br />";
                                echo "<div class='text-center'>";
                                    echo form_submit(array('name'=>'atualizar'), 'Alterar dados', array('class' => 'btn btn-secondary btn-block'));
                                echo "</div>";
                                echo form_hidden('id', $planta->id);
                                echo form_hidden('oldExt', $planta->foto);
                            echo form_close();
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    } else {
        include "erro_permissao.php";
    }