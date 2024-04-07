<!-- INICIO ROW-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>Añadir un nuevo skin de facción
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form id="form-addskin" name="form-addskin" class="form-horizontal" action="<?php echo base_url(); ?>administrar/skinsfaccion/crear/validar_creacion" method="post">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Imagen:</label>
                            <div class="col-md-10">
                                <p id="img_skin" class="form-control-static"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">ID Skin:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="id_skin" name="id_skin" placeholder="Introduce la ID del skin" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Facción:</label>
                            <div class="col-md-10">
                                <select id="faccion" name="faccion" class="bs-select form-control" required>
                                    <option value=""></option><?php
                                    foreach ($facciones as $fac) {
                                        ?><option value="<?php echo $fac->id; ?>"><?php echo $fac->Nombre; ?></option><?php
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group last">
                            <label class="col-md-2 control-label">Estado:</label>
                            <div class="col-md-10">
                                <select id="estado" name="estado" class="bs-select form-control" required>
                                    <option value=""></option>
                                    <option value="0">Activado</option>
                                    <option value="1">Desactivado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions fluid">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green" id="validar_addskin" name="validar_addskin" data-loading-text="Añadiendo skin...">Añadir skin</button>
                            <a href="<?php echo base_url(); ?>administrar/skinsfaccion" role="button" class="btn default">Cancelar</a>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>
<!-- FIN ROW -->