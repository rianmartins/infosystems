<?php
defined('BASEPATH') OR exit('Acesso negado.');
?>

<head>
    
    <!-- Title -->
    <title>InfoSystems | Login</title>
    
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    
    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    
    <link href="/static/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="/static/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>    	
    
    <!-- Theme Styles -->
    <link href="/static/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    
    <script src="/static/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>

    <?php
        $client_homepage = "http://laccartuchos.com.br";
    ?>
    
</head>
<body class="page-login">
    <main class="page-content">
        <div class="page-inner">
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 center">
                        <div class="login-box">
                            <a href="http://www.infosystems.com" style="font-size: 50px;" class="logo-name text-lg text-center">InfoSystems</a>
                            <p class="text-center m-t-md">Entrar no Sistema</p>
                            <form method="post" class="m-t-md" action="<?php echo base_url('index.php/login/logar'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Usuário" name="user_login" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha" name="user_senha" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                <a href="<?php echo base_url('index.php/login/esqueci_senha'); ?>" class="display-block text-center m-t-md text-sm">Esqueceu sua senha?</a>
                                <p class="text-center m-t-xs text-sm">Não possui conta?</p>
                                <a href="<?php echo base_url('index.php/login/cadastro_usuario'); ?>" id="botao_cadastro_usuario" class="btn btn-default btn-block m-t-md">Cadastre-se aqui</a>
                            </form>
                            <p class="text-center m-t-xs text-sm">2017 &copy; InfoSystems by Rian Martins.</p>
                        </div>
                    </div>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
        </div><!-- Page Inner -->
    </main><!-- Page Content -->

</body>

<!-- Template Javascripts -->
<script src="/static/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="/static/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/static/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">

    var tipo_retorno = "<?= $tipo_retorno ?>";
    var mensagem_retorno = "<?= $msg_retorno ?>";

    if(mensagem_retorno != null && tipo_retorno != null){
        toastr.options = {
            closeButton: true,
            progressBar: true,
            newestOnTop: true,
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

</script>
        
    