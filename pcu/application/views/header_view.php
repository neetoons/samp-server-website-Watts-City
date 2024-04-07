<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?> | Watts City RP</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="PCU oficial de Watts City roleplay" name="description" />
        <meta content="Cross Landwell" name="author" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2-metronic.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/data-tables/DT_bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-toastr/toastr.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>

        <link href="<?php echo base_url(); ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url(); ?>assets/css/pages/profile.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

    </head>
    <body class="page-header-fixed" id="EfectoAjax">
        <!-- <div id="page_loader" style="z-index: 999999;">
            <div class="loader"></div>
        </div> -->
        <!-- INICIO HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- INICIO BARRA -->
            <div class="header-inner">
                <!-- INICIO LOGO -->
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="img-responsive"/></a>
                <!-- FIN LOGO -->

                <!-- INICIO MENU HORIZONTAL -->
                <div class="hor-menu hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <li class="classic-menu-dropdown active">
                            <a href="<?php echo base_url(); ?>">PCU<span class="selected"></span></a>
                        </li>
                        <li class="classic-menu-dropdown">
                            <a href="/foro">Foro</a>
                        </li>
                        <li class="classic-menu-dropdown">
                            <a href="<?php echo base_url(); ?>perfil/<?php echo $this->session->userdata('nombre'); ?>">Mi perfil</a>
                        </li>
                    </ul>
                </div>
                <!-- FIN HORIZONTAL MENU -->

                <!-- INICIO BUSCADOR -->
                <form class="search-form" role="form" action="<?php echo base_url(); ?>buscar/personaje" method="post">
                    <input type="text" class="form-control input-medium input-sm" id="buscadordtrp" name="buscadordtrp" placeholder="Buscar personaje...">
                    <input type="button" class="submit" value=" "/>
                </form>
                <!-- FIN BUSCADOR -->

                <!-- INICIO MENU -->
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username" id="nombre_user"><i class="fa fa-user"></i><?php echo $this->general_library->NombreReal($this->session->userdata('nombre')); ?></span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>micuenta"><i class="fa fa-user"></i> Mi cuenta</a></li>
                            <li><a href="<?php echo base_url(); ?>mipersonaje"><i class="fa fa-user"></i> Mi personaje</a></li>
                            <li><a href="<?php echo base_url(); ?>micuenta#cambiar_email"><i class="fa fa-envelope"></i> Cambiar email</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-arrows"></i> Pantalla completa</a></li>
                            <li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-key"></i> Cerrar sesión</a></li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- FIN - MENU -->
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- FIN HEADER -->
        <div class="clearfix"></div>
        <!-- INICIO CONTAINER -->
        <div class="page-container">
            <!-- INICIO SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- INICIO SIDEBAR MENU -->
                    <ul class="page-sidebar-menu">
                        <li class="sidebar-toggler-wrapper">
                            <div class="sidebar-toggler hidden-phone"></div>
                        </li>

                        <?php $respeto_total = $this->general_library->ObtenerRespeto($this->session->userdata('nivel')); ?>
                        <li id="stats-jugador" class="sidebar-skin">
                            <img src="<?php echo base_url(); ?>assets/img/skins/<?php echo $this->session->userdata('skin'); ?>.png" width="100" >
                            <div class="sidebar-barra progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $this->session->userdata('respeto'); ?>" aria-valuemin="0" aria-valuemax="<?php echo $respeto_total; ?>" style="width: <?php echo (100 / $respeto_total) * $this->session->userdata('respeto'); ?>%"><strong><?php echo $this->session->userdata('respeto'); ?> | <?php echo $respeto_total; ?></strong></div>
                            </div>														
                        </li>
                        <br />
                        <li class="start <?php
                        if ($this->input->server('REQUEST_URI') == '/') {
                            echo 'active';
                        }
                        ?>">
                            <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i><span class="title">Inicio</span><?php
                                if ($this->input->server('REQUEST_URI') == '/') {
                                    echo '<span class="selected"></span>';
                                }
                                ?></a>
                        </li>
                        <li <?php if ($this->uri->segment(1) == 'micuenta') { ?>class="active"<?php } ?>>
                            <a href="<?php echo base_url(); ?>micuenta"><i class="fa fa-user"></i><span class="title">Mi cuenta</span><?php if ($this->uri->segment(1) == 'micuenta') { ?><span class="selected"></span><?php } ?></a>
                        </li>
                        <li <?php if ($this->uri->segment(1) == 'mipersonaje') { ?>class="active"<?php } ?>>
                            <a href="<?php echo base_url(); ?>mipersonaje"><i class="fa fa-male"></i><span class="title">Mi personaje</span><?php if ($this->uri->segment(1) == 'mipersonaje') { ?><span class="selected"></span><?php } ?></a>
                        </li>
			<li <?php if ($this->uri->segment(2) == 'ropa-usual') { ?>class="active"<?php } ?>>
                            <a href="<?php echo base_url(); ?>cambiar/ropa-usual"><i class="fa fa-eye"></i><span class="title">Ropa usual</span><?php if ($this->uri->segment(2) == 'ropa-usual') { ?><span class="selected"></span><?php } ?></a>
                        </li>
                        <li <?php if ($this->uri->segment(2) == 'ropa-trabajo') { ?>class="active"<?php } ?>>
                            <a href="<?php echo base_url(); ?>cambiar/ropa-trabajo"><i class="fa fa-eye"></i><span class="title">Ropa trabajo</span><?php if ($this->uri->segment(2) == 'ropa-trabajo') { ?><span class="selected"></span><?php } ?></a>
                        </li>
                            <li <?php if ($this->uri->segment(1) == 'tienda') { ?>class="active"<?php } ?>>
                            <a href="<?php echo base_url(); ?>tienda"><i class="fa fa-money"></i><span class="title">Tienda</span><?php if ($this->uri->segment(1) == 'tienda') { ?><span class="selected"></span><?php } ?></a>
                       
                        </li><?php if($this->session->userdata('faccion') != 0) { ?>
                        <li <?php if ($this->uri->segment(1) == 'mifaccion') { ?>class="active"<?php } ?>>
                            <a href="<?php echo base_url(); ?>mifaccion"><i class="fa fa-users"></i><span class="title">Mi facción</span><?php if ($this->uri->segment(1) == 'mifaccion') { ?><span class="selected"></span><?php } ?></a>
			</li><?php } if (($this->session->userdata('admin') == 5 && $this->session->userdata('subadmin') == 1 || $this->session->userdata('subadmin') == 2) || $this->session->userdata('admin') >= 5) { ?>
                            <li <?php
                            if ($this->uri->segment(1) == 'certificar') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="javascript:;"><i class="fa fa-bookmark"></i><span class="title">Panel</span><span class="arrow <?php
                                    if ($this->uri->segment(1) == 'certificar') {
                                        echo 'open';
                                    }
                                    ?>"></span></a>
                                <ul class="sub-menu">
                                    <li <?php
                                    if ($this->uri->segment(1) == 'certificar' && $this->uri->segment(2) == 'cuentas') {
                                        echo 'class="active"';
                                    }
                                    ?>><a href="<?php echo base_url(); ?>certificar/cuentas"><i class="fa fa-sitemap"></i>Certificar cuentas</a></li><?php if ($this->session->userdata('subadmin') == 2 || $this->session->userdata('admin') >= 4) { ?>
                                        <li <?php
                                        if ($this->uri->segment(3) == 'desarrollo') {
                                            echo 'class="active"';
                                        }
                                        ?>><a href="<?php echo base_url(); ?>certificar/gestionar/desarrollo"><i class="fa fa-book"></i>Gestionar preguntas</a></li>
                                        <li <?php
                                        if ($this->uri->segment(3) == 'test') {
                                            echo 'class="active"';
                                        }
                                        ?>><a href="<?php echo base_url(); ?>certificar/gestionar/test"><i class="fa fa-check-circle-o"></i>Gestionar test</a></li><?php }
                                    ?>
                                </ul>
                            </li><?php }
                                ?><?php
                        if ($this->session->userdata('admin') >= 2) {
                            ?>
                            <li <?php if ($this->uri->segment(1) == 'administrar') { ?>class="active"<?php } ?>>
                                <a href="javascript:;"><i class="fa fa-gears"></i><span class="title">Administrar</span><span class="arrow <?php if ($this->uri->segment(1) == 'administrar') { ?>open<?php } ?>"></span></a>
                                <ul class="sub-menu">
                                    <li <?php if ($this->uri->segment(1) == 'administrar' && $this->uri->segment(2) == 'cuentas') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>administrar/cuentas"><i class="fa fa-users"></i>Gestionar cuentas</a></li><?php 
                                    if ($this->session->userdata('admin') >= 5) { ?>
                                        <li <?php if ($this->uri->segment(2) == 'facciones') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>administrar/facciones"><i class="fa fa-bookmark"></i>Gestionar facciones</a></li>
                                        <li <?php if ($this->uri->segment(2) == 'skins') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>administrar/skins"><i class="fa fa-male"></i>Gestionar skins</a></li>
                                        <li <?php if ($this->uri->segment(2) == 'skinsfaccion') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>administrar/skinsfaccion"><i class="fa fa-male"></i>Gestionar skins facc</a></li> <?php
                                    }
                                    if ($this->session->userdata('admin') >= 4) { ?>
                                        <li <?php if ($this->uri->segment(2) == 'cuentasbloqueadas') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>administrar/cuentasbloqueadas"><i class="fa fa-ban"></i>Cuentas bloqueadas</a></li><?php 
                                    } ?>
                                </ul>
                            </li><?php
                        }
                        if ($this->session->userdata('admin') >= 2) {
                            ?>
                            <li <?php if ($this->uri->segment(1) == 'historial') { ?>class="active"<?php } ?>>
                                <a href="javascript:;"><i class="fa fa-archive"></i><span class="title">Historiales</span><span class="arrow <?php if ($this->uri->segment(1) == 'historial') { ?>open<?php } ?>"></span></a>
                                <ul class="sub-menu">
                                    <li <?php if ($this->uri->segment(2) == 'cambiosdenombre') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>historial/cambiosdenombre"><i class="fa fa-archive"></i>Cambios de nombre</a></li>
                                    <li <?php if ($this->uri->segment(2) == 'expulsados') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>historial/expulsados"><i class="fa fa-archive"></i>Expulsados</a></li>
                                    <li <?php if ($this->uri->segment(2) == 'accesos') { ?>class="active"<?php } ?>><a href="<?php echo base_url(); ?>historial/accesos"><i class="fa fa-archive"></i>Accesos</a></li>
                                </ul>
                            </li><?php }
                        ?>
                    </ul>
                    <!-- FIN SIDEBAR MENU -->
                </div>
            </div>
            <!-- FIN SIDEBAR -->
            <!-- INICIO CONTENIDO -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- INICIO HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="page-title"><?php echo $titulo_header; ?> <small><?php echo $descipcion_header; ?></small></h3>
                            <ul class="page-breadcrumb breadcrumb">
                                <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>">Inicio</a><?php echo $direcciones_header; ?></li>
                                <li class="btn-group">
                                    <button type="button" class="btn red dropdown-toggle">
                                        <i class="fa fa-calendar"></i> <span><?php echo $this->general_library->ObtenerFecha(); ?></span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- FIN HEADER -->