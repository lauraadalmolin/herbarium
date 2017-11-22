<?php
	echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-10'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
	                        echo "<div class='text-center'>";
                                echo "<h5>Planta</h5>";
	                        echo "</div>";
	                    echo "</div>";
							
						echo "<div class='card-body'>";
	                   		echo "<div class='row'>";
		
						if ($this->session->flashdata('exclusaook')):
							echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
						endif;

						echo "<div class='col-md-4'>";
							echo "<div class='card'>";
								echo "<img height='200px' width='100px' class='card-img-top' src='/uploads/" . $planta->id . $planta->foto . "'/>";
								echo "<h5 class='card-title text-center'>" . $planta->nome . "</h5>";
								echo "<div class='card-body'>";
									echo "<p class='card-text text-justify'> País: " . $planta->pais . "</p>";
									echo "<p class='card-text text-justify'> Estado: " . $planta->estado . "</p>";
									echo "<p class='card-text text-justify'> Cidade: " . $planta->cidade . "</p>";
									echo "<p class='card-text text-justify'> Descrição: " . $planta->descricao . "</p>";
									echo "<p class='card-text text-justify'> Data: " . $planta->data . "</p>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
						echo "Colocar aqui o mapa?";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";