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

    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

    
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
                                        <form method="post" id="formulario_cadastro" class="m-t-md" action="<?php echo base_url('index.php/login/verifica_cadastro'); ?>">
                                            <div class="form-group">
                                                <input type="text" id="nomefield" title="Favor preencher esse campo" name="nome_registro" class="form-control required" placeholder="Nome" value="<?= $nome_pessoa ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" title="Favor preencher esse campo" name="usuario_registro" class="form-control required" placeholder="Usuário" value="<?= $usuario_registro ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" title="Favor preencher esse campo" name="email_registro" class="form-control required" placeholder="Email" value="<?= $email_registro ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" title="Favor preencher esse campo" name="senha_registro" id="senha_cadastro" class="form-control required" placeholder="Senha" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" title="Favor preencher esse campo" name="senha_confirmacao" id="senha_confirmacao" class="form-control required" placeholder="Confirme sua senha" required="">
                                            </div>
                                            <label>
                                                <input type="checkbox" name="termos_de_uso_checkbox"> Eu concordo com os termos de uso
                                            </label>
                                            <button type="submit" class="btn btn-success btn-block m-t-xs">Cadastre-se</button>
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
<script src="/static/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=YOUR_APIKEY&sensor=false"> </script>
<script src="/static/assets/plugins/toastr/toastr.min.js"></script>
<script src="/static/assets/js/pages/notifications.js"></script>

<script type="text/javascript">

        console.log("passa aqui");

        var tipo_retorno = "<?= $tipo_retorno ?>";
        var mensagem_retorno = "<?= $msg_retorno ?>";

        if(mensagem_retorno != null){
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut',
                timeOut: 5000
            };
            switch(tipo_retorno) {
                case "erro":
                    toastr.error('', mensagem_retorno);
                    break;
                case "sucesso":
                    toastr.success('', mensagem_retorno);
                    break;
            }
        }

        var $form = $('#formulario_cadastro');

        $form.validate({
            submitHandler: function(form){
                var l = Ladda.create(form.querySelector('button[type=submit]'));
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    timeOut: 5000
                };

                $(form).ajaxSubmit({
                    
                    type : "POST",
                    dataType : "json",
                    beforeSend: function(){
                        l.start();
                    },
                    success: function(data) {
                        console.log("data: " + data);
                        console.log("success");
                        if(data == '1'){
                            toastr.success('', mensagem_retorno);
                        }
                        else{
                            toastr.error('', mensagem_retorno);
                        }
                    },
                    error: function(data) {
                        toastr.error('', data);
                    },
                    complete: function(){
                        l.stop();
                    }
                });
            }
        });



    
</script>

