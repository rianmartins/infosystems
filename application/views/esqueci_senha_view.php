<?php
defined('BASEPATH') OR exit('Acesso negado.');
?>

<head>
    
    <!-- Title -->
    <title>InfoSystems | Esqueci a Senha</title>
    
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
<body class="page-login">
    <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="<?php echo base_url('index.php/login'); ?>" class="logo-name text-lg text-center">InfoSystems</a>
                                <p class="text-center m-t-md">Por favor, digite seu email para que possamos recuperar sua senha</p>
                                <form method="post" class="m-t-md" id="formulario_esqueci_senha">
                                    <div class="form-group">
                                        <input type="email" class="form-control" title="Favor preencha esse campo" placeholder="Email" name="email_registro" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
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
<script src="/static/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=YOUR_APIKEY&sensor=false"> </script>
<script src="/static/assets/plugins/toastr/toastr.min.js"></script>
<script src="/static/assets/js/pages/notifications.js"></script>

<script type="text/javascript">

    var $form = $('#formulario_esqueci_senha');

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
                        toastr.success('', data);
                    }
                    else{
                        toastr.error('', data);
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
        
    