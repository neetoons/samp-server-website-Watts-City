<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Comenzar | Watts City</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="PCU oficial de Watts City" name="description" />
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
                            <a href="http://vida-virtual.es/pcu"><i class="fa fa-home"></i><span class="title">Comenzar a jugar</span><span class="selected"></span></a>
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
                            <h3 class="page-title">Inicio <small>Comenzar a jugar</small></h3>
                            <ul class="page-breadcrumb breadcrumb">
                                <li><i class="fa fa-home"></i><a href="">Inicio</a><i class="fa fa-angle-right"></i></li>
                                <li><a href="">Comenzar a jugar</a></li>
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
				<p>Listo, al darle "Crear mi cuenta" podrás comenzar a jugar.</p>
                            </div>
                            <?php
                            if ($this->session->flashdata('msj')) :
                                echo $this->session->flashdata('msj');
                            endif; ?>
                            <!-- FIN MENSAJE -->

                            <!-- INICIO TEST -->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="fa fa-edit"></i>Comenzar</div>
                                </div>
                                <div class="portlet-body form">
                                    <form id="form-certcuenta" name="form-certcuenta" action="<?php echo base_url(); ?>certificar/cuenta/validar_certificacion" method="post">
                                        <div class="form-body"><?php
                                            $i = 0;
                                            foreach ($preguntas as $preg) :
                                                $i++; ?>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label id="pregunta_<?php echo $i; ?>" class="control-label"><?php echo $preg->pregunta; ?> <span class="required">*</span></label>
                                                        <input type="hidden" name="pregunta_<?php echo $i; ?>" id="pregunta_<?php echo $i; ?>" value="<?php echo $preg->pregunta; ?>" />
                                                        <textarea class="wysihtml5 form-control" rows="6" id="respuesta_<?php echo $i; ?>" name="respuesta_<?php echo $i; ?>" data-error-container="#resp_<?php echo $i; ?>_error" onpaste="return false" ondragstart="return false" onselectstart="return false"></textarea>
                                                        <div id="resp_<?php echo $i; ?>_error"></div>
                                                    </div>
                                                </div><?php 
                                            endforeach;
                                            ?>
                                            &nbsp;
                                        </div>
                                        <p><b>     Gracias por preferirnos</b>, esperemos que tengas una grata estadía en Watts City, puedes encontrar en la parte superior un botón que te llevará al foro, allí encontraras numerosas guías e información. Si dentro del juego no sabes como funciona algo usa el comando <b>/duda</b> seguido de tu duda, por ejemplo '<b>/duda ¿Cómo puedo conseguir un coche?</b>'. También puedes solicitar un miembro del Staff con el comando <b>/solicitar</b>. Si quieres obtener información detallada sobre los sistemas de nuestro servidor usa <b>/información</b>.</p>
                                        <div class="form-actions fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green" id="validar_certificacion" name="validar_certificacion">Crear mi cuenta</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- FIN TEST -->
                        </div>
                    </div>

