<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Option_model', 'option');
	}

	public function index()
	{
		if ($this->option->getOption('setup_executado') == 1) {
			//setup ok, mostrar a tela para editar dados do setup
			redirect('setup/alterar', 'refresh');
		} else {
			redirect('setup/instalar', 'refresh');
		}
	}

	public function instalar(){

		if ($this->option->getOption('setup_executado') == 1) {

			//setup ok, mostrar a tela para editar dados do setup
			redirect('setup/alterar', 'refresh');
		}
		/*Regras de validação*/
		$this->form_validation->set_rules('login', 'NOME', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|min_length[6]|matches[senha]');

		/*Verifica a validação*/
		 if ($this->form_validation->run() == FALSE){
			 $errors = validation_errors();
			 if(!empty($errors)) {
				 set_msg($errors);
			 }

		 }else {

				$dados_form = $this->input->post();
			 	$this->option->update_option('user_login', $dados_form['login']);
			 	$this->option->update_option('user_email', $dados_form['email']);
			 	$this->option->update_option('user_pass', password_hash($dados_form['senha'], PASSWORD_DEFAULT));
				$inserido = $this->option->update_option('setup_executado', 1);

				  if ($inserido){
					  set_msg('<p> Sistema instalado, use o dados cadastrados para logar no sistema.</p>');
					  redirect('setup/login', 'refresh');
				  }
		 }

		 //carega view
		$dados['titulo'] = 'JVM - Setup do Sistema';
		$dados['h2'] = 'Setup do sistema';
		$this->load->view('painel/setup', $dados);
	}

	public function login(){
		/*Caso o usuario acesse a tela de login e o sistema nao tenha sido
		instalado, redireciona para setup/instalar           */
		if($this->option->getOption('setup_executado') != 1){
			redirect('setup/instalar', 'refresh');
		}

		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|min_length[6]');

		if ($this->form_validation->run() == FALSE){
			$errors = validation_errors();
			if(!empty($errors)) {
				set_msg($errors);
			}

		}else {

			$dados_form = $this->input->post();
			if($this->option->getOption('user_email') == $dados_form['email']){
				/*Se o usuário existe*/
				if (password_verify($dados_form['senha'], $this->option->getOption('user_pass'))){
					/*Senha ok, fazer login*/
					$this->session->set_userdata('logged', TRUE);
					$this->session->set_userdata('user_email', $dados_form['email']);
					/*Fazer redirect para home do painel*/
					redirect('setup/alterar', 'refresh');
				}else{
					/*Senha incorreta*/
					set_msg('<p>Senha incorreta!</p>');

				}
			}else {
				/*Usuario não existe*/
				set_msg('<p> Usuário inexistente! </p>');
			}
		}


		/*Carrega a view*/
		$dados['titulo'] = 'JVM - Setup do Sistema';
		$dados['h2'] = 'Acessar o painel';
		$this->load->view('painel/login', $dados);

	}

	public function alterar(){
		verifica_login();
		$this->form_validation->set_rules('login', 'NOME', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|min_length[6]');
		$this->form_validation->set_rules('nome_site', 'NOME DO SITE', 'trim|required');
		/*Se o post senha vier setado do form*/
		if(isset($_POST['senha']) && $_POST['senha'] != ''){
			$this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|min_length[6]|matches[senha]');
		}

		if ($this->form_validation->run() == FALSE){
			$errors = validation_errors();
			if(!empty($errors)) {
				set_msg($errors);
			}
		}else {
			$dados_form = $this->input->post();
			$this->option->update_option('user_login', $dados_form['login']);
			$this->option->update_option('user_email', $dados_form['email']);
			$this->option->update_option('nome_site', $dados_form['nome_site']);
			if(isset($dados_form['senha']) && $dados_form['senha'] != ''){
				$this->form_validation->set_rules('senha2', 'REPITA A SENHA', 'trim|required|min_length[6]|matches[senha]');
				$this->option->update_option('user_pass', password_hash($dados_form['senha'], PASSWORD_DEFAULT));
			}
			set_msg('<span> Alterado com sucesso  </span>');
		}

		/*Aqui estou pegando no banco de dados os campos user_login e user_email
		  e ja retornando nos campos da view*/
		$_POST['login'] = $this->option->getOption('user_login');
		$_POST['email'] = $this->option->getOption('user_email');
		$_POST['nome_site'] = $this->option->getOption('nome_site');

		/*Carrega a view*/
		$dados['titulo'] = 'JVM - Setup do Sistema';
		$dados['h2'] = 'Alterar configuração básica';
		$this->load->view('painel/config', $dados);


	}

	public function logout(){
		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('user_email');
		set_msg('<span> Você saiu do sistema! </span>');
		redirect('setup/login', 'refresh');
	}

}





























