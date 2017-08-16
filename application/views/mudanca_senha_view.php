<?php
defined('BASEPATH') OR exit('Acesso negado.');
?>

<head>
    
    <!-- Title -->
    <title>InfoSystems | Mude sua Senha</title>
    
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
<body class="page-login">
    <main class="page-content">
            <div class="page-inner full-height">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="<?php echo base_url('index.php/login'); ?>" class="logo-name text-lg text-center">InfoSystems</a>
                                <p class="text-center m-t-md">Por favor, digite sua nova senha.</p> 
                                <div id="carregando"></div>
                                <form method="post" class="m-t-md" id="redefinir_senha">
                                    <input type="hidden" class="form-control" id="chave_atual" name="chave" value="<?= $chave ?>">
                                    <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?= $id_usuario ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control" title="Digite sua nova senha" placeholder="Senha" name="senha" id="nova_senha" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" title="Digite sua senha novamente" placeholder="Confirmação da Senha" name="senha_confirmacao" id="nova_senha_confirmacao" required>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-block" id="env_redefinir_senha">Enviar</button>
                                    <a href="<?php echo base_url('index.php/login'); ?>" class="btn btn-default btn-block m-t-md">Voltar</a>
                                </form>
                                <p class="text-center m-t-xs text-sm">2017 &copy; InfoSystems by Rian Martins.</p>
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
<script src="http://maps.googleapis.com/maps/api/js?key=YOUR_APIKEY&sensor=false"> </script>
<script src="/static/assets/plugins/toastr/toastr.min.js"></script>
<script src="/static/assets/js/pages/notifications.js"></script>

<script type="text/javascript">

    $("#env_redefinir_senha").click(function(){

        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000
        };

        var id_usuario = $("#id_usuario").val();
        var nova_senha = $("#nova_senha").val(); 
        var nova_senha_confirmacao = $("#nova_senha_confirmacao").val();
        var chave_atual = $("#chave_atual").val(); 

        $.ajax({
            url: "<?php echo base_url('index.php/login/salvar_mudanca_senha'); ?>" + "/" + id_usuario,
            type: "post",
            data: {"nova_senha" : nova_senha, "nova_senha_confirmacao" : nova_senha_confirmacao, "chave" : chave_atual},
            dataType: 'json',
            success: function(data) {
                if(data == '1'){
                    toastr.success('', "Sua senha foi alterada com sucesso.");
                }
                else if(data == '101'){
                    toastr.error('Sua senha já foi atualizada. Favor tentar entrar no sistema com a nova senha.', "Sua senha já foi alterada");
                }
                else if(data == '102'){
                    toastr.error('', "As senhas digitadas não conferem.");
                }
                else{
                    toastr.error('', "Houve um pequeno problema na operação.");
                }
            },
            error: function(data) {
                toastr.error('', "Falha na operação. Favor entrar em contato com a administração.");
            },

        });

    });

</script>
        
    