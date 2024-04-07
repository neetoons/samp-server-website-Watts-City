<!-- INICIO ROW -->
<div class="row profile">
    <div class="col-md-12">
        <!-- INICIO TABS -->
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#miperfil" data-toggle="tab">Mi perfil</a></li>
                <li><a href="#accesos" data-toggle="tab">Historial de accesos</a></li>
            </ul>
            <div class="tab-content">
                <!-- INICIO - TAB - MI PERFIL -->
                <div class="tab-pane active" id="miperfil">
                    <div class="row">
                        <!-- INICIO MENU IZ -->
                        <div class="col-md-3">
                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                <li><img src="<?php echo base_url(); ?>assets/img/perfil.png" class="img-responsive" alt=""/></li>
                                <li class="active"><a data-toggle="tab" href="#tab_info"><i class="fa fa-info"></i>Información general</a></li>
                                <li><a data-toggle="tab" href="#cambiar_clave"><i class="fa fa-lock"></i>Cambiar contraseña</a></li>
                                <!--<li><a data-toggle="tab" href="#cambiar_email"><i class="fa fa-envelope"></i>Cambiar email</a></li>-->
                            </ul>
                        </div>
                        <!-- FIN MENU IZ -->
                        <!-- INICIO COL-MD-9 -->
                        <div class="col-md-9">
                            <div class="tab-content">
                                <!-- INICIO - TAB - INFO -->
                                <div id="tab_info" class="tab-pane profile-classic row-fluid active">
                                    <ul class="unstyled"><?php
                                        foreach ($resultados as $row) {
                                            ?>
                                            <li><strong>ID de la cuenta:</strong> <?php echo $this->session->userdata('UsuarioID'); ?></li>
                                            <li><strong>Nombre:</strong> <?php echo $this->general_library->NombreReal($this->session->userdata('nombre')); ?></li>
                                            <li><strong>Apodo:</strong> <?php echo $row->Apodo; ?></li>
                                            <li><strong>Correo electrónico:</strong> <?php echo $row->email; ?></li>
                                            <!--<li><strong>Intentos test:</strong> <?php echo $row->int_test; ?></li>
                                            <li><strong>Intentos certificación:</strong> <?php echo $row->int_cert; ?></li>-->
                                            <li><strong>Fecha de ingreso:</strong> <?php echo $row->ingreso; ?></li>
                                            <li><strong>Último acceso al juego:</strong> <?php echo $row->ult_juego; ?></li>
                                            <li><strong>Último acceso al PCU:</strong> <?php echo $row->ult_pcu; ?></li>
                                            <li><strong>Estado de la cuenta:</strong> <?php echo $this->general_library->obtener_estado_cuenta($row->Baneado); ?></li>
                                            <?php if ($this->session->userdata('admin') > 0) { ?>
                                                <li><strong>Rango administrativo:</strong> <?php echo $this->session->userdata('admin'); ?></li> 
                                                    <?php if ($this->session->userdata('subadmin') > 0) { ?>
                                                    <li><strong>Subrango administrativo:</strong> asd</li><?php
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- FIN - TAB - INFO -->
                                <!-- INICIO - TAB - CPASS -->
                                <div id="cambiar_clave" class="tab-pane">
                                    <?php
                                    if ($this->session->flashdata('msj')) :
                                        echo $this->session->flashdata('msj');
                                    endif; ?>
                                    <form id="form-cclave" name="form-cclave" action="<?php echo base_url(); ?>micuenta/validar_cambiar_clave" method="post">
                                        <div class="form-group">
                                            <label class="control-label">Contraseña actual</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" placeholder="Introduce tu contraseña actual" id="clave_actual" name="clave_actual" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Nueva contraseña</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" placeholder="Introduce tu nueva contraseña" id="nueva_clave" name="nueva_clave" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Repite nueva contraseña</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                <input type="password" class="form-control" placeholder="Repite tu nueva contraseña " id="renueva_clave" name="renueva_clave" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn green" id="validar_cclave" name="validar_cclave" data-loading-text="Cambiando contraseña...">Cambiar contraseña</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- FIN - TAB - CPASS -->
                                <!-- INICIO - TAB - EMAIL -->
                                <div id="cambiar_email" class="tab-pane">
                                    <?php
                                    if ($this->session->flashdata('msj')) :
                                        echo $this->session->flashdata('msj');
                                    endif; ?>
                                    <div class="note note-info">
                                        <h4 class="block"><strong>¡Información!</strong></h4>
                                        <p>Recuerda que para cambiar la dirección de correo electrónico se te enviara un email al correo actual para informar del cambio.</p>
                                    </div>
                                    <form id="form-cemail" name="form-cemail" action="<?php echo base_url(); ?>micuenta/validar_cambiar_email" method="post">
                                        <div class="form-group">
                                            <label class="control-label">Dirección de correo electrónico:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control" placeholder="Introduce la dirección de correo electrónico" id="email" name="email" autocomplete="off" >
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn green" id="validar_cemail" name="validar_cmail" data-loading-text="Cambiando email...">Cambiar email</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- FIN - TAB - EMAIL -->
                            </div>
                        </div>
                        <!-- FIN COL-MD-9 -->
                    </div>
                </div>
                <!-- FIN - TAB - MI PERFIL -->

                <!-- INICIO - TAB - ACCESSOS -->
                <div class="tab-pane" id="accesos">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- INICIO INFO -->
                            <div class="note note-info">
                                <h4 class="block"><strong>¡Información!</strong></h4>
                                <p>En este apartado podrás vigilar tus conexiones al servidor, ya que se muestran tus últimos 60 accesos al juego.</p>
                            </div>
                            <!-- FIN INFO -->

                            <!-- INICIO TABLA ACCESSOS -->
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
                                            $i++;?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $acc->id; ?></td>
                                                <td><?php echo $acc->Fecha; ?></td>
                                                <td><?php echo $acc->Ip; ?></td>
                                            </tr><?php
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- FIN TABLA ACCESSOS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN TABS -->
    </div>
</div>
<!-- FIN ROW -->