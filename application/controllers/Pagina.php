<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Option_model', 'option');
		$this->load->model('Noticia_model', 'noticia');
	}

	public function index(){
		$dados['titulo'] = 'JVM Desenvolvimento Web';
		$this->load->view('home', $dados);

	}

	public function cliente(){
		$dados['titulo'] = 'Clientes - JVM Desenvolvimento Web';
		$this->load->view('cliente', $dados);

	}

	public function servico(){
		$dados['titulo'] = 'O que eu faço - JVM Desenvolvimento Web';
		$this->load->view('servico', $dados);
	}

	public function sobre(){
		$dados['titulo'] = 'Sobre - JVM Desenvolvimento Web';
		$this->load->view('sobre', $dados);
	}

	public function contato(){
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'email'));
		//Definindo regras de validação do formulario. O metodo set_rules é responsavel por setar as regras de validação
		//para cada um dos campos do formulario. Regras de validação do form
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('assunto', 'Assunto', 'trim|required');
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required');

		//Verificando validação
		//run é o metodo responsavel por rodar a validação do form
		if ($this->form_validation->run() == FALSE){
			//Armazena os erros de validação
			$dados['formerror'] = validation_errors();
		}else{
			//Esse metodo recupera todos os campos que foram enviados do formulario
			$dados_form = $this->input->post();
			$this->email->from($dados_form['email'], $dados_form['nome']);
			$this->email->to('marcossenior293@gmail.com');
			$this->email->subject($dados_form['assunto']);
			$this->email->message($dados_form['mensagem']);

			if ($this->email->send()){
				$dados['formerror'] = 'Email enviado com sucesso';
				echo 'enviou';

			}else {
				$dados['formerror'] = 'Email nao enviado';
				echo 'deu erro';
				echo $this->email->print_debugger();
			}

		}

		$dados['titulo'] = 'Fale comigo - JVM Desenvolvimento Web';
		$this->load->view('contato', $dados);
	}


	public function post(){
		if (($id = $this->uri->segment(2)) > 0) {
			if ($noticia = $this->noticia->getSingle($id)){
				$dados['titulo'] = to_html($noticia->titulo). ' - LTI';
				$dados['not_titulo'] = to_html($noticia->titulo);
				$dados['not_conteudo'] = to_html($noticia->conteudo);
				$dados['not_imagem'] = $noticia->imagem;
			}else{
				$dados['titulo'] = 'Página não encontrada - LTI';
				$dados['not_titulo'] = 'Notícia não encontrada';
				$dados['not_conteudo'] = '<p>Nenhuma notícia foi encontrada com base nos parâmetros fornecidos</p>';
				$dados['not_imagem'] = '';
			}
		}else{
			redirect(base_url(), 'refresh');
		}
	$this->load->view('post', $dados);
	}













}
