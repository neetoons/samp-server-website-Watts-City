<!-- INICIO ROW-->
<div class="row">
    <!-- INICIO TABLA ACCESOS -->
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-archive"></i>Historial de accesos
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tabla_accesos">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Personaje</th>
                            <th>Nombre</th>
                            <th>IP</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        foreach ($resultados as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->idjugador; ?></td>
                                <td><?php echo $row->Nombre; ?></td>
                                <td><?php echo $row->Ip; ?></td>
                                <td><?php echo $row->Fecha; ?></td>
                            </tr><?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- FIN TABLA ACCESOS -->
</div>
<!-- FIN ROW -->