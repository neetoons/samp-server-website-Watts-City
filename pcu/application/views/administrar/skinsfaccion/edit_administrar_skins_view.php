<!-- INICIO ROW-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>Editar skin de facción
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM--><?php
                foreach ($detalle as $skin) : ?>
                    <form id="form-editskin" name="form-editskin" class="form-horizontal" action="<?php echo base_url(); ?>administrar/skinsfaccion/editar/validar_edicion" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label">SQL ID:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="sqlid" name="sqlid" value="<?php echo $skin->id_skintrabajo; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Imagen:</label>
                                <div class="col-md-10">
                                    <p id="img_skin" class="form-control-static"><img src="<?php echo base_url(); ?>assets/img/skins/Skin_<?php echo $skin->SkinID; ?>.png"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">ID Skin:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="id_skin" name="id_skin" value="<?php echo $skin->SkinID; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Facción:</label>
                                <div class="col-md-10">
                                    <select id="faccion" name="faccion" class="bs-select form-control" required><?php
                                        foreach ($facciones as $facc) : ?>
                                            <option value="<?php echo $facc->id; ?>" <?php if($skin->id_faccion == $facc->id) { echo 'selected'; } ?>><?php echo $facc->Nombre; ?></option><?php
                                        endforeach; ?>
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
                                <a href="<?php echo base_url(); ?>administrar/skinsfaccion" role="button" class="btn default">Cancelar</a>
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