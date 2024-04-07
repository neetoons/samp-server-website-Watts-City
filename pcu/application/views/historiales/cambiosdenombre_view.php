<!-- INICIO ROW-->
<div class="row">
    <!-- INICIO TABLA PREGUNTAS -->
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-archive"></i>Historial de cambios de nombre
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tabla_hnombres">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Nombre viejo</th>
                            <th>Nombre nuevo</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        foreach ($resultados as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row->CNameID; ?></td>
                                <td><?php echo $row->fecha; ?></td>
                                <td><?php echo $row->nombre_viejo; ?></td>
                                <td><?php echo $row->nombre_nuevo; ?></td>
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