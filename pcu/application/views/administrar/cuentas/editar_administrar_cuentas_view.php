<div class="row">
    <div class="col-md-12"><?php
        foreach ($datos as $ju) : 
            if($ju->Jugando == 0) :
                $datos = explode(',', $ju->Datos);
                $necesidad = explode(',', $ju->Necesidades); 
                $dinero = explode(',', $ju->Dinero); 
                $idioma = explode(',', $ju->Lenguajes);
                $licencia = explode(',', $ju->Licencias);
                $facc = explode(',', $ju->Faccion); 
                $pos = explode(',', $ju->Posiciones); ?>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-edit"></i>Editar cuenta de <?php echo $this->general_library->NombreReal($ju->Nombre); ?>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form id="form-editarcuenta" name="form-editarcuenta" class="form-horizontal" action="<?php echo base_url(); ?>administrar/cuentas/editar/validar_edicion" method="post">
                            <div class="form-body">
                                <h3 class="form-section">Información general</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ID del personaje</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="id_jugador" name="id_jugador" value="<?php echo $ju->id; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Apodo</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="apodo" name="apodo" value="<?php echo $ju->Apodo; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Posición</label>
                                            <div class="col-md-9">
                                                <div class="input-group" style="text-align:left">
                                                    <input type="text" class="form-control" id="posicion" name="posicion" value="<?php echo $pos[0].','.$pos[1].','.$pos[2].','.$pos[3]; ?>" autocomplete="off">
                                                    <span class="input-group-btn">
                                                            <a href="javascript:reiniciar_pos();" class="btn green" id="reset_pos"><i class="fa fa-refresh"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Interior</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="interior" name="interior" value="<?php echo $pos[4]; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Virtual World</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="virtualworld" name="virtualworld" value="<?php echo $pos[5]; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nivel</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="nivel" name="nivel" value="<?php echo $datos[2]; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Respeto</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="respeto" name="respeto" value="<?php echo $datos[3]; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Payday</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="payday" name="payday" value="<?php echo $datos[4]; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Skin</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="skin" name="skin" value="<?php echo $ju->Skin; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Hambre</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="hambre" name="hambre" value="<?php echo $necesidad[0]; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Energia</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="energia" name="energia" value="<?php echo $necesidad[1]; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alcohol</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="alcohol" name="alcohol" value="<?php echo $necesidad[2]; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Vida</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="vida" name="vida" value="<?php echo $ju->Vida; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Chaleco</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="chaleco" name="chaleco" value="<?php echo $ju->Chaleco; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Cartera</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="cartera" name="cartera" value="<?php echo $dinero[0]; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Banco</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="banco" name="banco" value="<?php echo $dinero[1]; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Líder</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="lider" name="lider" value="<?php echo $facc[0]; ?>" autocomplete="off" <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Facción</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="faccion" name="faccion" value="<?php echo $facc[1]; ?>" autocomplete="off" <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Rango</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="rango" name="rango" value="<?php echo $facc[2]; ?>" autocomplete="off" <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">WC Coins</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="puntosrol" name="puntosrol" value="<?php echo $ju->PuntosRol; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Rango administrativo</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="admin" name="admin" required <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($ju->Admin == 0) { echo 'selected'; } ?>>Ninguno</option>
                                                    <option value="1" <?php if($ju->Admin == 1) { echo 'selected'; } ?>>Ayudante</option>
                                                    <option value="2" <?php if($ju->Admin == 2) { echo 'selected'; } ?>>Moderador 1</option>
                                                    <option value="3" <?php if($ju->Admin == 3) { echo 'selected'; } ?>>Moderador 2</option>
                                                    <option value="4" <?php if($ju->Admin == 4) { echo 'selected'; } ?>>Moderador Global</option>
                                                    <option value="5" <?php if($ju->Admin == 5) { echo 'selected'; } ?>>Administrador</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Subrango</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="sub_admin" name="sub_admin" required <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($ju->sub_admin == 0) { echo 'selected'; } ?>>Ninguno</option>
                                                    <option value="1" <?php if($ju->sub_admin == 1) { echo 'selected'; } ?>>editar_administrar_cuentas_view</option>
                                                    <option value="2" <?php if($ju->sub_admin == 2) { echo 'selected'; } ?>>Para ver panel "Certificar"</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Emaill</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $ju->email; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="form-section">Propiedades</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Llave almacén</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="almacen" name="almacen" value="<?php echo $ju->Almacen; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Llave taller</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="taller" name="taller" value="<?php echo $ju->Taller; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Llave negocio</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="negocio" name="negocio" value="<?php echo $ju->Negocio; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">    
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Llaves casas</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="casas" name="casas" value="<?php echo $ju->Casas; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Llave vehículos</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="vehiculos" name="vehiculos" value="<?php echo $ju->Coches; ?>" autocomplete="off" <?php if($this->session->userdata('admin') != 5) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="form-section">Licencias</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Conducción</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="conduccion" name="conduccion" value="<?php echo $licencia[0]; ?>" autocomplete="off"  <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Navegación</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="navegacion" name="navegacion" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($licencia[1] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($licencia[1] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Vuelo</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="vuelo" name="vuelo" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($licencia[2] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($licencia[2] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Pesca</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="pesca" name="pesca" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($licencia[3] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($licencia[3] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Caza</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="caza" name="caza" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($licencia[4] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($licencia[4] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Armas</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="armas" name="armas" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($licencia[5] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($licencia[5] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Camiones</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="camiones" name="camiones" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($licencia[6] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($licencia[6] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Motos</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="motos" name="motos" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($licencia[7] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($licencia[7] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="form-section">Idiomas</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Japonés</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="japones" name="japones" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($idioma[0] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($idioma[0] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Italiano</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="italiano" name="italiano" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($idioma[1] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($idioma[1] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Ruso</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="ruso" name="ruso" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($idioma[2] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($idioma[2] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Alemán</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="aleman" name="aleman" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($idioma[3] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($idioma[3] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Francés</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="frances" name="frances" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($idioma[4] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($idioma[4] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Chino</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="chino" name="chino" required <?php if($this->session->userdata('admin') < 4) { echo 'disabled'; } ?>>
                                                    <option value="0" <?php if($idioma[5] == 0) { echo 'selected'; } ?>>No</option>
                                                    <option value="1" <?php if($idioma[5] == 1) { echo 'selected'; } ?>>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="form-section">Apariencia</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Edad</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $datos[0]; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Sexo</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="sexo" name="sexo" required>
                                                    <option value="0" <?php if($datos[1] == 0) { echo 'selected'; } ?>>Masculino</option>
                                                    <option value="1" <?php if($datos[1] == 1) { echo 'selected'; } ?>>Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Raza</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="raza" name="raza" required>
                                                    <option value="1" <?php if($ju->raza == 1) { echo 'selected'; } ?>>Afroamericano</option>
                                                    <option value="2" <?php if($ju->raza == 2) { echo 'selected'; } ?>>Norteamericano</option>
                                                    <option value="3" <?php if($ju->raza == 3) { echo 'selected'; } ?>>Europa</option>
                                                    <option value="4" <?php if($ju->raza == 4) { echo 'selected'; } ?>>Latino</option>
                                                    <option value="5" <?php if($ju->raza == 5) { echo 'selected'; } ?>>Oriental</option>
                                                    <option value="6" <?php if($ju->raza == 6) { echo 'selected'; } ?>>Arabe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Procedencia</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="procedencia" name="procedencia" value="<?php echo $ju->procedencia; ?>"  autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Altura</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="altura" name="altura" value="<?php echo $ju->altura; ?>"  autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Peso</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $ju->peso; ?>"  autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Color de ojos</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="colorojos" id="colorojos">
                                                    <option value="0" <?php if($ju->colorojos == 0) { echo 'selected'; } ?>>Negros</option>
                                                    <option value="1" <?php if($ju->colorojos == 1) { echo 'selected'; } ?>>Marrones</option>
                                                    <option value="2" <?php if($ju->colorojos == 2) { echo 'selected'; } ?>>Verdes</option>
                                                    <option value="3" <?php if($ju->colorojos == 3) { echo 'selected'; } ?>>Azules</option>
                                                    <option value="4" <?php if($ju->colorojos == 4) { echo 'selected'; } ?>>Otros</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Color de pelo</label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="colorpelo" id="colorpelo">
                                                    <option value="0" <?php if($ju->colorpelo == 0) { echo 'selected'; } ?>>Negro</option>
                                                    <option value="1" <?php if($ju->colorpelo == 1) { echo 'selected'; } ?>>Marron</option>
                                                    <option value="2" <?php if($ju->colorpelo == 2) { echo 'selected'; } ?>>Pelirojo</option>
                                                    <option value="3" <?php if($ju->colorpelo == 3) { echo 'selected'; } ?>>Rubio</option>
                                                    <option value="4" <?php if($ju->colorpelo == 4) { echo 'selected'; } ?>>Blanco</option>
                                                    <option value="5" <?php if($ju->colorpelo == 5) { echo 'selected'; } ?>>Otros</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Descripción física</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="descfisica" name="descfisica"><?php echo $ju->descfisica; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Descripción psicológica</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="descpsico" name="descpsico"><?php echo $ju->descpsico; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Historia</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="historia" name="historia"><?php echo $ju->historia; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">¿Cómo llegaste?</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="comollegaste" name="comollegaste"><?php echo $ju->comollegaste; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">Actualizar datos</button>
                                            <a href="<?php echo base_url(); ?>/administrar/cuentas" role="button" class="btn default">Cancelar</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div><?php
            else : ?>
                <div class="alert alert-warning">
                    <strong>¡Aviso!</strong> El jugador no se puede editar hasta que no salga del juego.
                </div><?php
            endif;
        endforeach; ?>
    </div>
</div>
