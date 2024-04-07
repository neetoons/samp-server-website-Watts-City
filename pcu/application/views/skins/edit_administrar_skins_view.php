<!-- INICIO ROW-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>Añadir un nuevo skin
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM--><?php
                foreach ($detalle as $skin) : ?>
                    <form id="form-editskin" name="form-editskin" class="form-horizontal" action="<?php echo base_url(); ?>administrar/skins/editar/validar_edicion" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Imagen:</label>
                                <div class="col-md-10">
                                    <p id="img_skin" class="form-control-static"><img src="<?php echo base_url(); ?>assets/img/skins/<?php echo $skin->SkinID; ?>.png"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">ID Skin:</label>
                                <div class="col-md-10">
                                    <select id="id_skin" class="form-control" name="id_skin" readonly>
                                        <option value="<?php echo $skin->SkinID; ?>"><?php echo $skin->SkinID; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Sexo:</label>
                                <div class="col-md-10">
                                    <select id="sexo" name="sexo" class="bs-select form-control" required>
                                        <option value="0" <?php if($skin->sexo == 0) { echo 'selected'; } ?>>Hombre</option>
                                        <option value="1" <?php if($skin->sexo == 1) { echo 'selected'; } ?>>Mujer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group last">
                                <label class="col-md-2 control-label">Estado:</label>
                                <div class="col-md-10">
                                    <select id="estado" name="estado" class="bs-select form-control" required>
                                        <option value="0" <?php if($skin->estado == 0) { echo 'selected'; } ?>>Activado</option>
                                        <option value="1" <?php if($skin->estado == 1) { echo 'selected'; } ?>>Desactivado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" id="validar_editskin" name="validar_editskin" data-loading-text="Guardando...">Guardar</button>
                                <a href="<?php echo base_url(); ?>administrar/skins" role="button" class="btn default">Cancelar</a>
                            </div>
                        </div>
                    </form><?php
                endforeach; ?>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<!-- FIN ROW -->