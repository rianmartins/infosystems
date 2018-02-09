<?php
defined('BASEPATH') OR exit('Acesso negado.');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Usuario_model', 'usuario', TRUE);
	}

	public function index()
	{

		if($_SESSION == null){
			$data["tipo_retorno"] = "erro";
			$data["msg_retorno"] = "Sua sessão expirou ou foi encerrada, favor fazer login novamente para acessar o sistema";

			$this->load->view('login_view',$data);
			return false;
		}
		else{
			$_SESSION['ultima_modificacao'] = time();
			
			$data['nome_usuario'] = $_SESSION['user_name'];
			$data['bem_vindo'] = "false";
			$data['unidades'] = "";
			$data['cod_funcao'] = $_SESSION['cod_funcao'];
			$data['titulo_da_pagina'] = "Dashboard";
			$data['pagina'] = "Dashboard";

			$data['conteudo'] = $this->load->view('welcome_message',$data,TRUE);
			$this->load->view('main_view',$data);
			return false;
		}
	}
}