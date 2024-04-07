</div>
</div>
<!-- FIN CONTENIDO -->
</div>
<!-- FIN CONTAINER -->

<!-- INICIO FOOTER -->
<div class="footer">
    <div class="footer-inner">
        2013 - 2015 &copy; Watts City Roleplay
    </div>
    <div class="footer-tools">
        <span class="go-top">
            <i class="fa fa-angle-up"></i>
        </span>
    </div>
</div>
<!-- FIN FOOTER -->

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
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>

<?php echo $archivosjs; ?>

<script src="<?php echo base_url(); ?>assets/scripts/core/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/scripts/custom/general.js" type="text/javascript"></script>

<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<!-- Jquery Package End -->
<script type="text/javascript">
jQuery(document).ready(function($){
    $('#buscadordtrp').autocomplete({source:'<?php echo base_url(); ?>autocomplete.php', minLength:2});
});
</script>
<script>
    jQuery(document).ready(function() {
        App.init();
<?php echo $funcionesjs; ?>
    });
    $('#page_loader').hide();
<?php if ($this->session->flashdata('conf_email')) {
    ?>
        var cerrar;
        cerrar = bootbox.alert("<p><strong>¡Correcto!</strong></p><p>Tu email ha sido cambiado correctamente.</p>", function() {
            cerrar.modal('hide');
        });
<?php }
?>
</script>
</body>
</body>
</html>