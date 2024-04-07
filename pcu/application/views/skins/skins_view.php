<div class="row">
    <div class="col-md-12">
        <div class="note note-info">
            <h4 class="block"><strong>¡Información!</strong></h4>
            <p>El sexo de tu personaje es <i><?php echo $this->general_library->obtener_sexo($this->session->userdata('sexo')); ?></i> y su raza es <i><?php echo $this->general_library->obtener_raza($this->session->userdata('raza')); ?></i>.</p>
            <p>Para cambiar el skin de tu personaje solo pulsa encima de la imagen deseada, recuerda que te puedes cambiar la ropa todas las veces que quieras y <strong>gratis</strong>.</p>
        </div>
        <?php
        if ($this->session->flashdata('msj')) :
            echo $this->session->flashdata('msj');
        endif;
        ?>
    </div>
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-eye"></i>Listado de skins disponibles
                </div>
            </div>
            <div class="portlet-body">
                <form action="<?php echo base_url(); ?>cambiar/ropa-usual/validar_cropa" id="form-cropa" name="form-cropa" method="post">
                    <input type="hidden" id="ropausual" name="ropausual" value="26"><?php
                    foreach ($listado as $skin) {
                        ?><a href="javascript: ropausual(<?php echo $skin->SkinID; ?>)" class="tooltips" data-placement="top" data-original-title="<?php echo $skin->SkinID; ?>"><img src="<?php echo base_url(); ?>assets/img/skins/<?php echo $skin->SkinID; ?>.png" name="Skin <?php echo $skin->SkinID; ?>" /></a><?php }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>