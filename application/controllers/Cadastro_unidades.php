<?php
defined('BASEPATH') OR exit('Acesso negado.');

class Cadastro_unidades extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Usuario_model', 'usuario', TRUE);
	}

	public function index()
	{

		$data['titulo_da_pagina'] = "Cadastro de Unidades";
		$data['caminho'] = "Cadastro";
		$data['pagina'] = "Unidades";
		$data['conteudo'] = $this->load->view('cadastros/unidades/formulario_view',$data,TRUE);

		$this->load->view('main_view',$data);
		return false;
	}

}