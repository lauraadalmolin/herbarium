<?php
	if ($this->session->userdata('logado') == true) {
		echo "<br />";
	        echo "<div class='container-fluid'>";
	            echo "<div class='row align-items-center justify-content-center'>";
	                echo "<div class='col-lg-10'>";
	                    echo "<div class='card'>";
	                        echo "<div class='card-header card-title'>";
	                            echo "<div class='text-center'>";
	                                echo "<h5>Plantas</h5>";
	                            echo "</div>";
	                        echo "</div>";
								
							echo "<div class='card-body'>";
	                    		echo "<div class='row'>";
			
							if ($this->session->flashdata('exclusaook')):
								echo "<p class='success'>" . $this->session->flashdata('exclusaook') . "</p>";
							endif;

							foreach ($plantas as $linha):
								echo "<div class='col-md-4'>";
									echo "<div class='card'>";
										echo "<img height='200px' width='100px' class='card-img-top' src='../uploads/" . $linha->id . $linha->foto . "/>";
										echo "<h5 class='card-title text-center'> <a class='card-title text-center' href='/CRUD_Planta/Detalhes/$linha->id'> $linha->nome </a> </h5>";
										echo "<div class='card-body'>";
											echo "<div class='text-right'>";
												echo anchor("/CRUD_Planta/editar/$linha->id", "<img height='25px' width='25px' src='../uploads/imagens/lapis.png'>");
												echo anchor("/CRUD_Planta/excluir/$linha->id", "<img height='25px' width='25px' src='../uploads/imagens/lixeira.png'>");
											echo "</div>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							endforeach;
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro_permissao.php";
	}