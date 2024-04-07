<div class="row">
    <div class="col-md-12 margin-bottom-25 text-right">
        <a href="<?php echo base_url(); ?>perfil/<?php echo $this->session->userdata('nombre'); ?>"><button type="button" class="btn yellow"><i class="fa fa-eye">&nbsp;</i> Perfil público</button></a>
        <a href="<?php echo base_url(); ?>editar/mipersonaje"><button type="button" class="btn blue"><i class="fa fa-edit">&nbsp;</i> Editar personaje</button></a>
    </div>
</div>
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
                ?>
                <div class="tabbable-custom ">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                        <li><a href="#apariencia" data-toggle="tab">Apariencia</a></li>
                        <li><a href="#propiedades" data-toggle="tab">Propiedades</a></li>
                        <li><a href="#habilidades" data-toggle="tab">Habilidades</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- I - GENERAL -->
                        <div class="tab-pane active" id="general">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20">Mi personaje - <?php echo $this->general_library->NombreReal($this->session->userdata('nombre')); ?></h2>
                                    <h3 class="form-section">Información general</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>ID del personaje:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->session->userdata('UsuarioID'); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Nombre:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->NombreReal($this->session->userdata('nombre')); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Apodo:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->Apodo; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Edad:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->session->userdata('edad'); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Sexo:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_sexo($this->session->userdata('sexo')); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Dinero en mano:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_positivo($dinero[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Banco:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_positivo($dinero[1]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="form-section">Licencias</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Conducción:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Navegación:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Vuelo:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[2]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Pesca:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[3]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Caza:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[4]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Armas:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[5]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Camiones:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($licencia[6]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Motos:</b></label>
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
                                                <label class="control-label col-md-3"><b>Japonés:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Italiano:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Ruso:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[2]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Alemán:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[3]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Francés:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[4]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Chino:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_check($idioma[5]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="form-section">Otros</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Nivel:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->session->userdata('nivel'); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Respeto:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->session->userdata('respeto'); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>WC Coins:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $puntosrol[0]?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Correo electrónico:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->session->userdata('email'); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Horas de juego:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->HorasJugadas; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Estado de la cuenta:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_cuenta($ju->Baneado); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Advertencias:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->Advertencia; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Fecha de ingreso:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->ingreso; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Último acceso al juego:</b></label>
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
                                                <label class="control-label col-md-3"><b>Último acceso al PCU:</b></label>
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
                                                <label class="control-label col-md-3"><b>Sexo:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_sexo($this->session->userdata('sexo')); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Raza:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_raza($ju->raza); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Altura:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->altura; ?>cm</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Peso:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $ju->peso; ?>kg</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Color de ojos:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_color_ojos($ju->colorojos); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Color de pelo:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_color_pelo($ju->colorpelo); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Procedencia:</b></label>
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
                        <!-- I - PROPIEDADES -->
                        <div class="tab-pane" id="propiedades">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20">Propiedades</h2>
                                    <h3 class="form-section">Información general</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave del vehículo #1:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave del vehículo #2:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave del vehículo #3:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[2]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave prestada #1:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[3]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave prestada #2:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[4]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave prestada #3:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_veh[5]); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave casa #1:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_casa[0]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave casa #2:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_casa[1]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave casa #3:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($key_casa[2]); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave negocio:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($ju->Negocio); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave taller:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($ju->Taller); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Llave almacén:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_estado_llave($ju->Almacen); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><?php
                                    if($key_veh[0] != -1 || $key_veh[1] != -1 || $key_veh[2] != -1) : ?>
                                        <h3 class="form-section">Vehículos propios</h3>
                                        <div class="row"><?php
                                            for($i = 0; $i < 3; $i++) :
                                                if($key_veh[$i] != -1) : ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><b>Llave del vehículo:</b></label>
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
                                                                <div class="progress">
                                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $llaves_veh[$i][0]['Gasolina']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $llaves_veh[$i][0]['Gasolina']; ?>%"><strong>Gasolina: <?php echo $llaves_veh[$i][0]['Gasolina']; ?> / 100</strong></div>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Color:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Color1'].', '.$llaves_veh[$i][0]['Color2']; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Propietario:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $this->general_library->NombreReal($llaves_veh[$i][0]['Dueno']); ?></p>                  
                                                            </div>
                                                            <label class="control-label col-md-3">____________________________________________________________________________________________________________________________________________________________________________________________________________________________________</label>
                                                        </div>
                                                    </div><?php
                                                endif;
                                            endfor; ?>
                                        </div><?php
                                    endif; 
                                    if($key_veh[3] != -1 || $key_veh[4] != -1 || $key_veh[5] != -1) : ?>
                                        <h3 class="form-section">Vehículos prestados</h3>
                                        <div class="row"><?php
                                            for($i = 3; $i < 6; $i++) :
                                                if($key_veh[$i] != -1) : ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3"><b>Llave del vehículo:</b></label>
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
                                                            <div class="col-md-9">
                                                               <div class="progress">
                                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $llaves_veh[$i][0]['Gasolina']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $llaves_veh[$i][0]['Gasolina']; ?>%"><strong>Gasolina: <?php echo $llaves_veh[$i][0]['Gasolina']; ?> / 100</strong></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Color:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"><?php echo $llaves_veh[$i][0]['Color1'].', '.$llaves_veh[$i][0]['Color2']; ?></p>
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
                                            endfor; ?>
                                        </div><?php
                                    endif; ?>
                                </div>
                            </form>
                        </div>
                        <!-- F - PROPIEDADES -->
                        <!-- I - HABILIDADES -->
                        <div class="tab-pane" id="habilidades">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20">Habilidades del personaje</h2>
                                    <h3 class="form-section">Información general</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Ladrón:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[0]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Ladrón de coches:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[1]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Pescador:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[4]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Basurero:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[2]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Barrendero:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[3]; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><b>Camionero:</b></label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $habilidad[5]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- F - HABILIDADES -->
                    </div>
                </div><?php endforeach; ?>
        </div>
    </div>
</div>