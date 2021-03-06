<?php
defined('BASEPATH') OR exit('Acesso negado.');

class Cadastro_unidades extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Unidades_model', 'model', TRUE);
		$this->load->model('Usuario_model', 'usuario', TRUE);
	}

	public function index()
	{

		$_SESSION['ultima_modificacao'] = time();
		
		$data['titulo_da_pagina'] = "Cadastro de Unidades";
		$data['caminho'] = "Configurações do Sistema";
		$data['pagina'] = "Unidades";

		$data['estados'] = $this->model->get_estados_br();

		$data['conteudo'] = $this->load->view('cadastros/unidades/formulario_view',$data,TRUE);

		$this->load->view('main_view',$data);
		return false;
	}

	public function get_cidades_by_estados($estado_id){
		$cidades = $this->model->consulta_cidades_por_estado($estado_id);

		echo json_encode($cidades);
	}


	public function get_estado_id($estado_uf){
		$estado_id = $this->model->consulta_estado_id($estado_uf);

		echo json_encode($estado_id);
	}

	public function get_cidade_id($cidade_nome){
		$cidade_id = $this->model->consulta_cidade_id($cidade_nome);

		echo json_encode($cidade_id);
	}

}