<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Usuario extends CI_Controller {

	public function __CONSTRUCT() {
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('Usuario_model');
	}

	public function create() {
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[80]');
        $this->form_validation->set_message('is_unique','Este %s já está cadastrado no sistema');
        $this->form_validation->set_rules('login','LOGIN','trim|required|max_length[70]|strtolower|is_unique[usuarios.login]');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');

		if($this->form_validation->run()==TRUE):
            $data = elements(array('nome','login','senha'), $this->input->post());
        	$data['senha']=md5($data['senha']);
        	$this->Usuario_model->do_insert($data, $permissoes);
        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create',
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function retrieve() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve',
			'usuarios' => $this->Usuario_model->get_all()->result()
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function login() {
		$login = $this->input->post('login');
		$senha = $this->input->post('senha');
		$flag = $this->verifica_login($login, $senha);
		if ($flag == true) {
			$id = $this->busca_id($login, $senha);	
			$this->session->set_userdata('id', $id);
			$this->session->set_userdata('login', $login);
			$this->session->set_userdata('senha', $senha);
			$this->session->set_userdata('logado', true);
			$this->retrieve();
		} else {
			$this->session->set_flashdata('loginbad','O usuário ou a senha estão errados');
			$this->session->set_userdata('logado', false);
			$this->index();
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('senha');
		$this->session->unset_userdata('logado');
		$this->session->unset_userdata('admin');
		$this->index();
	}

	public function index() {
		$dados = array(
			'titulo' => 'Index',
			'tela' => 'login',
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function verifica_login($login, $senha) {
		$senha = md5($senha);
		$usuarios = $this->Usuario_model->get_all()->result();
		foreach ($usuarios as $u) {
			if ($login == $u->login && $senha == $u->senha) {
				return true;
			}
		}
		return false;
	}

	public function busca_id($login, $senha) {
		$senha = md5($senha);
		$usuarios = $this->Usuario_model->get_all()->result();
		foreach ($usuarios as $u) {
			if ($login == $u->login && $senha == $u->senha) {
				return $u->id;
			}
		}
		return -1;
	}

	public function update() {
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[80]');
        $this->form_validation->set_message('Este %s já está cadastrado no sistema');
        $this->form_validation->set_rules('login','USUARIO','trim|required|max_length[70]|strtolower');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');

		if($this->form_validation->run()==TRUE):
            $dados = elements(array('nome','senha','login'),$this->input->post());
        	$dados['senha']=md5($dados['senha']);
        	$this->Usuario_model->do_update($dados, $this->input->post('idusuario'), $permissoes);
        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update',
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function delete() {
		if ($this->input->get('id')>0):  
			$this->Usuario_model->do_delete(array('id' => $this->input->get('id')));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'retrieve',
			'usuarios' => $this->Usuario_model->get_all()->result()
		);
		$this->load->view('View_Usuario',$dados);
	}
		
}
