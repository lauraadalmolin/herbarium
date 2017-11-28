<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Planta extends CI_Controller {

	public function __CONSTRUCT() {
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('Planta_model');
	}

	public function index(){
		$plantas = $this->Planta_model->listar($this->session->userdata('id'));

		$dados = array(
			'titulo' => 'Listar Plantas',
			'tela' => 'index',
			'plantas' => $plantas
		);
		$this->load->view('carregaPlantasTela',$dados);
	}

	public function cadastrar(){
		$this->form_validation->set_rules('nome','Nome','trim|required|max_length[50]');
        $this->form_validation->set_rules('pais','Pais','trim|max_length[20]');
        $this->form_validation->set_rules('estado','Estado','trim|max_length[20]');
        $this->form_validation->set_rules('cidade','Cidade','trim|max_length[20]|required');
        $this->form_validation->set_rules('descricao','Descrição','trim|max_length[200]');

        if($this->form_validation->run() == true){
        	$data = elements(array('nome','pais','estado', 'cidade', 'descricao', 'data'), $this->input->post());
        	$data['userid'] = $this->session->userdata('id');
        	$id = $this->Planta_model->cadastrar($data);

        	$this->realizaUpload($id);

        	redirect("/CRUD_Planta/index");
        }

		$dados = array(
			'titulo' => 'Cadastrar Planta',
			'tela' => 'cadastrar'
		);
		$this->load->view('carregaPlantasTela',$dados);

	}

	public function excluir(){
		$id = $this->uri->segment(3);
		$ext = $this->Planta_model->getExt($id);
		$this->Planta_model->excluir($id);
		unlink("./uploads/" . $id . $ext);
		redirect('/CRUD_Planta/index');
	}

	public function editar(){
		$this->form_validation->set_rules('nome','Nome','trim|required|max_length[50]');
        $this->form_validation->set_rules('pais','Pais','trim|max_length[20]');
        $this->form_validation->set_rules('estado','Estado','trim|max_length[20]');
        $this->form_validation->set_rules('cidade','Cidade','trim|max_length[20]|required');
        $this->form_validation->set_rules('descricao','Descrição','trim|max_length[200]');

        if($this->form_validation->run() == true){
        	$data = elements(array('nome','pais','estado', 'cidade', 'descricao', 'data'), $this->input->post());

        	$id = $this->input->post('id');

        	$newFoto = $this->input->post('foto');

        	$data['userid'] = $this->session->userdata('id');
        	$this->Planta_model->editar($id, $data);

        	if($newFoto !== ''){
        		$oldFoto = $this->input->post('oldExt');
        		unlink('./uploads/' . $id. $oldFoto);
        		$this->realizaUpload($id);
        	}
        	

        	redirect("/CRUD_Planta/index");
        }

        $id = $this->uri->segment(3);

        $dados = $this->Planta_model->carregar($id);

		$dados = array(
			'titulo' => 'Cadastrar Planta',
			'tela' => 'editar',
			'planta' => $dados
		);
		$this->load->view('carregaPlantasTela',$dados);		
	}

	public function Detalhes(){
		$id = $this->uri->segment(3);
		$dados = $this->Planta_model->carregar($id);

		$dados = array(
			'titulo' => 'Detalhes Planta',
			'tela' => 'detalhes',
			'planta' => $dados
		);
		$this->load->view('carregaPlantasTela',$dados);
	}

	private function realizaUpload($id){
		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = $id;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto')){

        	$data = $this->upload->data();
        	$this->Planta_model->addFoto($id, $data['file_ext']);
        }
	}
}