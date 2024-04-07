<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Entrar | Watts City RP</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="PCU oficial de Watts City roleplay" name="description" />
        <meta content="Cross Landwell" name="author" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2-metronic.css"/>

        <link href="<?php echo base_url(); ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="<?php echo base_url(); ?>assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="login" id="EfectoAjax">
        <div id="page_loader" style="z-index: 999999;">
            <div class="loader"></div>
        </div>
        <!-- INICIO LOGO -->
        <div class="logo">
            <img src="<?php echo base_url(); ?>assets/img/DTRP.png" alt="" /> 
        </div>
        <!-- FIN LOGO -->
        <div class="content">
            <!-- INICIO LOGIN -->
            <form id="form-login" name="form-login" class="login-form" action="<?php echo base_url(); ?>login/validar" method="post">
                <h3 class="form-title">Inicio de sesión</h3><?php
		if ($this->session->flashdata('error_login')) :
		    echo $this->session->flashdata('error_login');
		endif;
		?>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Usuario</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre_Apellido" name="nombre_login" id="nombre_login" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="clave_login" id="clave_login" />
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" id="login" class="btn green pull-right" data-loading-text="Comprobando...">Entrar <i class="m-icon-swapright m-icon-white"></i></button>
                    <button type="button" id="registrar-cuenta" class="btn blue pull-left">Registrar cuenta <i class="fa fa-plus"></i></button>
                </div>
                <div class="forget-password">
                    <h4>¿Has olvidado tu contraseña?</h4>
                    <p>
                        No te preocupes, puedes recuperarla <a href="<?php echo base_url(); ?>javascript:;" id="recuperar-pass">aquí</a>.
                    </p>
                </div>
            </form>
            <!-- FIN LOGIN -->

            <!-- INICIO REGISTRO -->
            <form id="form-registrar" class="register-form" action="<?php echo base_url(); ?>registro" method="post">
                <h3 class="form-title">Crear nueva cuenta</h3>
                <div class="forget-password">
                    <h4>Nota:</h4>
                    <p>
                        El mail debe ser confirmado, por lo tanto, debe ser verdadero.
                    </p>
                </div>
		<?php
		if ($this->session->flashdata('error_registro')) :
		    echo $this->session->flashdata('error_registro');
		endif;
		?>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Nombre</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Nombre_Apellido" id="nombre_reg" name="nombre_reg" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Correo electrónico</label>
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="ejemplo@ejemplo.com" id="correo_reg" name="correo_reg" autocomplete="off" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" id="clave_reg" name="clave_reg" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Repite contraseña</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Repite contraseña" id="reclave_reg" name="reclave_reg" />
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="registrar-atras" class="btn"><i class="m-icon-swapleft"></i> Atras </button>
                    <button type="submit" id="registrar-enviar" class="btn green pull-right" data-loading-text="Creando cuenta...">Crear cuenta <i class="m-icon-swapright m-icon-white"></i></button>
                    <p></p>
                </div>
            </form>
            <!-- FIN REGISTRO -->

            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="recuperar/clave" method="post" name="form-reclave" id="form-reclave">
                <h3 class="form-title">Recuperar contraseña</h3>
                <p>Introduce el nombre y el correo electrónico de tu cuenta.</p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre_Apellido" id="nombre_reclave" name="nombre_reclave" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="ejemplo@ejemplo.com" id="correo_reclave" name="correo_reclave" />
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="recuperar-atras" class="btn"><i class="m-icon-swapleft"></i> Atras </button>
                    <button type="submit" class="btn green pull-right">Enviar <i class="m-icon-swapright m-icon-white"></i></button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
        </div>

        <!-- INICIO COPYRIGHT -->
        <div class="copyright">
            2013 - 2015 &copy; Watts City.
        </div>
        <!-- FIN COPYRIGHT -->

        <!-- INICIO JAVASCRIPTS(Se introducen al final para agilizar la carga de la pagina) -->
        <!-- INICIO CORE PLUGINS -->
        <!--[if lt IE 9]>
                <script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $.backstretch(["<?php echo base_url(); ?>assets/img/fondos/fondo_1.jpg",
                    "<?php echo base_url(); ?>assets/img/fondos/fondo_2.jpg",
                    "<?php echo base_url(); ?>assets/img/fondos/fondo_3.jpg",
                    "<?php echo base_url(); ?>assets/img/fondos/fondo_4.jpg"
                ], {duration: 5000, fade: 750});
        </script>

        <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>assets/scripts/core/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/scripts/custom/general.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/scripts/custom/login.js" type="text/javascript"></script>
	<?php
	if ($this->session->flashdata('error_registrojs')) :
	    echo $this->session->flashdata('error_registrojs');
	endif;
	?>
        <script>
	    jQuery(document).ready(function() {
		App.init();
		Login.init();
		
<?php if ($this->session->flashdata('e_login') == '1') { ?>
    		var cerrar;
    		cerrar = bootbox.alert("<p><strong>Error al iniciar sesión</strong></p><p>Para poder iniciar sesión antes tendrás que confirmar tu cuenta con el correo que te llego al email asociado a esta cuenta.</p><p>Si no encuentras a simple vista el email mira en la parte de <i>SPAM</i></p>", function() {
    		    cerrar.modal("hide");
    		});
    <?php
}
if ($this->session->flashdata('e_reclave') == '1') {
    ?>
    		var cerrar;
    		cerrar = bootbox.alert("<p><strong>¡Todo correcto!</strong></p><p>Se ha enviado un email a la dirección de correo electrónico introducida.</p>", function() {
    		    cerrar.modal('hide');
    		});
    <?php
}
if ($this->session->flashdata('e_reclave') == '2') {
    ?>
    		var cerrar;
    		cerrar = bootbox.alert("<p><strong>¡Error al recuperar la contraseña!</strong></p><p>Hubo un problema al intentar recuperar la contraseña, el nombre introducido no coincide con la dirección de correo electrónico.</p>", function() {
    		    cerrar.modal('hide');
    		});
    <?php
}
if ($this->session->flashdata('e_confreclave') == '1') {
    ?>
    		var cerrar;
    		cerrar = bootbox.alert("<p><strong>¡Todo correcto!</strong></p><p>Se te ha enviado al email la nueva contraseña.</p>", function() {
    		    cerrar.modal('hide');
    		});
    <?php
}
if ($this->session->flashdata('e_confreclave') == '2') {
    ?>
    		var cerrar;
    		cerrar = bootbox.alert("Se ha producido un error al intentar confirmar la recuperación de contraseña. El c&oacute;digo de confirmación no existe.", function() {
    		    cerrar.modal('hide');
    		});
<?php }
if ($this->session->flashdata('e_registro') == '1') {
    ?>
    		var cerrar;
    		cerrar = bootbox.alert("<p><strong>Cuenta registrada correctamente</strong></p><p>Se ha enviado un email a la dirección de correo electrónico introducida para confirmar la cuenta. Si no encuentras el correo revisa el apartado de <i>SPAM</i>.</p>", function() {
    		    cerrar.modal('hide');
    		});
<?php }
if ($this->session->flashdata('e_confreg') == '1') {
    ?>
    		var cerrar;
    		cerrar = bootbox.alert("<p><strong>Felicidades</strong></p><p>Se ha confirmado la dirección de correo electrónico.</p><p>Ya puedes iniciar sesión y terminar de configurar tu personaje para comenzar a jugar.</p>", function() {
    		    cerrar.modal('hide');
    		});
<?php }
if ($this->session->flashdata('e_confreg') == '2') {
    ?>
    		var cerrar;
    		cerrar = bootbox.alert("<p><strong>ERROR</strong></p><p>Se ha producido un error al intentar confirmar la cuenta de correo. El código de confirmación no existe.</p>", function() {
    		    cerrar.modal('hide');
    		});
<?php }
if ($this->session->flashdata('baneado')) {
    ?>
    		var cerrar;
    		cerrar = bootbox.alert('<?php echo $this->session->flashdata('baneado'); ?>', function() {
    		    cerrar.modal('hide');
    		});
<?php }
?>
	    });
        </script>
        <!-- FIN JAVASCRIPTS -->
    </body>
</html>