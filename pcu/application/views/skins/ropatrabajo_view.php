<div class="row">
    <div class="col-md-12"><?php
    if($this->session->userdata('faccion') >= 1 && $this->session->userdata('faccion') <= 4 || $this->session->userdata('faccion') == 6) { ?>
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
                <form action="<?php echo base_url(); ?>cambiar/ropa-trabajo/validar_jobcropa" id="form-cropa" name="form-jobcropa" method="post">
                    <input type="hidden" id="ropatrabajo" name="ropatrabajo" value="26"><?php
                    foreach ($listado as $skin) {
                        ?><a href="javascript: ropatrabajo(<?php echo $skin->SkinID; ?>)" class="tooltips" data-placement="top" data-original-title="<?php echo $skin->SkinID; ?>"><img src="<?php echo base_url(); ?>assets/img/skins/<?php echo $skin->SkinID; ?>.png" name="Skin <?php echo $skin->SkinID; ?>" /></a><?php }
                    ?>
                </form>
            </div>
        </div>
    </div><?php } else { ?>
    <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><span class="fa fa-warning margin-right-10"></span> <strong>¡Error!</strong> '¡No tienes facción!'</div>
    </div><?php } ?>
</div>