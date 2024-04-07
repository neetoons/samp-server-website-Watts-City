<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Reglas | Watts City</title>
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

        <link href="<?php echo base_url(); ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="page-header-fixed" id="EfectoAjax">
        <div id="page_loader" style="z-index: 999999;">
            <div class="loader"></div>
        </div>
        <!-- INICIO HEADER -->
        <div class="header navbar navbar-fixed-top">
            <!-- INICIO BARRA -->
            <div class="header-inner">
                <!-- INICIO LOGO -->
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" class="img-responsive"/></a>
                <!-- FIN LOGO -->
                <!-- INICIO MENU -->
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" src="<?php echo base_url(); ?>assets/img/avatar1_small.jpg"/><span class="username" id="nombre_user"> <?php echo $this->general_library->NombreReal($this->session->userdata('nombre')); ?></span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-arrows"></i> Pantalla completa</a></li>
                            <li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-key"></i> Cerrar sesión</a></li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
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
                            <img src="<?php echo base_url(); ?>assets/img/skins/Skin_<?php echo $this->session->userdata('skin'); ?>.png" width="100" />
                            <div class="sidebar-barra progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $this->session->userdata('respeto'); ?>" aria-valuemin="0" aria-valuemax="<?php echo $respeto_total; ?>" style="width: <?php echo (100 / $respeto_total) * $this->session->userdata('skin'); ?>%"><strong><?php echo $this->session->userdata('skin'); ?> / <?php echo $respeto_total; ?></strong></div>
                            </div>														
                        </li>
                        <br />
                        <li class="start active">
                            <a href="http://vida-virtual.es/pcu"><i class="fa fa-home"></i><span class="title">Reglas</span><span class="selected"></span></a>
                        </li>
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
                            <h3 class="page-title">Inicio <small>Reglas</small></h3>
                            <ul class="page-breadcrumb breadcrumb">
                                <li><i class="fa fa-home"></i><a href="">Inicio</a><i class="fa fa-angle-right"></i></li>
                                <li><a href="">Reglas</a></li>
                                <li class="btn-group">
                                    <button type="button" class="btn red dropdown-toggle">
                                        <i class="fa fa-calendar"></i> <span><?php echo $this->general_library->ObtenerFecha(); ?></span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- FIN HEADER -->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- INICIO MENSAJE -->
                            <div class="note note-info">
                                <h4 class="block"><strong>¡Información!</strong></h4>
                                <p>Bien, procederemos a explicarte un poco como funciona el servidor, si ya sabes lo que es RolePlay puedes pasar al siguiente paso.</p>
                            </div>
                            <?php
                            if ($this->session->flashdata('msj')) :
                                echo $this->session->flashdata('msj');
                            endif; ?>
                            <!-- FIN MENSAJE -->

                            <!-- INICIO TEST -->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="fa fa-edit"></i>Roleplay</div>
                                </div>
                                <div class="portlet-body form">
                                    <form id="form_certtest" name="form_certtest" action="<?php echo base_url(); ?>certificar/test/validar_etest" method="post">
                                        <div class="form-body"><?php
                                            $i = 0;
                                            foreach ($preguntas as $preg) :
                                                $i++;
                                                ?>
                                                <div class="form-group">
                                                    <label><strong><?php echo $i; ?>) <?php echo $preg->pregunta; ?></strong></label>
                                                    <div class="radio-list" data-error-container="#msge_<?php echo $i; ?>">
                                                        <label><input type="radio" name="pregunta_<?php echo $i; ?>" id="pregunta_<?php echo $i; ?>_A" value="A"> <strong>A) </strong><?php echo $preg->A; ?></label>
                                                        <label><input type="radio" name="pregunta_<?php echo $i; ?>" id="pregunta_<?php echo $i; ?>_B" value="B"> <strong>B) </strong><?php echo $preg->B; ?></label>
                                                        <label><input type="radio" name="pregunta_<?php echo $i; ?>" id="pregunta_<?php echo $i; ?>_C" value="C"> <strong>C) </strong><?php echo $preg->C; ?></label>
                                                        <label><input type="radio" name="pregunta_<?php echo $i; ?>" id="pregunta_<?php echo $i; ?>_D" value="D"> <strong>D) </strong><?php echo $preg->D; ?></label>
                                                        <input type="hidden" name="respuesta_<?php echo $i; ?>" id="respuesta_<?php echo $i; ?>" value="<?php echo md5('respuesta_' . $i . '_' . $preg->resultado) ?>" />
                                                    </div>
                                                    <div id="msge_<?php echo $i; ?>"></div>
                                                </div><?php 
                                            endforeach;
                                            ?>
                                        </div>
                                         <p><b>Roleplay</b> es el modo de juego en que nos basamos, este modo de juego se basa en simular la vida real lo mayos posible,</p>
                                         <p>para eso tendrás que adentrarte en tu personaje, deberás conseguir dinero, sea de manera legal o ilegal, podrás realizar todo</p>
                                         <p>mientras no incumplas una regla, la manera más fácil de saber si algo está correcto es pensar ¿Ésto es posible? ¿Cómo actuaría en la vida real?</p>
                                         <p>Para conocer todas las reglas a detalle puedes ir a la sección de 'Reglas' en el foro. allí encontrarás cada una con información detallada.</p>
                                         <p>El incumplimiento de las normas te pueden llevar a una sanción, por lo que es mejor saber las reglas y respetarlas.</p>
                                        <div class="form-actions right">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green" id="validar_test" data-loading-text="Comprobando resultados..."><i class="fa fa-check"></i> Siguiente paso</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- FIN TEST -->
                        </div>
                    </div>