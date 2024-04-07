<!-- INICIO ROW-->
<div class="row">
    <div class="col-md-12"><?php foreach ($detalle as $preg) : ?>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>Editar pregunta desarrollo Nº <?php echo $preg->PreID; ?>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form id="formeditar" name="formeditar" class="form-horizontal" action="<?php echo base_url(); ?>certificar/gestionar/desarrollo/validar_edicion" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">ID Pregunta:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="<?php echo $preg->PreID; ?>" id="preguntaid" name="preguntaid" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Autor:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="<?php echo $this->general_library->NombreReal($preg->Nombre); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Pregunta:</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="pregunta" name="pregunta" placeholder="Introduce la pregunta sin saltos de linea" rows="4" required><?php echo $preg->pregunta; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="col-md-2 control-label">Estado:</label>
                            <div class="col-md-10">
                                <select id="estado" name="estado" class="bs-select form-control" required>
                                    <option value="0" <?php if($preg->estado == 0) { echo 'selected'; } ?>>Activada</option>
                                    <option value="1" <?php if($preg->estado == 1) { echo 'selected'; } ?>>Desactivada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Guardar</button>
                            <a href="<?php echo base_url(); ?>/certificar/gestionar/desarrollo" role="button" class="btn default">Cancelar</a>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div><?php endforeach; ?>
    </div>
</div>
<!-- FIN ROW -->