<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function do_insert($dados=NULL, $permissoes=NULL) {
		if($dados!=NULL):
			$this->db->insert('usuarios',$dados);
			$this->session->set_flashdata('cadastrook','Cadastro realizado com sucesso!');
			redirect('CRUD_Usuario/create');
		endif;
	}


	public function do_update($dados=NULL,$id=NULL,$permissoes=NULL) {
		if($dados!=NULL && $id!=NULL):
			$this->db->update('usuarios', $dados, array('id' => $id));
			$this->session->set_flashdata('edicaook','Atualização realizada com sucesso!');
			redirect(current_url());
		endif;
	}

	public function do_delete($id=NULL) {
		if($id!=NULL):
			$this->db->delete('usuarios',$id);
			$this->session->set_flashdata('exclusaook','Registro excluído com sucesso!');
			redirect('CRUD_Usuario/retrieve');
		endif;
	}

	public function get_all() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('usuarios');
	}

	public function get_byid($id=NULL) {
		if ($id != NULL):
			$this->db->order_by('id', 'ASC');
			$this->db->where('id',$id);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
	}

}