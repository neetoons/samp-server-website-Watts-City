<!-- INICIO ROW-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>Crear nueva pregunta para el test
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form id="form-crear" name="form-crear" class="form-horizontal" action="<?php echo base_url(); ?>certificar/gestionar/test/validar_creacion" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Pregunta:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Pregunta" id="pregunta" name="pregunta" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">A):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Respuesta A" id="A" name="A" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">B):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Respuesta B" id="B" name="B" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">C):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Respuesta C" id="C" name="C" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">D):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Respuesta D" id="D" name="D" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Respuesta correcta:</label>
                            <div class="col-md-10">
                                <select id="resultado" name="resultado" class="bs-select form-control" required>
                                    <option value=""></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
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
                            <a href="<?php echo base_url(); ?>/certificar/gestionar/test" role="button" class="btn default">Cancelar</a>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<!-- FIN ROW -->