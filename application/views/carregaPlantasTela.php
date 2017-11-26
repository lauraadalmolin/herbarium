<?php 
	$this->load->view('includes/header');
	$this->load->view('includes/menu');
	if ($tela != '')$this->load->view('plantasTelas/' . $tela);
	$this->load->view('includes/footer');