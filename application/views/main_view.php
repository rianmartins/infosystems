<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['cod_usuario']) || !isset($_SESSION['logado'])) {
    // Destrói a sessão por segurança
    session_unset();
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: " . base_url('index.php/login/logout')); exit;
}
else if(isset($_SESSION['ultima_modificacao']) && (time() - $_SESSION['ultima_modificacao'] > 1800)){
    // Destrói a sessão por segurança
    session_unset();
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: text/html');
    header("Location: " . base_url('index.php/login/logout')); exit;
}
?>

<head>
        
    <!-- Title -->
    <title>InfoSystems | <?= $titulo_da_pagina ?></title>
    
    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href="/static/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="/static/assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="/static/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
    <link href="/static/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
    <link href="/static/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>	
    <link href="/static/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
    <link href="/static/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
    <link href="/static/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>	
    	
    <!-- Theme Styles -->
    <link href="/static/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    
    <script src="/static/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    
    
</head>
<body class="page-header-fixed compact-menu page-horizontal-bar">
    <div class="overlay"></div>
   
    <form class="search-form" action="#" method="GET">
        <div class="input-group">
            <input type="text" name="search" class="form-control search-input" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
            </span>
        </div><!-- Input Group -->
    </form><!-- Search Form -->
    <main class="page-content content-wrap">
        <div class="navbar">
            <div class="navbar-inner container">
                <div class="sidebar-pusher">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="logo-box">
                    <a href="<?php echo base_url('index.php/dashboard'); ?>" class="logo-text"><span>InfoSystems</span></a>
                </div><!-- Logo Box -->
                <div class="search-button">
                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                </div>
                <div class="topmenu-outer">
                    <div class="top-menu">
                        <ul class="nav navbar-nav navbar-left">
                           
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>	
                                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                    <span class="user-name"><?= $_SESSION['user_name'] ?><i class="fa fa-angle-down"></i></span>
                                    <img class="img-circle avatar" src="/static/img/user-icon.png" width="40" height="40" alt="">
                                </a>
                                <ul class="dropdown-menu dropdown-list" role="menu">
                                    <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                                    <li role="presentation"><a href="calendar.html"><i class="fa fa-calendar"></i>Calendar</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock screen</a></li>
                                    <li role="presentation"><a href="<?php echo base_url('index.php/login/logout'); ?>"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                </ul>
                            </li>
                        </ul><!-- Nav -->
                    </div><!-- Top Menu -->
                </div>
            </div>
        </div><!-- Navbar -->
        <div class="horizontal-bar">
            <div class="page-sidebar-inner">
                <ul class="menu accordion-menu">
                    
                    <li class="active"><a href="<?php echo base_url('index.php/dashboard'); ?>"><span class="menu-icon icon-home"></span><p>Início</p></a></li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-eye"></span><p>Consultas</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-folder"></span><p>Relatórios</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-list"></span><p>Levels</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li class="droplink"><a href="#"><p>Level 1.1</p><span class="arrow"></span></a>
                                <ul class="sub-menu">
                                    <li class="droplink"><a href="#"><p>Level 2.1</p><span class="arrow"></span></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Level 3.1</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Level 2.2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Level 1.2</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-wallet"></span><p>Financeiro</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-settings"></span><p>Congifurações</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo base_url('index.php/configuracoes_sistema/funcionario_funcao_index'); ?>">Cadastro de Função</a></li>
                            <li><a href="#">Cadastro de Funcionários</a></li>
                            <li><a href="<?php echo base_url('index.php/cadastro_unidades'); ?>">Cadastro de Unidades</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->
        <div class="page-inner">
            <div class="page-breadcrumb">
                <ol class="breadcrumb container">
                    <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Home</a></li>
                    <?php
                        if(isset($pagina)){
                            if($pagina != "Dashboard"){ ?>
                                <li><a href="#"><?= $caminho ?></a></li>
                            <?php }
                        }
                    ?>
                    <li class="active"><?php if(isset($pagina)) echo $pagina ?></li>
                </ol>
            </div>
            <div class="page-title">
                <div class="container">
                    <h3><?= $titulo_da_pagina ?></h3>
                </div>
            </div>
            <div id="main-wrapper" class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-body">
                                <?= $conteudo ?>
                            </div>
                        </div>
                    </div>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
            
            <div class="page-footer">
                <div class="container">
                    <p class="no-s">2017 &copy; InfoSystems by Rian Martins.</p>
                </div>
            </div>
        </div><!-- Page Inner -->
    </main><!-- Page Content -->
</body>

<!-- Javascripts -->
<script src="/static/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="/static/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/static/assets/plugins/pace-master/pace.min.js"></script>
<!-- <script src="/static/assets/plugins/jquery-blockui/jquery.blockui.js"></script> -->
<script src="/static/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/static/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- <script src="/static/assets/plugins/switchery/switchery.min.js"></script> -->
<!-- <script src="/static/assets/plugins/uniform/jquery.uniform.min.js"></script> -->
<script src="/static/assets/plugins/classie/classie.js"></script>
<script src="/static/assets/plugins/waves/waves.min.js"></script>
<script src="/static/assets/plugins/3d-bold-navigation/js/main.js"></script>
<!-- <script src="/static/assets/plugins/waypoints/jquery.waypoints.min.js"></script> -->
<!-- <script src="/static/assets/plugins/jquery-counterup/jquery.counterup.min.js"></script> -->
<script src="/static/assets/plugins/toastr/toastr.min.js"></script>
<!-- <script src="/static/assets/plugins/flot/jquery.flot.min.js"></script> -->
<!-- <script src="/static/assets/plugins/flot/jquery.flot.time.min.js"></script> -->
<!-- <script src="/static/assets/plugins/flot/jquery.flot.symbol.min.js"></script> -->
<!-- <script src="/static/assets/plugins/flot/jquery.flot.resize.min.js"></script> -->
<!-- <script src="/static/assets/plugins/flot/jquery.flot.tooltip.min.js"></script> -->
<!-- <script src="/static/assets/plugins/curvedlines/curvedLines.js"></script> -->
<!-- <script src="/static/assets/plugins/metrojs/MetroJs.min.js"></script> -->
<!-- <script src="/static/assets/js/modern.js"></script> -->
<!-- <script src="/static/assets/js/pages/dashboard.js"></script> -->


<script type="text/javascript">

    var pagina = "<?php if(isset($pagina)) echo $pagina ?>";
    if (pagina == "Dashboard"){
        var bem_vindo_ao_dashboard = "<?php if(isset($bem_vindo)) echo $bem_vindo; else echo 'false' ?>";
    }
    else{
        var bem_vindo_ao_dashboard = "false";
    }

    if(bem_vindo_ao_dashboard == "true"){
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'fadeIn',
            hideMethod: 'fadeOut',
            timeOut: 5000
        };
        toastr.success('', 'Seja bem vindo ao InfoSystem!');
    }

    var tem_unidade = "<?= $_SESSION['cod_unidade'] ?>";
    var cod_funcao = "<?= $_SESSION['cod_funcao'] ?>";

    setTimeout(function(){ 
        if(tem_unidade == "nao" && (cod_funcao == 1 || cod_funcao == 2))
            alert("Você ainda nao possui unidades cadastradas. Deseja cadastrar agora?");
    }, 2000);

</script>

