<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Option_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function getOption($option_name, $default_value=NULL){
		$this->db->where('option_name', $option_name);
		/*Vamos dizer que vou fazer um select no banco de dados
		select*from options where option_name (parametro que estou passando em cima)
		coloco o limite 1 para trazer apenas 1 resultado
		*/
		$query = $this->db->get('options', 1);
		/*Se eu encontrei o resultado, retorno o valor da option*/
		if($query->num_rows() == 1){
			$row = $query->row();
			return $row->option_value;

		}else {
			return $default_value;
		}
	}

	public function update_option($option_name, $option_value){
		$this->db->where('option_name', $option_name);
		/*Vamos dizer que vou fazer um select no banco de dados
		select*from options where option_name (parametro que estou passando em cima)
		coloco o limite 1 para trazer apenas 1 resultado
		*/
		$query = $this->db->get('options', 1);
		/*Se eu encontrei o resultado, retorno o valor da option*/
		if($query->num_rows() == 1){
			/*opção ja existe, devo atualizar*/
			$this->db->set('option_value', $option_value);
			$this->db->where('option_name', $option_name);
			$this->db->update('options');
			return $this->db->affected_rows();


		}else {
			/*Opção nao existe, devo insetir*/
			$dados = array(
				'option_name' => $option_name,
				'option_value' => $option_value
			);
			$this->db->insert('options', $dados);
			return $this->db->insert_id();
		}

	}


}
