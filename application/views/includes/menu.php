<?php 
	if ($this->session->userdata('logado') == true) {
		echo "<nav id='menu' class='navbar navbar-expand-lg navbar-custom'>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <img height='50px' width='50px' src='../../../uploads/imagens/logo.png'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>" . 
                        anchor('CRUD_Usuario/create','Cadastrar Usuário', array('class'=>'nav-link')) .
                    "</li>
                    <li class='nav-item'>" . 
                    	anchor('CRUD_Usuario/retrieve','Listar Usuários', array('class'=>'nav-link')) .
                    "</li>
                    <li class='nav-item'>" . anchor('CRUD_Planta/cadastrar','Cadastrar Planta', array('class'=>'nav-link')) . "</li>
                    <li class='nav-item'>" . anchor('CRUD_Planta/index','Listar Plantas', array('class'=>'nav-link')) . "</li>
                    <li class='nav-item'>" . 
                    	anchor('CRUD_Usuario/logout','Logout', array('class'=>'nav-link')) .
                    "</li>
                </ul>
            </div>
        </nav>";
    }