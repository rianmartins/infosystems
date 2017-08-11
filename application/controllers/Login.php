<?php
defined('BASEPATH') OR exit('Acesso negado.');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Usuario_model', 'model', TRUE);
	}

	public function index()
	{

		session_unset();

		$data["tipo_retorno"] = "";
		$data["msg_retorno"] = "";

		$this->load->view('login_view',$data);
	}

	public function cadastro_usuario(){

		$data['nome_pessoa'] = "";
		$data['email_registro'] = "";
		$data['usuario_registro'] = "";
		$data["tipo_retorno"] = "";
		$data["msg_retorno"] = "";

		$this->load->view('cadastro_usuario_view',$data);

	}

	public function verifica_cadastro(){

		$usuario = $this->input->post("usuario_registro");
		$nome = $this->input->post("nome_registro");
		$email = $this->input->post("email_registro");
		$senha_cadastro = $this->input->post("senha_registro");
		$senha_confirmacao = $this->input->post("senha_confirmacao");
		$termos_de_uso = $this->input->post("termos_de_uso_checkbox");

		if($termos_de_uso != "on"){
			$data['nome_pessoa'] = $nome;
			$data['email_registro'] = $email;
			$data['usuario_registro'] = $usuario;

			$data["tipo_retorno"] = "erro";
			$data["msg_retorno"] = "Por favor, aceite os termos de uso para realizar o cadastro.";

			$this->load->view('cadastro_usuario_view',$data);
			// echo '101';
			return false;
		}

		$usuarios_email = $this->model->get_usuarios_emails();
		$mesmo_usuario = false;
		$mesmo_email = false;

		// print_r($usuarios_email);exit;

		foreach ($usuarios_email as $key => $user) {
			if($user->usuario == $usuario)
				$mesmo_usuario = true;
			if($user->email == $email)
				$mesmo_email = true;
		}

		if($mesmo_usuario){
			$data['nome_pessoa'] = $nome;
			$data['email_registro'] = $email;
			$data['usuario_registro'] = $usuario;

			$data["tipo_retorno"] = "erro";
			$data["msg_retorno"] = "Esse nome de usuário já foi escolhido, favor escolher outro.";

			$this->load->view('cadastro_usuario_view',$data);
			// echo '102';
			return false;
		}
			
		if($mesmo_email){
			$data['nome_pessoa'] = $nome;
			$data['email_registro'] = $email;
			$data['usuario_registro'] = $usuario;

			$data["tipo_retorno"] = "erro";
			$data["msg_retorno"] = "Esse email já está cadastrado.";

			$this->load->view('cadastro_usuario_view',$data);
			// echo '103';
			return false;
		}

		if($senha_cadastro == $senha_confirmacao){

			$pass = hash('sha512',$senha_cadastro);

			$novo_usuario = array(
				"usuario"		=> $usuario,
				"nome_pessoa" 	=> $nome,
				"email" 		=> $email,
				"senha" 		=> $pass,
				"cod_usuario_status" => 2,
				"cod_usuario_funcao" => 10
			);

			$id_usuario = $this->model->insert($novo_usuario);

			$data['nome_pessoa'] = $nome;
			$data['email_registro'] = $email;
			$data['usuario_registro'] = $usuario;

			$data["tipo_retorno"] = "sucesso";
			$data["msg_retorno"] = "Usuário Cadastrado com sucesso.";

			$this->load->view('cadastro_usuario_view',$data);
			// $this->index();
			// echo '1';
			return false;
		}
		else{
			$data['nome_pessoa'] = $nome;
			$data['email_registro'] = $email;
			$data['usuario_registro'] = $usuario;

			$data["tipo_retorno"] = "erro";
			$data["msg_retorno"] = "A senha digitada não confere. Favor tentar novamente.";

			$this->load->view('cadastro_usuario_view',$data);
			// echo '104';
			return false;
		}

	}

	public function esqueci_senha(){
		
		$this->load->view('esqueci_senha_view');
		return false;
	}

	public function logar(){

		if (!($this->input->server('REQUEST_METHOD') == 'POST')){
			$data["tipo_retorno"] = "erro";
			$data["msg_retorno"] = "Você foi desconectado, ou sua sessão expirou.";

			$this->load->view('login_view',$data);
			return false;
		}

		$login = $this->input->post("user_login");
		$senha = $this->input->post("user_senha");
		$senha_hash = hash('sha512',$senha);

		$loga = false;

		$usuarios_email = $this->model->get_usuarios_senhas();
		foreach ($usuarios_email as $key => $user) {
			if($user->usuario == $login || $user->email == $login){
				if($user->senha == $senha_hash){
					$nome_pessoa = $user->nome_pessoa;
					$id_usuario = $user->id_usuario;
					$loga = true;
				}
			}
		}

		if($loga){

			$unidades = $this->model->get_unidades();
			if(count($unidades) == 0){
				$data['unidades'] = "nao";
			}
			else{
				$data['unidades'] = "sim";
			}

			if (!isset($_SESSION)) session_start();

			$_SESSION['user_name'] = $nome_pessoa;
			$_SESSION['id_usuario'] = $id_usuario;
			$_SESSION['logado'] = true;
			$_SESSION['ultima_modificacao'] = time();
			$_SESSION['cod_unidade'] = $this->model->get_usuario_unidade($id_usuario);

			$data['nome_usuario'] = $nome_pessoa;
			$data['bem_vindo'] = "true";


			$data['conteudo'] = $this->load->view('welcome_message',$data,TRUE);
			$data['titulo_da_pagina'] = "Dashboard";

			$this->load->view('main_view',$data);
			return false;
		}
		else{
			$data["tipo_retorno"] = "erro";
			$data["msg_retorno"] = "Usuário/Senha incorreto(s).";

			$this->load->view('login_view',$data);
			return false;
		}
	}

	public function logout(){
		
		if (!isset($_SESSION)) session_start();
		unset($_SESSION['logado']);
		session_unset();
		session_destroy(); // Destrói a sessão limpando todos os valores salvos
		unset($_POST);
		$_POST = array();

		if(isset($_COOKIE[session_name()])):
	        setcookie(session_name(), '', time()-7000000, '/');
	    endif;

	    if(isset($_COOKIE['login_user'])):
	        setcookie('login_user', '', time()-7000000, '/');
	    endif;

		header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Expires: Fri, 06 Jun 1975 15:10:00 GMT');

		$data["tipo_retorno"] = "";
		$data["msg_retorno"] = "";

		$this->load->view('login_view',$data);
		return false;
	}
}
