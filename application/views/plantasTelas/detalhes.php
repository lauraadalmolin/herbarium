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
									echo "<p class='card-text text-justify' id='pais'> País: " . $planta->pais . "</p>";
									echo "<p class='card-text text-justify' id='estado'> Estado: " . $planta->estado . "</p>";
									echo "<p class='card-text text-justify' id='cidade'> Cidade: " . $planta->cidade . "</p>";
									echo "<p class='card-text text-justify'> Descrição: " . $planta->descricao . "</p>";
									echo "<p class='card-text text-justify'> Data: " . $planta->data . "</p>";
									echo "<div class='text-right'>";
										echo anchor("/CRUD_Planta/editar/$planta->id", "<img height='25px' width='25px' src='../../../uploads/imagens/lapis.png'>");
									echo "</div>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
						echo "<input type='hidden' id='local' value='$planta->cidade'>";
						echo "<input type='hidden' id='planta' value='$planta->nome'>";
						echo "<div id='mapa' style='height: 500px; width: 670px; border: solid 1px'> </div>
 
				        	<script>
								function myMap() {
									var mapCanvas = document.getElementById('mapa');

									var addressInput = document.getElementById('local').value;
									var geocoder = new google.maps.Geocoder();

									geocoder.geocode({address: addressInput}, function(results, status) {
										if (status == google.maps.GeocoderStatus.OK) {
											var myResult = results[0].geometry.location;

											var mapOptions = {
												zoom: 10,
												center: myResult
											}
											
											var map = new google.maps.Map(mapCanvas, mapOptions);

											var planta = document.getElementById('planta').value;
											var marker = new google.maps.Marker({
											    position: myResult,
											    title:planta
											});

											// To add the marker to the map, call setMap();
											marker.setMap(map);
									 	}
									});								  
								}
							</script>

							<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCe8DR6IeM-sZBFrXS4lth9jAFlDvK_sg4&callback=myMap'></script>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	echo "</div>";