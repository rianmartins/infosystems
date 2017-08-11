<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['logado'])) {
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
                                    <span class="user-name"><?= $nome_usuario ?><i class="fa fa-angle-down"></i></span>
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
                    <li class="droplink"><a href="#"><span class="menu-icon icon-note"></span><p>Cadastros</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="">Cliente</a></li>
                            <li><a href="">Produtos</a></li>
                            <li><a href="">Funcionários</a></li>
                            <li><a href="">Unidades</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-wallet"></span><p>Financeiro</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="">Venda</a></li>
                            <li><a href="">Caixa</a></li>
                            <li><a href="">...</a></li>
                        </ul>
                    </li>
                    <!-- <li class="droplink"><a href="#"><span class="menu-icon icon-briefcase"></span><p>UI Kits</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="ui-alerts.html">Alerts</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-icons.html">Icons</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-notifications.html">Notifications</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>
                            <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-panels.html">Panels</a></li>
                            <li><a href="ui-progress.html">Progress Bars</a></li>
                            <li><a href="ui-sliders.html">Sliders</a></li>
                            <li><a href="ui-nestable.html">Nestable</a></li>
                            <li><a href="ui-tree-view.html">Tree View</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-layers"></span><p>Layers</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="layout-blank.html">Blank Page</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Menu</a></li>
                            <li><a href="layout-static-header.html">Static Header</a></li>
                            <li><a href="layout-collapsed-sidebar.html">Collapsed Sidebar</a></li>
                            <li><a href="layout-large-menu.html">Large Menu</a></li>
                        </ul>
                    </li> -->
                    <li class="droplink"><a href="#"><span class="menu-icon icon-eye"></span><p>Consultas</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="">Estoque</a></li>
                            <li><a href="">Produtos</a></li>
                            <li><a href="table-static.html">Static Tables</a></li>
                            <li><a href="table-responsive.html">Responsive Tables</a></li>
                            <li><a href="table-data.html">Data Tables</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-folder"></span><p>Relatórios</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="form-elements.html">Form Elements</a></li>
                            <li><a href="form-wizard.html">Form Wizard</a></li>
                            <li><a href="form-upload.html">File Upload</a></li>
                            <li><a href="form-image-crop.html">Image Crop</a></li>
                            <li><a href="form-image-zoom.html">Image Zoom</a></li>
                            <li><a href="form-select2.html">Select2</a></li>
                            <li><a href="form-x-editable.html">X-editable</a></li>
                        </ul>
                    </li>
                    <!-- <li class="droplink"><a href="#"><span class="menu-icon icon-bar-chart"></span><p>Charts</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="charts-sparkline.html">Sparkline</a></li>
                            <li><a href="charts-rickshaw.html">Rickshaw</a></li>
                            <li><a href="charts-morris.html">Morris</a></li>
                            <li><a href="charts-flotchart.html">Flotchart</a></li>
                            <li><a href="charts-chartjs.html">Chart.js</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-user"></span><p>Login</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="login.html">Login Form</a></li>
                            <li><a href="login-alt.html">Login Alt</a></li>
                            <li><a href="register.html">Register Form</a></li>
                            <li><a href="register-alt.html">Register Alt</a></li>
                            <li><a href="forgot.html">Forgot Password</a></li>
                            <li><a href="lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-pointer"></span><p>Maps</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="maps-google.html">Google Maps</a></li>
                            <li><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li>
                    <li class="droplink"><a href="#"><span class="menu-icon icon-present"></span><p>Extra</p><span class="arrow"></span></a>
                        <ul class="sub-menu">
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="500.html">500 Page</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="calendar.html">Calendar</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="todo.html">Todo</a></li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="search.html">Search Results</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </li> -->
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
                </ul>
            </div><!-- Page Sidebar Inner -->
        </div><!-- Page Sidebar -->
        <div class="page-inner">
            <div class="page-breadcrumb">
                <ol class="breadcrumb container">
                    <li><a href="<?php echo base_url('index.php/dashboard'); ?>">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
            <div class="page-title">
                <div class="container">
                    <h3>Dashboard</h3>
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
<!-- <script src="/static/assets/plugins/pace-master/pace.min.js"></script> -->
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

    var bem_vindo_ao_dashboard = "<?= $bem_vindo ?>"; 

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

    var tem_unidade = "<?= $unidades ?>";

    setTimeout(function(){ 
        if(tem_unidade == "nao")
            alert("Você ainda nao possui unidades cadastradas. Deseja cadastrar agora?");
    }, 1000);

</script>

