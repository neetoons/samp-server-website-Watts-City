<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $total_cuentas; ?></div>
                <div class="desc">Cuentas registradas</div>
            </div>
            <a class="more" href=""> Ver más <i class="m-icon-swapright m-icon-white"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="fa fa-check"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $total_activadas; ?></div>
                <div class="desc">Cuentas activas</div>
            </div>
            <a class="more" href=""> Ver más <i class="m-icon-swapright m-icon-white"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat yellow">
            <div class="visual">
                <i class="fa fa-exclamation"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $total_certificar; ?></div>
                <div class="desc">Cuentas por verificar</div>
            </div>
            <a class="more" href=""> Ver más <i class="m-icon-swapright m-icon-white"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-ban"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $total_bloqueadas; ?></div>
                <div class="desc">Cuentas baneadas</div>
            </div>
            <a class="more" href=""> Ver más <i class="m-icon-swapright m-icon-white"></i></a>
        </div>
    </div>

    <div class="col-md-12">
        <?php
        if ($this->session->flashdata('msj')) :
            echo $this->session->flashdata('msj');
        endif;
        ?>
        <!-- INICIO TABLA GENERAL -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-edit"></i>Listado de cuentas registradas</div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar"></div>
                <table class="table table-striped table-hover table-bordered" id="cuentas_registradas">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        foreach ($cuentas as $row) {
                            ?>
                            <tr <?php if ($row->Baneado == 1) {
                            echo 'class="danger"';
                        } else if ($row->Baneado == 2 || $row->Baneado == 3 || $row->Baneado == 4) {
                            echo 'class="warning"';
                        } ?>>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->Nombre; ?></td>
                                <td><?php echo $this->general_library->obtener_estado_cuenta($row->Baneado); ?></td>
                                <td class="center">
                                    <a href="<?php echo base_url(); ?>administrar/cuentas/ver/<?php echo $row->Nombre; ?>" data-placement="top" data-original-title="Ver" class="btn default btn-xs green tooltips"><i class="fa fa-eye"></i> Ver</a> <?php if ($this->session->userdata('admin') >= 3) { ?>
                                        <a href="<?php echo base_url(); ?>administrar/cuentas/editar/<?php echo $row->Nombre; ?>" data-placement="top" data-original-title="Editar" class="btn default btn-xs tooltips"><i class="fa fa-pencil"></i> Editar</a><?php }
                            ?>
                                </td>
                            </tr><?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- FIN TABLA GENERAL -->
    </div>
</div>