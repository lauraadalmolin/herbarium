<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Planta_model extends CI_Model{

	public function cadastrar($dados) {
		if($dados!=NULL):
			$this->db->insert('plantas',$dados);
			return $this->db->insert_id();
		endif;
	}

	public function addFoto($id, $ext){
		$this->db->where("id", $id);
		$this->db->update("plantas", array("foto" => $ext));
	}



	public function editar($id, $dados) {
		$this->db->update('plantas', $dados, array('id' => $id));
	}

	public function excluir($id) {
		if($id!=NULL):
			$this->db->delete('plantas', array("id" => $id));
		endif;
	}

	public function Listar($userId) {
		$this->db->where('userid', $userId);
		$this->db->order_by('nome', 'ASC');
		return $this->db->get('plantas')->result();
	}

	public function getExt($id){
		$this->db->select('foto');
		$this->db->where('id', $id);
		return $this->db->get('plantas')->row()->foto;
	}
	
	public function carregar($id) {
		if ($id != NULL):
			$this->db->where('id',$id);
			return $this->db->get('plantas')->row();
		endif;
	}

}