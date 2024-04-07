<!-- INICIO ROW-->
<div class="row">
    <div class="col-md-12"><?php foreach ($detalle as $test) : ?>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>Editar pregunta test Nº <?php echo $test->TestID; ?>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form id="formeditar" name="formeditar" class="form-horizontal" action="<?php echo base_url(); ?>certificar/gestionar/test/validar_edicion" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">ID Pregunta:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="<?php echo $test->TestID; ?>" id="testid" name="testid" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Autor:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value="<?php echo $this->general_library->NombreReal($test->Nombre); ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Pregunta:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Pregunta" id="pregunta" name="pregunta" value="<?php echo $test->pregunta; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">A):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Respuesta A" id="A" name="A" value="<?php echo $test->A; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">B):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Respuesta B" id="B" name="B" value="<?php echo $test->B; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">C):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Respuesta C" id="C" name="C" value="<?php echo $test->C; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">D):</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Respuesta D" id="D" name="D" value="<?php echo $test->D; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Respuesta correcta:</label>
                            <div class="col-md-10">
                                <select id="resultado" name="resultado" class="bs-select form-control" required>
                                    <option value="A" <?php if($test->resultado == 'A') { echo 'selected'; } ?>>A</option>
                                    <option value="B" <?php if($test->resultado == 'B') { echo 'selected'; } ?>>B</option>
                                    <option value="C" <?php if($test->resultado == 'C') { echo 'selected'; } ?>>C</option>
                                    <option value="D" <?php if($test->resultado == 'D') { echo 'selected'; } ?>>D</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="col-md-2 control-label">Estado:</label>
                            <div class="col-md-10">
                                <select id="estado" name="estado" class="bs-select form-control" required>
                                    <option value="0" <?php if($test->estado == 0) { echo 'selected'; } ?>>Activada</option>
                                    <option value="1" <?php if($test->estado == 1) { echo 'selected'; } ?>>Desactivada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Guardar</button>
                            <a href="<?php echo base_url(); ?>/certificar/gestionar/test" role="button" class="btn default">Cancelar</a>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div><?php endforeach; ?>
    </div>
</div>
<!-- FIN ROW -->