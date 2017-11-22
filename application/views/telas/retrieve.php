<?php
	if ($this->session->userdata('logado') == true) {
		echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-10'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Usuários</h5>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='card-body'>";

							if ($this->session->flashdata('exclusaook')):
								echo "<p class='success'>" . $this->session->flashdata('exclusaook') . "</p>";
							endif;

							$template = array('table_open' => '<table class="table table-striped text-center">');
							$this->table->set_template($template);

							$this->table->set_heading('ID', 'Nome', 'Login', '', '');
							foreach ($usuarios as $linha):
								$this->table->add_row($linha->id, $linha->nome, $linha->login, 
								anchor("CRUD_Usuario/update/$linha->id", "<img height='25px' width='25px' src='../../uploads/imagens/lapis.png'>"),  
								anchor("CRUD_Usuario/delete/?id=$linha->id", "<img height='25px' width='25px' src='../../uploads/imagens/lixeira.png'>"));
							endforeach;
							
							echo $this->table->generate();
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro_permissao.php";
	}