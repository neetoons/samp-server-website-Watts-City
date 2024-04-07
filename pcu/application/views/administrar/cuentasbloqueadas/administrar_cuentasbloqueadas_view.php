<div class="row">
    <div class="col-md-12">
        <?php
        if ($this->session->flashdata('msj')) :
            echo $this->session->flashdata('msj');
        endif;
        ?>
        <!-- INICIO TABLA GENERAL -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-ban"></i>Listado de cuentas bloqueadas</div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar"></div>
                <table class="table table-striped table-hover table-bordered" id="cuentas_bloqueadas">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Admin</th>
                            <th>Fecha</th>
                            <th>Razón</th>
                            <th>Tipo ban</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        foreach ($bloqueadas as $row) {
                            if($row->TipoBan == 1) { $tipoban = 'Permanente'; }
                            else { $tipoban = 'Temporal'; }
                            ?>
                            <tr>
                                <td><?php echo $row->id_ban; ?></td>
                                <td><?php echo $row->Nombre; ?></td>
                                <td><?php echo $this->general_library->NombreReal($this->general_library->obtener_nombre($row->AdminID)); ?></td>
                                <td><?php echo $row->fecha; ?></td>
                                <td><?php echo $row->razon; ?></td>
                                <td><?php echo $tipoban; ?></td>
                                <td><a href="<?php echo base_url(); ?>administrar/cuentasbloqueadas/desbloquear/<?php echo $row->id_ban; ?>" data-placement="top" data-original-title="Desbloquear" class="btn default btn-xs red tooltips"><i class="fa fa-ban"></i> Desbloquear</a></td>
                            </tr><?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- FIN TABLA GENERAL -->
    </div>
</div>
