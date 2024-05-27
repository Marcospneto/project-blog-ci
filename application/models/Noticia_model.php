<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Noticia_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function insert($dados){
		if (isset($dados['id']) && $dados['id'] > 0){
			/*Noticia já existe, devo editar*/
			$this->db->where('id', $dados['id']);
			unset($dados['id']);
			$this->db->update('noticias', $dados);
			return $this->db->affected_rows();
		}else{
			/*Noticia não existe, devo inserir*/
			$this->db->insert('noticias', $dados);
			return $this->db->insert_id();
		}
	}

	public function getNoticia($limit=0, $offset=0){
		if($limit == 0){
			$this->db->order_by('id', 'desc');
			$query = $this->db->get('noticias');
			if ($query->num_rows() > 0){
				return $query->result();
			}else{
				return NULL;
			}
		}else{
			$this->db->order_by('id', 'desc');
			$query = $this->db->get('noticias', $limit);
			if ($query->num_rows() > 0){
				return $query->result();
			}else{
				return NULL;
			}
		}
	}

	public function getSingle($id = 0){
		/*Atribuindo o id do parametro no where*/
		$this->db->where('id', $id);
		/*Pegando os dados da tabela noticia*/
		$query = $this->db->get('noticias', 1);
		/*Verificando o numero de linhas*/
		if ($query->num_rows() == 1){
			/*row recebe $query->row para pegar somente o resultado*/
			$row = $query->row();
			return $row;
		}else{
			return NULL;
		}
	}

	public function excluir($id = 0){
		$this->db->where('id', $id);
		$this->db->delete('noticias');
		return $this->db->affected_rows();
	}



















}
