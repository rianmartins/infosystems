<?php
defined('BASEPATH') OR exit('Acesso negado.');

class Configuracoes_sistema extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Unidades_model', 'model', TRUE);
		$this->load->model('Usuario_model', 'usuario', TRUE);
	}

	public function index(){

		$_SESSION['ultima_modificacao'] = time();

		$data['titulo_da_pagina'] = "Cadastro de Unidades";
		$data['caminho'] = "Cadastro";
		$data['pagina'] = "Unidades";

		$data['estados'] = $this->model->get_estados_br();

		$data['conteudo'] = $this->load->view('cadastros/unidades/formulario_view',$data,TRUE);

		$this->load->view('main_view',$data);
		return false;
	}

	public function funcionario_funcao_index(){

		$_SESSION['ultima_modificacao'] = time();

		$data['titulo_da_pagina'] = "Cadastro de Funções";
		$data['caminho'] = "Configurações do Sistema";
		$data['pagina'] = "Cadastro de Funções";

		$data['dados_funcoes'] = $this->model->get_estados_br();

		$data['conteudo'] = $this->load->view('configuracoes_sistema/funcionarios_funcoes_index_view',$data,TRUE);

		$this->load->view('main_view',$data);
		return false;
	}

}