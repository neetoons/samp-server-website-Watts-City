<div class="row">
    <div class="col-md-12">
        <div class="portlet-body form"><?php
            foreach ($datos as $ju) :
                $dinero = explode(',', $ju->Dinero);
                $licencia = explode(',', $ju->Licencias);
                $idioma = explode(',', $ju->Lenguajes);
                $puntosrol = explode(',', $ju->PuntosRol);
                $key_veh = explode(',', $ju->Coches);
                $key_casa = explode(',', $ju->Casas);
                $habilidad = explode(',', $ju->Habilidad);
                $necesidad = explode(',', $ju->Necesidades);
                $dato = explode(',', $ju->Datos);
                $facc = explode(',', $ju->Faccion);
                ?>
                <div class="tabbable-custom ">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                        <li><a href="#apariencia" data-toggle="tab">Apariencia</a></li>
                        <li><a href="#vehiculos" data-toggle="tab">Vehículos</a></li>
                        <li><a href="#certificacion" data-toggle="tab">Certificación</a></li>
                        <li><a href="#accesos" data-toggle="tab">Accesos</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- I - GENERAL -->
                        <div class="tab-pane active" id="general">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20">Mi personaje - <?php echo $this->general_library->NombreReal($ju->Nombre); ?></h2>
                                    <h3 class="form-section">Información general</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ID del personaje:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->UsuarioID; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nombre:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->NombreReal($ju->Nombre); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Apodo:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->Apodo; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Edad:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $dato[0]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Sexo:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_sexo($dato[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Raza:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_raza($ju->raza); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Cartera:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_positivo($dinero[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Banco:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_positivo($dinero[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nivel:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $dato[2]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Respeto:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $dato[3]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Payday:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $dato[4]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">WC Coins</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $puntosrol[0]?></p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3">Advertencias:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->Advertencia; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Skin:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->Skin; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Faccion:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $facc[1]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Rango:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $facc[2]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Skin:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <img src="<?php echo base_url(); ?>assets/img/skins/Skin_<?php echo $ju->Skin; ?>.png" name="Skin <?php echo $ju->Skin; ?>" />
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Hambre:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $necesidad[0] . ' / 100'; ?></p>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $necesidad[0]; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $necesidad[0]; ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Cansancio:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $necesidad[1] . ' / 100'; ?></p>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $necesidad[1]; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $necesidad[1]; ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Chaleco:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->Chaleco . ' / 100'; ?></p>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-gris" role="progressbar" aria-valuenow="<?php echo $ju->Chaleco; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ju->Chaleco; ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Vida:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->Vida . ' / 100'; ?></p>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $ju->Vida; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ju->Vida; ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->email; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Fecha de ingreso:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->ingreso; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Último acceso al juego:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php
                                                        if ($ju->ult_juego):
                                                            echo $ju->ult_juego;
                                                        else :
                                                            echo 'Ninguno';
                                                        endif;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Último acceso al PCU:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php
                                                        if ($ju->ult_pcu):
                                                            echo $ju->ult_pcu;
                                                        else :
                                                            echo 'Ninguno';
                                                        endif;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Estado de la cuenta:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_cuenta($ju->Baneado); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="form-section">Propiedades</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave del vehículo #1:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave del vehículo #2:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave del vehículo #3:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[2]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave prestada #1:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[3]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave prestada #2:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[4]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave prestada #3:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[5]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave casa #1:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_casa[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave casa #2:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_casa[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave casa #3:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_casa[2]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave negocio:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($ju->Negocio); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave taller:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($ju->Taller); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Llave almacén:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($ju->Almacen); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="form-section">Licencias</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Conducción:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Navegación:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Vuelo:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[2]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Pesca:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[3]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Caza:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[4]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Armas:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[5]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Camiones:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[6]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Motos:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[7]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="form-section">Idiomas</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Japonés:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Italiano:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Ruso:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[2]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Alemán:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[3]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Francés:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[4]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Chino:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[5]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="form-section">Habilidades</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Ladrón:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[0]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Ladrón de coches:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[1]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Basurero:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[2]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Barrendero:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[3]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Pescador:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[4]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Camionero:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[5]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- F - GENERAL -->
                        <!-- I - APARIENCIA -->
                        <div class="tab-pane" id="apariencia">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20">Apariencia</h2>
                                    <h3 class="form-section">General</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Sexo:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_sexo($this->session->userdata('sexo')); ?></p>
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
                            </form>
                        </div>
                        <!-- F - APARIENCIA -->
                        <!-- I - VEHICULOS -->
                        <div class="tab-pane" id="vehiculos">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20">Vehículos</h2>
                                    <?php if ($key_veh[0] != -1 || $key_veh[1] != -1 || $key_veh[2] != -1) : ?>
                                        <h3 class="form-section">Vehículos propios</h3>
                                        <div class="row"><?php
                                            for ($i = 0; $i < 3; $i++) :
                                                if ($key_veh[$i] != -1) :
                                                    ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Llave del vehículo:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['ID']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Modelo:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Modelo']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Descripción:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Descripcion']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Imagen:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><img src="<?php echo base_url(); ?>assets/img/vehiculos/Vehicle_<?php echo $llaves_veh[$i][0]['Modelo']; ?>.jpg" ></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Vida:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Vida'] . ' / 1000'; ?></p>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $llaves_veh[$i][0]['Vida']; ?>" aria-valuemin="0" aria-valuemax="1000" style="width: <?php echo $llaves_veh[$i][0]['Vida']; ?>%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Gasolina:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Gasolina'] . ' / 100'; ?></p>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-gris" role="progressbar" aria-valuenow="<?php echo $llaves_veh[$i][0]['Gasolina']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $llaves_veh[$i][0]['Gasolina']; ?>%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Color:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Color1'] . ', ' . $llaves_veh[$i][0]['Color2']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Propietario:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $this->general_library->NombreReal($llaves_veh[$i][0]['Dueno']); ?></p>
                                                            </div>
                                                        </div>
                                                    </div><?php
                                                endif;
                                            endfor;
                                            ?>
                                        </div><?php
                                    endif;
                                    if ($key_veh[3] != -1 || $key_veh[4] != -1 || $key_veh[5] != -1) :
                                        ?>
                                        <h3 class="form-section">Vehículos prestados</h3>
                                        <div class="row"><?php
                                            for ($i = 3; $i < 6; $i++) :
                                                if ($key_veh[$i] != -1) :
                                                    ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Llave del vehículo:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['ID']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Modelo:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Modelo']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Descripción:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Descripcion']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Imagen:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><img src="<?php echo base_url(); ?>assets/img/vehiculos/Vehicle_<?php echo $llaves_veh[$i][0]['Modelo']; ?>.jpg" ></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Gasolina:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Gasolina'] . ' / 100'; ?></p>
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-gris" role="progressbar" aria-valuenow="<?php echo $llaves_veh[$i][0]['Gasolina']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $llaves_veh[$i][0]['Gasolina']; ?>%"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Color:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Color1'] . ', ' . $llaves_veh[$i][0]['Color2']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Propietario:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $this->general_library->NombreReal($llaves_veh[$i][0]['Dueno']); ?></p>
                                                            </div>
                                                        </div>
                                                    </div><?php
                                                endif;
                                            endfor;
                                            ?>
                                        </div><?php endif;
                                        ?>
                                </div>
                            </form>
                        </div>
                        <!-- F - VEHICULOS -->
                        <!-- I - CERTIFICACION -->
                        <div class="tab-pane" id="certificacion">
                            <?php foreach ($certificacion as $cert) : ?>
                                <div class="form-body"><h2 class="margin-bottom-20">Certificación</h2></div>
                                <div class="col-md-12">
                                    <div class="note note-info">
                                        <h4 class="block"><strong>¡Información!</strong></h4>
                                        <p><strong>Nombre:</strong> <?php echo $this->general_library->NombreReal($ju->Nombre); ?></p>
                                        <p><strong>Intentos test:</strong> <?php echo $ju->int_test; ?></p>
                                        <p><strong>Intentos certificación:</strong> <?php echo $ju->int_cert; ?></p>
                                        <p><strong>Certificador:</strong> <?php echo $this->general_library->NombreReal($cert->Nombre); ?></p>
                                        <p><strong>Fecha:</strong> <?php echo $cert->fecha; ?></p>
                                        <p><strong>Comentario del certificador:</strong> <?php echo $cert->comentario; ?></p>
                                    </div>
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-eye"></i> Ver certificación de <?php echo $this->general_library->NombreReal($ju->Nombre); ?>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <form action="" class="form-horizontal form-row-seperated" method="post">
                                                <div class="form-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <h4><strong>1) <?php echo $cert->pregunta_1; ?></strong></h4>
                                                            <p><?php echo $cert->respuesta_1; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <h4><strong>2) <?php echo $cert->pregunta_2; ?></strong></h4>
                                                            <p><?php echo $cert->respuesta_2; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <h4><strong>3) <?php echo $cert->pregunta_3; ?></strong></h4>
                                                            <p><?php echo $cert->respuesta_3; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <h4><strong>4) <?php echo $cert->pregunta_4; ?></strong></h4>
                                                            <p><?php echo $cert->respuesta_4; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <h4><strong>5) <?php echo $cert->pregunta_5; ?></strong></h4>
                                                            <p><?php echo $cert->respuesta_5; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <h4><strong>6) <?php echo $cert->pregunta_6; ?></strong></h4>
                                                            <p><?php echo $cert->respuesta_6; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                &nbsp;
                            <?php endforeach; ?>
                        </div>
                        <!-- F - HABILIDADES -->
                        <!-- I - ACCESOS -->
                        <div class="tab-pane" id="accesos">
                            <div class="form-body"><h2 class="margin-bottom-20">Accesos</h2></div>
                            <div class="col-md-12">
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption"><i class="fa fa-gamepad"></i>Historial de accesos al juego</div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-full-width" id="tabla_accesos">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ID Acceso</th>
                                                    <th>Fecha</th>
                                                    <th>IP</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php
                                                $i = 0;
                                                foreach ($accesos as $acc) :
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $acc->id; ?></td>
                                                        <td><?php echo $acc->Fecha; ?></td>
                                                        <td><?php echo $acc->Ip; ?></td>
                                                    </tr><?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                        </div>
                        <!-- F - ACCESOS -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>