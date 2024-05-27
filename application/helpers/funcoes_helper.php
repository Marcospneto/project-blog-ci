<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('set_msg')){
		function set_msg($msg=NULL){
			/*Pegando a instancia da classe*/
			$ci = & get_instance();
			/*Em vez de usar o this vou usar o ci(O ci pegou a instancia da classe)*/
			$ci->session->set_userdata('aviso', $msg);

	}


}

if (!function_exists('get_msg')){
	/*Retorna uma mensagem definida pela função set_msg*/
	function get_msg($destroy=TRUE){
		/*Pegando instancia da classe em execução*/
		$ci = & get_instance();
		/*Recebe o user data aviso, vai pegar de volta da session a mensagem que setei, se existir*/
		$retorno = $ci->session->userdata('aviso');
		if ($destroy){
			$ci->session->unset_userdata('aviso');
			return $retorno;
			/*Primeiroa armazeno a variavel, depois destruo a informaçãousando o unset_userdata para
			ai sim retornar na sequencia o valor que ja tinha recuperado*/

			//Sessao é um espaço temporario no navegador
		}
	}
}

if (!function_exists('verifica_login')){
	/*Verifica se o usuario está logado, caso nao, redireciona para outra pagina*/
	function verifica_login($redirect='setup/login'){
		$ci = & get_instance();
		/*Se a session user_data pegando o campo logged for diferente de TRUE,
		quer dizer que o usuario nao está autenticado*/
		if($ci->session->userdata('logged') != TRUE){
			set_msg('<p> Acesso restrito! Faça login para continuar. </p>');
			redirect($redirect, 'refresh');
		}
	}
}

if (!function_exists('config_upload')){
	/* Define as configurações para upload de imagens/arquivos */
	function config_upload($path='./uploads/', $types='jpg|png', $size=512){
		/*Criando array config que recebe os parametros e logo apos o array é retornado*/
		$config['upload_path'] = $path;
		$config['allowed_types'] = $types;
		$config['max_size'] = $size;
		return $config;
	}
}

if (!function_exists('to_db')){
	/*Codifica o html para salvar no banco de dados*/
	function to_db($string = NULL){
		return htmlentities($string);
	}
}

if (!function_exists('to_html')){
	/*Decodifica o html e remove barras invertidas do conteúdo*/
	function to_html($string = NULL){
		return html_entity_decode($string);
	}
}

if (!function_exists('resumo_post')){
	/*Gera um texto parcial a partir do conteudo de um post*/
	function resumo_post($string=NULL, $tamanho=100){
		/*Chamando a função to html para reverter a codificação do banco*/
		$string = to_html($string);
		/*Removendo tags html */
		$string = strip_tags($string);
		/*Gerando um resumo*/
		$string = substr($string, 0, $tamanho);
		return $string;
	}

}
































