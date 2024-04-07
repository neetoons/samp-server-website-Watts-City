<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form">
            <div class="tabbable-custom"><?php
                foreach ($resultado as $ju) : 
                    $datos = explode(',', $ju->Datos); ?>
                    <form class="form-horizontal" role="form">
                        <div class="form-body">
                            <h3 class="form-section"><?php echo $this->general_library->NombreReal($ju->Nombre); ?></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">ID personaje:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $ju->UsuarioID; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nivel:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $datos[2]; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Tiempo total de juego:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $ju->HorasJugadas; ?> hora(s)</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Cuenta activa:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php
                                                if($ju->Baneado == 0) {
                                                    echo '<span class="text-success">Si</span>';
                                                } else {
                                                    echo '<span class="text-danger">No</span>';
                                                } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="text-right">
                                            <img src="<?php echo base_url(); ?>assets/img/skins/<?php echo $ju->Skin; ?>.png" width="75" >
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <h3 class="form-section">General</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Edad:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $datos[0]; ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sexo:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->obtener_sexo($datos[1]); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Raza:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->obtener_raza($ju->raza); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Altura:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $ju->altura; ?>cm</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Peso:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $ju->peso; ?>kg</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Color de ojos:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->obtener_color_ojos($ju->colorojos); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Color de pelo:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $this->general_library->obtener_color_pelo($ju->colorpelo); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Procedencia:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"><?php echo $ju->procedencia; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="form-section">Descripción física</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="form-control-static"><?php echo $ju->descfisica; ?></p>
                                </div>
                            </div>
                            <h3 class="form-section">Descripción psicológica</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="form-control-static"><?php echo $ju->descpsico; ?></p>
                                </div>
                            </div>
                            <h3 class="form-section">Historia conocida</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="form-control-static"><?php echo $ju->historia; ?></p>
                                </div>
                            </div>
                            <h3 class="form-section">¿Cómo llegaste a Los Santos?</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="form-control-static"><?php echo $ju->comollegaste; ?></p>
                                </div>
                            </div>
                        </div>
                    </form><?php
                endforeach; ?>
            </div>
        </div>
    </div>
</div>
