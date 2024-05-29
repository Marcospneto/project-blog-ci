<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Noticia extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Option_model', 'option');
		$this->load->model('Noticia_model', 'noticia');
	}

	public function index()
	{
		redirect('noticia/listar', 'refresh');
	}

	public function listar()
	{
		/*Verifica se está logado*/
		verifica_login();
		//Carrega a view
		$dados['titulo'] = 'JVM - Listagem de Notícias';
		$dados['h2'] = 'Listagem de notícias';
		$dados['tela'] = 'listar';
		$dados['noticias'] = $this->noticia->getNoticia();
		$this->load->view('painel/noticia', $dados);


	}

	public function cadastrar()
	{

		/*Verifica se está logado*/
		verifica_login();

		$this->form_validation->set_rules('titulo', 'TITULO', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('conteudo', 'CONTEUDO', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors();
			log_message('error', 'Validation errors: ' . $errors);
			if (!empty($errors)) {
				set_msg($errors);

			}
		} else {

			$this->load->library('upload', config_upload());

			if ($this->upload->do_upload('imagem')) {

				/*O upload  foi executado*/
				/*Esse metodo vai retornar os dados do arquivo que foi upado*/
				$dados_upload = $this->upload->data();
				$dados_form = $this->input->post();

				$dados_insert['titulo'] = to_db($dados_form['titulo']);
				$dados_insert['conteudo'] = to_db($dados_form['conteudo']);
				$dados_insert['imagem'] = $dados_upload['file_name'];

				/*Salvando no banco de dados*/
				$insert_id = $this->noticia->insert($dados_insert);

				if ($insert_id) {
					echo json_encode(array('status' => 'success', 'message' => 'Notícia cadastrada com sucesso!', 'redirect' => site_url('noticia/listar')));
					return;

				} else {
					echo json_encode(array('status' => 'error', 'message' => 'Erro! Notícia não cadastrada.'));
					return;
				}


			} else {
				/*Erro no upload*/
				$msg = $this->upload->display_errors();
				$msg .= '<p> São permitidos arquivos JPG e PNG até 512KB .</p>';
				log_message('debug', 'Upload error: ' . $msg);
				echo json_encode(array('status' => 'error', 'message' => $msg));
				return;
			}
		}

		//Carrega a view
		$dados['titulo'] = 'JVM - Cadastro de Notícias';
		$dados['h2'] = 'Cadastro de notícias';
		$dados['tela'] = 'cadastrar';
		$this->load->view('painel/noticia', $dados);


	}

	public function excluir()
	{
		// Verifica se está logado
		verifica_login();

		// Verifica e obtém o ID da notícia
		$id = $this->getIdFromUri(3);
		//die($id ? 'Nao Nulo' : 'NULL');
		if (!$id) {
			$this->redirectWithMessage('Você deve escolher uma notícia para excluir.', 'noticia/listar');
		}

		// Obtém a notícia pelo ID
		$noticia = $this->noticia->getSingle($id);
		if (!$noticia) {
			$this->redirectWithMessage('Notícia inexistente! Escolha uma notícia para excluir.', 'noticia/listar');
		}

		$this->loadViewWithNoticiaExcluir($noticia);
	}


	//Obtém o ID da URI e valida
	private function getIdFromUri()
	{
		return (int)$this->uri->segment(3) > 0 ? (int)$this->uri->segment(3) : null;
	}

	//Redireciona com uma mensagem
	private function redirectWithMessage($message, $redirectUrl)
	{
		set_msg("<p>$message</p>");
		redirect($redirectUrl, 'refresh');
	}

	//Carrega a view com os dados da notícia
	private function loadViewWithNoticiaExcluir($noticia)
	{
		$dados = array(
			'titulo' => 'JVM - Exclusão de Notícias',
			'h2' => 'Exclusão de Notícias',
			'tela' => 'excluir',
			'noticia' => $noticia
		);
		$this->load->view('painel/noticia', $dados);
	}

	private function loadViewWithNoticiaEditar($noticia)
	{
		$dados = array(
			'titulo' => 'JVM - Exclusão de Notícias',
			'h2' => 'Exclusão de Notícias',
			'tela' => 'editar',
			'noticia' => $noticia
		);
		$this->load->view('painel/noticia', $dados);
	}


	public function excluirAction()
	{
		// Verifica se está logado
		verifica_login();

		// Verifica se foi passado o id da noticia
		$id = (int)$this->uri->segment(3);
		$response = array('status' => 'error', 'message' => 'Erro ao excluir a notícia');
		if ($id > 0) {
			$noticia = $this->noticia->getSingle($id);
			if ($noticia) {
				$imagem = 'uploads/' . $noticia->imagem;
			}

			// Tenta excluir a notícia
			if ($this->noticia->excluir($id)) {
				unlink($imagem);
				$response = array('status' => 'success', 'message' => 'Notícia excluída com sucesso');
			} else {
				$response = array('status' => 'error', 'message' => 'Erro! Nenhuma notícia foi excluída.');
			}
		} else {
			$response = array('status' => 'error', 'message' => 'Você deve escolher uma notícia para excluir..');
		}
		echo json_encode($response);
	}


	public function editar()
	{
		// Verifica se está logado
		verifica_login();

		// Verifica e obtém o ID da notícia
		$id = $this->getIdFromUri(3);
		//die($id ? 'Nao Nulo' : 'NULL');
		if (!$id) {
			$this->redirectWithMessage('Você deve escolher uma notícia para editar', 'noticia/listar');
		}

		// Obtém a notícia pelo ID
		$noticia = $this->noticia->getSingle($id);
		if (!$noticia) {
			$this->redirectWithMessage('Notícia inexistente! Escolha uma notícia para editar.', 'noticia/listar');
		}

		$this->loadViewWithNoticiaEditar($noticia);
	}

	public function editarAction()
	{
		// Verifica se está logado
		verifica_login();

		// Verifica se foi passado o id da noticia
		$id = (int)$this->uri->segment(3);

		/*Verifica se o id foi passado e é maior que 0*/
		if ($id > 0) {
			$dados_update['id'] = $id;
			$dados_update['titulo'] = to_db($this->input->post('titulo'));
			$dados_update['conteudo'] = to_db($this->input->post('conteudo'));

			/*Pega a noticia atual pelo id*/
			if ($noticia = $this->noticia->getSingle($id)) {
				$dados['noticia'] = $noticia;
				$imagem_antiga = $noticia->imagem;
			}
			/*Verifica se uma nova imagem foi enviada*/
			if (isset($_FILES['imagem']) && $_FILES['imagem']['name'] != '') {
				/*Carrega a biblioteca de upload com a configuração*/
				$this->load->library('upload', config_upload());
				/*Tenta fazer o upload da nova imagem*/
				if ($this->upload->do_upload('imagem')) {
					$dados_upload = $this->upload->data();
					$dados_update['imagem'] = $dados_upload['file_name']; /*Define o nome da nova imagem no array de dados para atualização*/
					/*Se houver uma imagem antiga tenta remove-la*/
					if (isset($imagem_antiga)) {
						$imagem_antiga_path = 'uploads/' . $imagem_antiga;
						if (file_exists($imagem_antiga_path)) {
							unlink($imagem_antiga_path);
						}
					}
				} else {
					/*Erro no upload*/
					$msg = $this->upload->display_errors();
					$msg .= '<p> São permitidos arquivos JPG e PNG até 512KB .</p>';
					log_message('debug', 'Upload error: ' . $msg);
					echo json_encode(array('status' => 'error', 'message' => $msg));
					return;
				}
			} else {
				$dados_update['imagem'] = $imagem_antiga;
			}


			// Tenta editar a notícia
			if ($this->noticia->insert($dados_update)) {
				echo json_encode(array('status' => 'success', 'message' => 'Notícia editada com sucesso!', 'redirect' => site_url('noticia/listar')));
				return;
			} else {
				echo json_encode(array('status' => 'success', 'message' => 'Erro nenhuma noticia foi editada!', 'redirect' => site_url('noticia/listar')));
				return;

			}

			// Redireciona para a lista de notícias
			redirect('noticia/listar', 'refresh');
		}


	}
}
