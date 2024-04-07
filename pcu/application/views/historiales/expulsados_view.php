<!-- INICIO ROW-->
<div class="row">
    <!-- INICIO TABLA PREGUNTAS -->
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-archive"></i>Historial de expulsados
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tabla_hnombres">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Expulsado</th>
                            <th>Expulsado por</th>
                            <th>Razón</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        foreach ($resultados as $row) {
                            ?>
                            <tr <?php if($row->Expulsador == 'Watts City - ANTICHEAT') { echo 'class="warning"'; } ?>>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->Fecha; ?></td>
                                <td><?php echo $row->Expulsado; ?></td>
                                <td><?php echo $row->Expulsador; ?></td>
                                <td><?php echo $row->Razon; ?></td>
                            </tr><?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- FIN TABLA PREGUNTAS -->
</div>
<!-- FIN ROW -->