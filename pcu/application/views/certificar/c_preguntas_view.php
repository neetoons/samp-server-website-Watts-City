<!-- INICIO ROW-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>Crear nueva pregunta de desarrollo
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form id="form-crear" name="form-crear" class="form-horizontal" action="<?php echo base_url(); ?>certificar/gestionar/desarrollo/validar_creacion" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Pregunta:</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="pregunta" name="pregunta" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="col-md-2 control-label">Estado:</label>
                            <div class="col-md-10">
                                <select id="estado" name="estado" class="bs-select form-control" required>
                                    <option value=""></option>
                                    <option value="0">Activada</option>
                                    <option value="1">Desactivada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Crear pregunta</button>
                            <a href="<?php echo base_url(); ?>/certificar/gestionar/desarrollo" role="button" class="btn default">Cancelar</a>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<!-- FIN ROW -->