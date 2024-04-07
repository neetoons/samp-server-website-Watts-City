<div class="row">
    <div class="col-md-12 margin-bottom-25 text-right">
        <a href="<?php echo base_url(); ?>perfil/<?php echo $this->session->userdata('nombre'); ?>"><button type="button" class="btn blue"><i class="fa fa-eye">&nbsp;</i> Perfil público</button></a>
        <a href="<?php echo base_url(); ?>mipersonaje"><button type="button" class="btn yellow"><i class="fa fa-male">&nbsp;</i> Mi personaje</button></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- INICIO MENSAJE -->
        <div class="note note-info">
            <h4 class="block"><strong>¡Información!</strong></h4>
            <p>Es importante tener siempre la información de tu personaje actualizada, ya que es una de las partes más importantes del rol. Cuanto más detallado este todo mejor.</p>
        </div>
        <div class="alert alert-warning">
            <span class="fa fa-warning margin-right-10"></span><strong>¡Aviso!</strong> No es necesario editar todos los campos, solo cambia los deseados y pulsa actualizar.
        </div>
        <?php
        if ($this->session->flashdata('msj')) :
            echo $this->session->flashdata('msj');
        endif;
        ?>
        <!-- FIN MENSAJE -->

        <!-- I - EDITAR PERSONAJE --><?php
        foreach ($resultado as $jug) : 
            $datos_r = explode(',', $jug->Datos); ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-edit"></i>Editar mi personaje</div>
                </div>
                <div class="portlet-body form">
                    <form id="form-editpers" name="form-editpers" class="form-horizontal" action="<?php echo base_url(); ?>editar/mipersonaje/validar_edicion" method="post">
                        <div class="form-body">
                            <h3 class="form-section">Información personal</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nombre</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $this->session->userdata('nombre'); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Procedencia</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="¿Donde nació tu personaje?" value="<?php echo $jug->procedencia; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Apodo</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="apodo" name="apodo" placeholder="Introduce tu apodo" value="<?php echo $jug->Apodo; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Altura <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="altura" name="altura" placeholder="Altura de tu personaje en centímetros." value="<?php echo $jug->altura; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Raza <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <select class="select2_category form-control" data-placeholder="Selecciona una opción" id="raza" name="raza" disabled>
                                                <option value="1" <?php if($jug->raza == 1) { echo 'selected'; } ?>>Afroamericano</option>
                                                <option value="2" <?php if($jug->raza == 2) { echo 'selected'; } ?>>Norteamericano</option>
                                                <option value="3" <?php if($jug->raza == 3) { echo 'selected'; } ?>>Europa</option>
                                                <option value="4" <?php if($jug->raza == 4) { echo 'selected'; } ?>>Latino</option>
                                                <option value="5" <?php if($jug->raza == 5) { echo 'selected'; } ?>>Oriental</option>
                                                <option value="6" <?php if($jug->raza == 6) { echo 'selected'; } ?>>Arabe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Peso <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso de tu personaje en kilogramos" value="<?php echo $jug->peso; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Sexo <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <div class="radio-list">
                                                <label class="radio-inline"><input type="radio" id="sexo" name="sexo" value="0" <?php if($datos_r[1] == 0) { echo 'checked'; } ?> disabled> Masculino</label>
                                                <label class="radio-inline"><input type="radio" id="sexo" name="sexo" value="1" <?php if($datos_r[1] == 1) { echo 'checked'; } ?> disabled> Femenino</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Color de ojos</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="cojos" id="cojos">
                                                <option value="0" <?php if($jug->colorojos == 0) { echo 'selected'; } ?>>Negros</option>
                                                <option value="1" <?php if($jug->colorojos == 1) { echo 'selected'; } ?>>Marrones</option>
                                                <option value="2" <?php if($jug->colorojos == 2) { echo 'selected'; } ?>>Verdes</option>
                                                <option value="3" <?php if($jug->colorojos == 3) { echo 'selected'; } ?>>Azules</option>
                                                <option value="4" <?php if($jug->colorojos == 4) { echo 'selected'; } ?>>Otros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Edad <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="edad" name="edad" placeholder="Introduce la edad del personaje (1 - 99)" value="<?php echo $datos_r[0]; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Color de pelo</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="cpelo" id="cpelo">
                                                <option value="0" <?php if($jug->colorpelo == 0) { echo 'selected'; } ?>>Negro</option>
                                                <option value="1" <?php if($jug->colorpelo == 1) { echo 'selected'; } ?>>Marron</option>
                                                <option value="2" <?php if($jug->colorpelo == 2) { echo 'selected'; } ?>>Pelirojo</option>
                                                <option value="3" <?php if($jug->colorpelo == 3) { echo 'selected'; } ?>>Rubio</option>
                                                <option value="4" <?php if($jug->colorpelo == 4) { echo 'selected'; } ?>>Blanco</option>
                                                <option value="5" <?php if($jug->colorpelo == 6) { echo 'selected'; } ?>>Otros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h3 class="form-section">Información adicional</h3>
                            <!--/row-->
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Descripción física</label>
                                    <div class="col-md-9">
                                        <textarea class="wysihtml5 form-control" rows="6" id="descfisica" name="descfisica"><?php echo $jug->descfisica; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Descripción psicológica</label>
                                    <div class="col-md-9">
                                        <textarea class="wysihtml5 form-control" rows="6" id="descpsico" name="descpsico"><?php echo $jug->descpsico; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Historia conocida</label>
                                    <div class="col-md-9">
                                        <textarea class="wysihtml5 form-control" rows="12" id="historia" name="historia"><?php echo $jug->historia; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">¿Cómo llegaste a Los Santos?</label>
                                    <div class="col-md-9">
                                        <textarea class="wysihtml5 form-control" rows="6" id="comollegaste" name="comollegaste"><?php echo $jug->comollegaste; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green" data-loading-text="Actualizando datos...">Actualizar mi personaje</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><?php
        endforeach; ?>
        <!-- F - EDITAR PERSONAJE -->
    </div>
</div>