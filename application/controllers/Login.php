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


		if($termos_de_uso == "false"){
			echo json_encode('101');
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
			echo json_encode('102');
			return false;
		}
			
		if($mesmo_email){
			echo json_encode('103');
			return false;
		}

		if($senha_cadastro == $senha_confirmacao){

			$pass = hash('sha512',$senha_cadastro);
			$chave = $this->model->gera_nova_chave();

			$novo_usuario = array(
				"usuario"			 => $usuario,
				"nome_pessoa" 		 => $nome,
				"email" 			 => $email,
				"senha" 			 => $pass,
				"cod_usuario_status" => 2,
				"cod_usuario_funcao" => 10,
				"chave"				 => $chave
			);

			$id_usuario = $this->model->insert($novo_usuario);

			echo json_encode('1');
			return false;
		}
		else{
			echo json_encode('104');
			return false;
		}

	}

	public function esqueci_senha(){
		
		$this->load->view('esqueci_senha_view');
		return false;
	}

	public function mudar_senha($chave){

		$chaves_banco = $this->model->get_usuarios_chave();
		$id_usuario = null;

		$encontrou_chave = false;
		foreach ($chaves_banco as $key => $chave_banco) {
			if($chave_banco->chave == $chave){
				$id_usuario = $chave_banco->id_usuario;
				$encontrou_chave = true;
			}
		}

		if($encontrou_chave){
			$data['id_usuario'] = $id_usuario;
			$data['chave'] = $chave;

			$this->load->view('mudanca_senha_view',$data);
			return false;
		}
		else{
			$this->load->view('link_expirado_view');
			return false;
		}
		
	}

	public function salvar_mudanca_senha($id_usuario){
		$nova_senha 			= $this->input->post("nova_senha");
		$nova_senha_confirmacao = $this->input->post("nova_senha_confirmacao");
		$chave 					= $this->input->post("chave");
		$chave_atual 			= $this->model->get_chave_usuario($id_usuario); 

		if($chave != $chave_atual){
			echo json_encode('101');
			return false;
		}

		if($nova_senha == $nova_senha_confirmacao){

			$nova_senha_hash = hash('sha512',$nova_senha);

			$this->model->atualiza_chave($id_usuario);
			$this->model->alterar_senha($id_usuario,$nova_senha_hash);

			echo json_encode('1');
			return false;
		}
		else{
			echo json_encode('102');
			return false;
		}

		echo json_encode('103');
		return false;
	}

	public function recupera_senha(){

		$email = $this->input->post("email_registro");

		$emails_cadastrados = $this->model->get_usuarios_emails();

		$tem_cadastro = false;
		foreach ($emails_cadastrados as $key => $email_cadastrado) {
			if($email_cadastrado->email == $email)
				$tem_cadastro = true;
		}

		if(!$tem_cadastro){
			echo json_encode('101');
			return false;
		}

		$chave = $this->model->get_chave($email);
		$nome_pessoa = $this->model->get_usuario_nome($email);

		$link = base_url('index.php/login/mudar_senha/') . "/" . $chave;

		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                      	// Set mailer to use SMTP
		// $mail->Host = 'smtp.live.com';  						// Hotmail SMTP server
		$mail->Host = 'smtp.gmail.com';  						// Gmail SMTP server
		$mail->SMTPAuth = true;                               	// Enable SMTP authentication
		$mail->SetLanguage("br", "libs/"); 						// ajusto a lingua a ser utilizadda
		$mail->CharSet = 'utf-8'; 								// Charset da mensagem (opcional)
		// InfoSystems Gmail account
		$mail->Username = 'infosystems.cia@gmail.com';          // SMTP username
		$mail->Password = 'infosystems2017';                    // SMTP password

		$mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    	// TCP port to connect to

		$mail->setFrom('infosystems.cia@gmail.com', 'InfoSystems');
		$mail->addAddress($email, $nome_pessoa);     			// Add a recipient
		$mail->addReplyTo('naoresponder@infosystems.com', 'InfoSystems');

		$mail->isHTML(true);                                  	// Set email format to HTML

		$assunto = '[InfoSystems] - Mudança de senha';
		$corpo = 'Recebemos uma solicitação de mudança de senha da sua conta na InfoSystems. Para realizar essa operação, favor acesse o link abaixo:</br> &emsp; ' . $link . '</br></br>Caso você não tenha solicitado tal alteração, favor desconsiderar essa mensagem.';
		$corpo_alt = 'Recebemos uma solicitação de mudança de senha da sua conta na InfoSystems. Para realizar essa operação, favor acesse o link: ' . $link . '  Caso você não tenha solicitado tal alteração, favor desconsiderar essa mensagem.';

		$mail->Subject = $assunto;
		$mail->Body    = $corpo;
		$mail->AltBody = $corpo_alt;

		if(!$mail->send()) {
		    $retorno = $mail->ErrorInfo;
		} else {
		    $retorno = '1';
		}

		echo json_encode($retorno);
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
					$cod_funcao = $user->cod_usuario_funcao;
					$cod_status = $user->cod_usuario_status;
					$loga = true;
				}
			}
		}

		if($loga){

			if($cod_status != 1){
				$data["tipo_retorno"] = "erro";
				$data["msg_retorno"] = "Usuário não autorizado. Favor entrar em contato com a gerência.";

				$this->load->view('login_view',$data);
				return false;
			}

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
			$_SESSION['cod_funcao'] = $cod_funcao;

			$data['nome_usuario'] = $nome_pessoa;
			$data['bem_vindo'] = "true";
			$data['cod_funcao'] = $cod_funcao;
			$data['cod_status'] = $cod_status;

			$data['conteudo'] = $this->load->view('welcome_message',$data,TRUE);
			$data['titulo_da_pagina'] = "Dashboard";
			$data['caminho'] = "";
			$data['pagina'] = "Dashboard";

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
