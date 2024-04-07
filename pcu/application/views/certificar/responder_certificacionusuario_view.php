<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Certificar cuenta | Watts City RP</title>
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
                            <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i><span class="title">Certificar cuenta</span><span class="selected"></span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>certificar/cuenta/editar/personaje"><i class="fa fa-user"></i><span class="title">Editar personaje</span></a>
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
                            <h3 class="page-title">Inicio <small>Certificar cuenta</small></h3>
                            <ul class="page-breadcrumb breadcrumb">
                                <li><i class="fa fa-home"></i><a href="">Inicio</a><i class="fa fa-angle-right"></i></li>
                                <li><a href="">Certificar cuenta</a></li>
                                <li class="btn-group">
                                    <button type="button" class="btn red dropdown-toggle">
                                        <i class="fa fa-calendar"></i> <span><?php echo $this->general_library->ObtenerFecha(); ?></span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    if ($this->session->flashdata('msj')) :
                        echo $this->session->flashdata('msj');
                    endif;
                    ?>
                    <!-- FIN HEADER -->
                    <div class="row">
                        <div class="col-md-12"><?php
                        foreach ($certificacion as $cert) : ?>
                        <!-- INICIO - MENSAJE -->
                            <div class="note note-warning">
                                <h4 class="block"><strong>Comentario del certificador:</strong></h4>
                                <p><?php echo $cert->comentario; ?></p>
                            </div>
                            <!-- INICIO - CERTIFICAR -->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="fa fa-edit"></i> Certificar cuenta</div>
                                </div>
                                <div class="portlet-body form">
                                    <form action="<?php echo base_url(); ?>certificar/cuenta/validar_responder_certificacion" id="form-respcert" name="form-respcert" method="post">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label><?php echo $cert->pregunta_1; ?></label>
                                                <textarea class="wysihtml5 form-control" rows="6" id="eresp_1" name="eresp_1" data-error-container="#eresp_1_error" onpaste="return false" ondragstart="return false" onselectstart="return false"><?php echo $cert->respuesta_1; ?></textarea>
                                                <div id="eresp_1_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label><?php echo $cert->pregunta_2; ?></label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="eresp_2" data-error-container="#eresp_2_error" onpaste="return false" ondragstart="return false" onselectstart="return false"><?php echo $cert->respuesta_2; ?></textarea>
                                                <div id="eresp_2_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label><?php echo $cert->pregunta_3; ?></label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="eresp_3" data-error-container="#eresp_3_error" onpaste="return false" ondragstart="return false" onselectstart="return false"><?php echo $cert->respuesta_3; ?></textarea>
                                                <div id="eresp_3_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label><?php echo $cert->pregunta_4; ?></label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="eresp_4" data-error-container="#eresp_4_error" onpaste="return false" ondragstart="return false" onselectstart="return false"><?php echo $cert->respuesta_4; ?></textarea>
                                                <div id="eresp_4_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label><?php echo $cert->pregunta_5; ?></label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="eresp_5" data-error-container="#eresp_5_error" onpaste="return false" ondragstart="return false" onselectstart="return false"><?php echo $cert->respuesta_5; ?></textarea>
                                                <div id="eresp_5_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label><?php echo $cert->pregunta_6; ?></label>
                                                <textarea class="wysihtml5 form-control" rows="6" name="eresp_6" data-error-container="#eresp_6_error" onpaste="return false" ondragstart="return false" onselectstart="return false"><?php echo $cert->respuesta_6; ?></textarea>
                                                <div id="eresp_6_error"></div>
                                            </div>
                                        </div>
                                        <div class="form-actions fluid">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green" id="validar_respcert" name="validar_respcert" data-loading-text="Enviando certificacion...">Enviar certificación</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- FIN - CERTIFICAR -->
                        </div>
                        <?php
                        endforeach; ?>
                    </div>