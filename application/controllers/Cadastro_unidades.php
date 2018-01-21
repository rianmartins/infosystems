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

		$data['titulo_da_pagina'] = "Cadastro de Unidades";
		$data['caminho'] = "Cadastro";
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

}