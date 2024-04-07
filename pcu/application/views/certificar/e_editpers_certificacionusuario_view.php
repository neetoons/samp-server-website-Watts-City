<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Cuenta | Watts City RP</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="PCU oficial de downtown roleplay" name="description" />
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
                        <li class="start">
                            <a href="<?php echo base_url(); ?>certificar/cuenta"><i class="fa fa-home"></i><span class="title">Certificar cuenta</span></a>
                        </li>
                        <li class="active">
                            <a href=""><i class="fa fa-user"></i><span class="title">Editar personaje</span><span class="selected"></span></a>
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
                    <!-- FIN HEADER -->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- INICIO MENSAJE -->
                            <div class="note note-info">
                                <h4 class="block"><strong>¡Información!</strong></h4>
                                <p>No hace falta que edites todos los campos, solo modifica los deseados y guarda los cambios.</p>
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
                                    <div class="caption"><i class="fa fa-cogs"></i>Editar mi personaje</div>
                                </div><?php
                                foreach ($usuarios as $user) : 
                                    $datos_r = explode(',', $user->Datos); 
                                    foreach ($pcu_usuarios as $jug) : ?>
                                    <div class="portlet-body form">
                                        <form id="form-editpers" name="form-editpers" class="form-horizontal" action="<?php echo base_url(); ?>certificar/cuenta/editar/personaje/validar_editpers" method="post">
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
                                                                <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="¿Donde nació tu personaje?" value="<?php echo $jug->procedencia; ?>">
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
                                                                <input type="text" class="form-control" id="apodo" name="apodo" placeholder="Introduce tu apodo" value="<?php echo $user->Apodo; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Altura <span class="required">*</span></label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" id="altura" name="altura" placeholder="Altura de tu personaje en centímetros." value="<?php echo $jug->altura; ?>">
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
                                                                <select class="select2_category form-control" data-placeholder="Selecciona una opción" id="raza" name="raza" readonly>
                                                                    <option value="1" <?php if($jug->raza == 1) { echo 'selected'; } ?>>Afroamericano</option>
                                                                    <option value="2" <?php if($jug->raza == 2) { echo 'selected'; } ?>>Norteamericano</option>
                                                                    <option value="3" <?php if($jug->raza == 3) { echo 'selected'; } ?>>Europa</option>
                                                                    <option value="4" <?php if($jug->raza == 4) { echo 'selected'; } ?>>Latino</option>
                                                                    <option value="5" <?php if($jug->raza == 5) { echo 'selected'; } ?>>Oriental</option>
                                                                    <option value="6" <?php if($jug->raza == 6) { echo 'selected'; } ?>>Arabe</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Peso <span class="required">*</span></label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso de tu personaje en kilogramos" value="<?php echo $jug->peso; ?>">
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
                                                                    <label class="radio-inline"><input type="radio" id="sexo" name="sexo" value="0" <?php if($datos_r[1] == 0) { echo 'checked'; } ?> disabled> Masculino</label>
                                                                    <label class="radio-inline"><input type="radio" id="sexo" name="sexo" value="1" <?php if($datos_r[1] == 1) { echo 'checked'; } ?> disabled> Femenino</label>
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
                                                                    <option value="0" <?php if($jug->colorojos == 0) { echo 'selected'; } ?>>Negros</option>
                                                                    <option value="1" <?php if($jug->colorojos == 1) { echo 'selected'; } ?>>Marrones</option>
                                                                    <option value="2" <?php if($jug->colorojos == 2) { echo 'selected'; } ?>>Verdes</option>
                                                                    <option value="3" <?php if($jug->colorojos == 3) { echo 'selected'; } ?>>Azules</option>
                                                                    <option value="4" <?php if($jug->colorojos == 4) { echo 'selected'; } ?>>Otros</option>
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
                                                                <input type="text" class="form-control" id="edad" name="edad" placeholder="Introduce la edad del personaje (1 - 99)" value="<?php echo $datos_r[0]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Color de pelo</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="cpelo" id="cpelo">
                                                                    <option value="0" <?php if($jug->colorpelo == 0) { echo 'selected'; } ?>>Negro</option>
                                                                    <option value="1" <?php if($jug->colorpelo == 1) { echo 'selected'; } ?>>Marron</option>
                                                                    <option value="2" <?php if($jug->colorpelo == 2) { echo 'selected'; } ?>>Pelirojo</option>
                                                                    <option value="3" <?php if($jug->colorpelo == 3) { echo 'selected'; } ?>>Rubio</option>
                                                                    <option value="4" <?php if($jug->colorpelo == 4) { echo 'selected'; } ?>>Blanco</option>
                                                                    <option value="5" <?php if($jug->colorpelo == 5) { echo 'selected'; } ?>>Otros</option>
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
                                                            <textarea class="wysihtml5 form-control" rows="6" id="descfisica" name="descfisica"><?php echo $jug->descfisica; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Descripción psicológica</label>
                                                        <div class="col-md-9">
                                                            <textarea class="wysihtml5 form-control" rows="6" id="descpsico" name="descpsico"><?php echo $jug->descpsico; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">Historia conocida</label>
                                                        <div class="col-md-9">
                                                            <textarea class="wysihtml5 form-control" rows="12" id="historia" name="historia"><?php echo $jug->historia; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2">¿Cómo llegaste a Los Santos?</label>
                                                        <div class="col-md-9">
                                                            <textarea class="wysihtml5 form-control" rows="6" id="comollegaste" name="comollegaste"><?php echo $jug->comollegaste; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->
                                            </div>
                                            <div class="form-actions fluid">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn green" id="validar_editpers" name="validar_editpers" data-loading-text="Guardando datos...">Guardar datos</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div><?php
                                    endforeach;
                                endforeach; ?>
                            </div>
                            <!-- FIN TEST -->
                        </div>
                    </div>