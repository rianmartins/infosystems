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

    <link rel="icon" href="/static/img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/static/img/favicon.ico" type="image/x-icon"/>
        
    <!-- Title -->
    <title>CartuchosPro | <?= $titulo_da_pagina ?></title>
    
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
    <link href="/static/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/> 
    <link href="/static/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/> 
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
                    <a href="<?php echo base_url('index.php/dashboard'); ?>" class="logo-text"><span><img src="/static/img/logo.png" height="50"></span></a>
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
                                    <li role="presentation"><a href=""><i class="fa fa-user"></i>Meu Perfil</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Trancar Sessão</a></li>
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
                    
                    <li class="<?php if($pagina == 'Dashboard') echo 'active' ?>"><a href="<?php echo base_url('index.php/dashboard'); ?>"><span class="menu-icon icon-home"></span><p>Início</p></a></li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-users"></span><p>Clientes</p><span class="arrow"></span></a>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-printer"></span><p>Cartuchos</p><span class="arrow"></span></a>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-handbag"></span><p>Pedidos</p><span class="arrow"></span></a>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-tag"></span><p>Produtos</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Produtos</a></li>
                            <li><a href="#">Estoque</a></li>
                        </ul>
                    </li>
                    <!-- <li class="droplink"><a href="#"><span class="menu-icon icon-folder"></span><p>Levels</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li class="droplink has_sub"><a href="#"><p>Level 1.1</p><span class="arrow"></span></a>
                                <ul class="sub-menu">
                                    <li class="droplink has_sub_2"><a href="#"><p>Level 2.1</p><span class="arrow"></span></a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Level 3.1</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Level 2.2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Level 1.2</a></li>
                        </ul>
                    </li> -->
                    <li class="droplink"><a href="#"><span class="menu-icon icon-wallet"></span><p>Financeiro</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Ver Caixas</a></li>
                            <li><a href="#">Contas a Pagar</a></li>
                            <li><a href="#">Contas a Receber</a></li>
                            <li><a href="#">Caixa Mensal</a></li>
                            <!-- <li><a href="#">Gerar Nota Fiscal</a></li>
                            <li><a href="#">Emitir Boleto</a></li> -->
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-diamond"></span><p>Patrimônio</p><span class="arrow"></span></a>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-drawer"></span><p>Comodato de Equipamento</p><span class="arrow"></span></a>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-support"></span><p>Suporte</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="#">O.S.</a></li>
                            <!-- <li><a href="#">Crédito ao Cliente</a></li> -->
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-folder"></span><p>Relatórios</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li class="droplink has_sub"><a href="#"><p>Financeiro</p><span class="arrow"></span></a>
                                <ul class="sub-menu" id="level_2">
                                    <li><a href="#">Extrato de Débito</a></li>
                                    <li><a href="#">Movimentações Financeiras</a></li>
                                    <li><a href="#">Novos Clientes</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Vendas por Período</a></li>
                            <li><a href="#">Extrato de Patrimônio</a></li>
                            <li><a href="#">Extrato de Comodato</a></li>
                            <li><a href="#">Estoque</a></li>
                            <li><a href="#">Folha Salarial</a></li>
                        </ul>
                    </li>
                    <li class="droplink <?php if(isset($caminho) && $caminho == 'Configurações do Sistema') echo 'active open' ?>"><a href="#"><span class="menu-icon icon-settings"></span><p>Congifurações</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="#">Funcionários</a></li>
                            <li class="droplink has_sub"><a href="#"><p>Cartuchos</p><span class="arrow"></span></a>
                                <ul class="sub-menu" id="level_2">
                                    <li><a href="#">Tipos de Entrada Cartucho</a></li>
                                    <li><a href="#">Situação Cartuchos</a></li>
                                </ul>
                            </li>
                            <li class="droplink has_sub"><a href="#"><p>Produtos</p><span class="arrow"></span></a>
                                <ul class="sub-menu" id="level_2">
                                    <li><a href="#">Tipos de Produtos</a></li>
                                    <li><a href="#">Fabricantes</a></li>
                                </ul>
                            </li>
                            <li class="droplink has_sub"><a href="#"><p>O.S.</p><span class="arrow"></span></a>
                                <ul class="sub-menu" id="level_2">
                                    <li><a href="#">Tipo de O.S.</a></li>
                                    <li><a href="#">Situação de O.S.</a></li>
                                </ul>
                            </li>
                            <li class="droplink has_sub"><a href="#"><p>Cadastros Gerais</p><span class="arrow"></span></a>
                                <ul class="sub-menu" id="level_2">
                                    <li class="<?php if($pagina == 'Cadastro de Funções') echo 'active' ?>"><a href="<?php echo base_url('index.php/configuracoes_sistema/funcionario_funcao_index'); ?>">Funções de Trabalho</a></li>
                                    <li><a href="#">Situação de Laboratório</a></li>
                                    <li><a href="#">Formas de Pagamento</a></li>
                                    <li><a href="#">Tipo de Movimentação Motoboy</a></li>
                                </ul>
                            </li>
                            <li class=""><a href="">Parâmetros do Sistema</a></li>
                            <li class="<?php if($pagina == 'Unidades') echo 'active' ?>"><a href="<?php echo base_url('index.php/cadastro_unidades'); ?>">Unidades</a></li>
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
                    <p class="no-s">2017 &copy; cartuchosPro by Rian Martins.</p>
                </div>
            </div>
        </div><!-- Page Inner -->
    </main><!-- Page Content -->
</body>

<!-- Javascripts -->
<script src="/static/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="/static/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- <script src="/static/assets/plugins/pace-master/pace.min.js"></script> -->
<!-- <script src="/static/assets/plugins/jquery-blockui/jquery.blockui.js"></script> -->
<!-- <script src="/static/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<script src="/static/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/static/assets/plugins/switchery/switchery.min.js"></script> -->
<!-- <script src="/static/assets/plugins/uniform/jquery.uniform.min.js"></script> -->
<!-- <script src="/static/assets/plugins/classie/classie.js"></script> -->
<!-- <script src="/static/assets/plugins/waves/waves.min.js"></script> -->
<script src="/static/assets/plugins/3d-bold-navigation/js/main.js"></script>
<!-- <script src="/static/assets/js/modern.min.js"></script> -->
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

    $('.has_sub').click(function(){
        console.log("clicou menu");
        let childElement = $(this).children('ul');
        childElement.toggle();
    });

    $('.has_sub_2').click(function(){
        console.log("clicou menu 2");
        let childElement = $(this).children('ul');
        childElement.toggle();
    });

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
        toastr.success('', 'Seja bem vindo ao Cartuchos Pro!');
    }

</script>

