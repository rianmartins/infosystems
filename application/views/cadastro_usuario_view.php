<?php
defined('BASEPATH') OR exit('Acesso negado.');
?>

<head>
    
    <!-- Title -->
    <title>InfoSystems | Cadastre-se</title>
    
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    
    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="/static/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
    <link href="/static/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
    <link href="/static/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>    	
    
    <!-- Theme Styles -->
    <link href="/static/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/css/custom.css" rel="stylesheet" type="text/css"/>    
    <link href="/static/assets/css/toastr.css" rel="stylesheet" type="text/css"/>

    <!-- Load JQueries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"> </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"> </script>

    
</head>
<body class="page-register login-alt">
    <main class="page-content">
        <div class="page-inner">
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-6 center">
                        <div class="login-box panel panel-white">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="http://www.infosystems.com" class="logo-name text-lg">InfoSystems</a>
                                        <p class="m-t-md" style="text-align: justify;">A InfoSystems é o sistema de gerenciamento perfeito para o seu negócio. Só aqui você encontra tudo o que precisa com a simplicidade e praticidade que só a InfoSystems oferece.<br><br> Caso você ainda não tenha cadastro, crie sua conta aqui e entre em contato com a administração da sua empresa informando seu nome de usuário criado.</p><br>
                                        <p class="text-center m-t-xs text-sm">2017 &copy; InfoSystems by Rian Martins.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post" id="formulario_cadastro" class="m-t-md">
                                            <div class="form-group">
                                                <input type="text" title="Esse campo é obrigatório" name="nome_registro" class="form-control required" placeholder="Nome" id="nome_registro_cadastro" >
                                            </div>
                                            <div class="form-group">
                                                <input type="text" title="Esse campo é obrigatório" name="usuario_registro" class="form-control required" placeholder="Usuário" id="usuario_registro_cadastro" >
                                            </div>
                                            <div class="form-group">
                                                <input type="email" title="Favor digitar um endereço de email válido." name="email_registro" class="form-control required" placeholder="Email" id="email_registro_cadastro">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" title="Esse campo é obrigatório" name="senha_registro" id="senha_cadastro_cadastro" class="form-control required" placeholder="Senha">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" title="Favor digitar a mesma senha novamente" name="senha_confirmacao" id="senha_confirmacao_cadastro" class="form-control required" placeholder="Confirme sua senha">
                                            </div>
                                            <label>
                                                <input type="checkbox" name="termos_de_uso_checkbox" id="termos_de_uso_checkbox_cadastro"> Eu concordo com os termos de uso
                                            </label>
                                            <button type="button" class="btn btn-success btn-block m-t-xs" id="submit-form-cadastro">Cadastre-se</button>
                                            <p class="text-center m-t-xs text-sm">Já possui uma conta?</p>
                                            <a href="<?php echo base_url('index.php/login'); ?>" class="btn btn-default btn-block m-t-xs">Login</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
        </div><!-- Page Inner -->
    </main><!-- Page Content -->
</body>

<!-- Javascripts -->
<script src="/static/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="/static/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script src="/static/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=YOUR_APIKEY&sensor=false"> </script>
<script src="/static/assets/plugins/toastr/toastr.min.js"></script>
<script src="/static/assets/js/pages/notifications.js"></script>

<script type="text/javascript">

    var $validator = $("#formulario_cadastro").validate({
        rules: {
            nome_registro: {
                required: true
            },
            usuario_registro: {
                required: true
            },
            email_registro: {
                required: true,
                email: true
            },
            senha_registro: {
                required: true
            },
            senha_confirmacao: {
                required: true,
                equalTo: '#senha_cadastro_cadastro'
            }
        }
    });

    $("#submit-form-cadastro").click(function(){

        var $valid = $("#formulario_cadastro").valid();
        if(!$valid) {
            $validator.focusInvalid();
            return false;
        }

        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000
        };

        var nome = document.getElementById("nome_registro_cadastro").value; 
        var email = document.getElementById("email_registro_cadastro").value;
        var usuario = document.getElementById("usuario_registro_cadastro").value; 
        var senha_registro = document.getElementById("senha_cadastro_cadastro").value;
        var senha_confirmacao = document.getElementById("senha_confirmacao_cadastro").value;
        var termos_de_uso_checkbox = document.getElementById("termos_de_uso_checkbox_cadastro").checked; 

        $.ajax({
            url: "<?php echo base_url('index.php/login/verifica_cadastro'); ?>",
            type: "post",
            data: {"nome_registro" : nome, "email_registro" : email, "usuario_registro" : usuario, "senha_registro" : senha_registro, "senha_confirmacao" : senha_confirmacao, "termos_de_uso_checkbox" : termos_de_uso_checkbox},
            dataType: 'json',
            success: function(data) {
                if(data == '1'){
                    toastr.success('', "Usuário cadastrado com sucesso.");
                }
                else if(data == '101'){
                    toastr.error('Por favor, aceite os termos de uso para realizar o cadastro.', "Ops... Temos um problema.");
                }
                else if(data == '102'){
                    toastr.error('Esse nome de usuário já foi escolhido, favor escolher outro.', "Ops... Temos um problema.");
                }
                else if(data == '103'){
                    toastr.error('Esse email já está cadastrado.', "Ops... Temos um problema.");
                }
                else if(data == '104'){
                    toastr.error('A senha digitada não confere. Favor tentar novamente.', "Ops... Temos um problema.");
                }
                else{
                    toastr.error('Houve uma falha no cadastro do usuário, favor entrar em contato com a administração para mais informações.', "Ops... Temos um problema.");
                }
            },
            error: function(data) {
                toastr.error('', "Ops... Temos um problema.");
            },

        });

    });
    
</script>

