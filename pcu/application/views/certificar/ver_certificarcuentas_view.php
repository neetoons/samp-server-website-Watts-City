<div class="row">
    <div class="col-md-12"><?php
        foreach ($detalle as $row) :
            if ($row->certificador == 0):
                $ncert = '&#126;';
            else :
                $ncert = $this->certcuentas_model->nombre_certificador($row->certificador);
            endif;
            ?>
            <div class="note note-info">
                <h4 class="block"><strong>¡Información!</strong></h4>
                <p><strong>Nombre:</strong> <?php echo $this->general_library->NombreReal($row->Nombre); ?></p>
                <p><strong>Intentos test:</strong> <?php echo $row->int_test; ?></p>
                <p><strong>Intentos certificación:</strong> <?php echo $row->int_cert; ?></p>
                <p><strong>Últ. Certificador:</strong> <?php echo $this->general_library->NombreReal($ncert); ?></p>
                <p><strong>Fecha:</strong> <?php echo $row->fecha; ?></p>
            </div><?php if ($row->comentario != NULL): ?>
                <div class="note note-warning">
                    <h4 class="block"><strong>Comentario del certificador:</strong></h4>
                    <p><?php echo $row->comentario; ?></p>
                </div><?php endif; ?>
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-eye"></i>Información sobre el personaje</div>
                    <div class="tools"><a href="javascript:;" class="collapse"></a></div>
                </div><?php
                foreach ($jugador as $jug) : 
                $datos_r = explode(',', $jug->Datos); ?>
                <div class="portlet-body form collapse">
                    <form name="form-cuenta" class="form-horizontal">
                        <div class="form-body">
                            <h3 class="form-section">Información personal</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nombre:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->NombreReal($row->Nombre);; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Procedencia:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $jug->procedencia; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Apodo:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $jug->Apodo; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Altura:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $jug->altura; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Raza:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->obtener_raza($jug->raza); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Peso:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $jug->peso; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sexo:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->obtener_sexo($datos_r[1]); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Color de ojos:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->obtener_color_ojos($jug->colorojos); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Edad:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $datos_r[0]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Color de pelo:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->obtener_color_pelo($jug->colorpelo); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h3 class="form-section">Información adicional:</h3>
                            <!--/row-->
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Descripción física:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"><?php echo $jug->descfisica; ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Descripción psicológica:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"><?php echo $jug->descpsico; ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Historia conocida:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"><?php echo $jug->historia; ?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">¿Cómo llegaste a Los Santos?:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static"><?php echo $jug->comollegaste; ?></p>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                    </form>
                </div><?php
                endforeach; ?>
            </div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-eye"></i> Ver certificación de <?php echo $this->general_library->NombreReal($row->Nombre); ?>
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="" class="form-horizontal form-row-seperated" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4><strong>1) <?php echo $row->pregunta_1; ?></strong></h4>
                                    <p><?php echo $row->respuesta_1; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4><strong>2) <?php echo $row->pregunta_2; ?></strong></h4>
                                    <p><?php echo $row->respuesta_2; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4><strong>3) <?php echo $row->pregunta_3; ?></strong></h4>
                                    <p><?php echo $row->respuesta_3; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4><strong>4) <?php echo $row->pregunta_4; ?></strong></h4>
                                    <p><?php echo $row->respuesta_4; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4><strong>5) <?php echo $row->pregunta_5; ?></strong></h4>
                                    <p><?php echo $row->respuesta_5; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4><strong>6) <?php echo $row->pregunta_6; ?></strong></h4>
                                    <p><?php echo $row->respuesta_6; ?></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>Opciones del certificador
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="<?php echo base_url(); ?>certificar/cuentas/validar_respuesta" id="form-respcert" name="form-respcert" class="form-horizontal form-row-seperated" method="post">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Opciones:</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="opcion" id="opcion" required>
                                        <option value=""></option>
                                        <option value="1" style="color: green;">Aceptar</option>
                                        <option value="2" style="color: orange;">Rechazar</option>
                                        <option value="3" style="color: red;">Bloquear</option>
                                        <option value="4" style="color: blue;">Cambio de nombre</option>
                                    </select>
                                    <input type="hidden" name="CertificarID" id="CertificarID" value="<?php echo $row->CertificarID; ?>" />
                                </div>
                            </div>
                            <div class="form-group last">
                                <label class="control-label col-md-3">Comentario del certificador: </label>
                                <div class="col-md-9">
                                    <textarea class="wysihtml5 form-control" rows="6" name="respcert" id="respcert" data-error-container="#respuesta_error" onpaste="return false" ondragstart="return false" onselectstart="return false" required></textarea>
                                    <input type="hidden" id="idcert" name="idcert" value="<?php echo $row->CertificarID; ?>">
                                    <div id="respuesta_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" id="validar_respcert" name="validar_respcert" data-loading-test="Enviando respuesta...">Enviar respuesta</button>
                                        <a href="<?php echo base_url(); ?>certificar/cuentas" role="button" class="btn default">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>