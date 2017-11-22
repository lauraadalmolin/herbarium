<ul>
	<?php 
		if ($this->session->userdata('logado') == true) {
			echo "<li>" . anchor('CRUD_Usuario/create','Create Usuário') . "</li>"; 
			echo "<li>" . anchor('CRUD_Usuario/retrieve','Retrieve Usuário') . "</li>"; 
			echo "<li>" . anchor('CRUD_Usuario/logout','Logout') . "</li>"; 
		}
    ?>
</ul>