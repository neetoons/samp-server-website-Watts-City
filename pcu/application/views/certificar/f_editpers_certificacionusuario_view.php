<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Crear Personaje | Watts City</title>
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
                            <a href="http://vida-virtual.es/pcu"><i class="fa fa-home"></i><span class="title">Crear Personaje</span><span class="selected"></span></a>
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
                            <h3 class="page-title">Inicio <small>Crear Personaje</small></h3>
                            <ul class="page-breadcrumb breadcrumb">
                                <li><i class="fa fa-home"></i><a href="">Inicio</a><i class="fa fa-angle-right"></i></li>
                                <li><a href="">Crear Personaje</a></li>
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
                                <p>Rellena los campos a continuación y ya podrás comenzar a jugar.</p>
                            </div>
                            <div class="alert alert-warning">
                                <span class="fa fa-warning margin-right-10"></span><strong>¡Aviso!</strong> Piénsate bien como vas a configurar tu personaje, ya que una vez configurado algunos valores no serán editables.
                            </div>
                            <?php
                            if ($this->session->flashdata('msj')) :
                                echo $this->session->flashdata('msj');
                            endif;
                            ?>
                            <!-- FIN MENSAJE -->

                            <!-- INICIO TEST -->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="fa fa-cogs"></i>Configurar mi personaje</div>
                                </div>
                                <div class="portlet-body form">
                                    <form id="form-cuenta" name="form-cuenta" class="form-horizontal" action="<?php echo base_url(); ?>certificar/cuenta/validar_edicion_personaje" method="post">
                                        <div class="form-body">
                                            <h3 class="form-section">Información personal</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nombre</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $this->session->userdata('nombre'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Procedencia</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="¿Donde nació tu personaje?">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Apodo</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="apodo" name="apodo" placeholder="Introduce tu apodo">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Altura <span class="required">*</span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="altura" name="altura" placeholder="En centímetros - Mínimo: 120 - Máximo: 200.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Raza <span class="required">*</span></label>
                                                        <div class="col-md-9">
                                                            <select class="select2_category form-control" data-placeholder="Selecciona una opción" id="raza" name="raza">
                                                                <option value=""></option>
                                                                <option value="1">Afroamericano</option>
                                                                <option value="2">Norteamericano</option>
                                                                <option value="3">Europa</option>
                                                                <option value="4">Latino</option>
                                                                <option value="5">Oriental</option>
                                                                <option value="6">Arabe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Peso <span class="required">*</span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="peso" name="peso" placeholder="En Kilogramos - Mínimo: 40 - Máximo: 150">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sexo <span class="required">*</span></label>
                                                        <div class="col-md-9">
                                                            <div class="radio-list">
                                                                <label class="radio-inline"><input type="radio" id="sexo" name="sexo" value="0"> Masculino</label>
                                                                <label class="radio-inline"><input type="radio" id="sexo" name="sexo" value="1"> Femenino</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Color de ojos</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="cojos" id="cojos">
                                                                <option value=""></option>
                                                                <option value="0">Negros</option>
                                                                <option value="1">Marrones</option>
                                                                <option value="2">Verdes</option>
                                                                <option value="3">Azules</option>
                                                                <option value="4">Otros</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Edad <span class="required">*</span></label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="edad" name="edad" placeholder="Introduce la edad del personaje (1 - 99)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Color de pelo</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="cpelo" id="cpelo">
                                                                <option value=""></option>
                                                                <option value="0">Negro</option>
                                                                <option value="1">Marron</option>
                                                                <option value="2">Pelirojo</option>
                                                                <option value="3">Rubio</option>
                                                                <option value="4">Blanco</option>
                                                                <option value="5">Otros</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <h3 class="form-section">Información adicional</h3>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Descripción física</label>
                                                    <div class="col-md-9">
                                                        <textarea class="wysihtml5 form-control" rows="6" id="descfisica" name="descfisica"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Descripción psicológica</label>
                                                    <div class="col-md-9">
                                                        <textarea class="wysihtml5 form-control" rows="6" id="descpsico" name="descpsico"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Historia conocida</label>
                                                    <div class="col-md-9">
                                                        <textarea class="wysihtml5 form-control" rows="12" id="historia" name="historia"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">¿Cómo llegaste a Los Santos?</label>
                                                    <div class="col-md-9">
                                                        <textarea class="wysihtml5 form-control" rows="6" id="comollegaste" name="comollegaste"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="form-actions fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green" id="enviar" name="enviar">Guardar datos</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- FIN TEST -->
                        </div>
                    </div>