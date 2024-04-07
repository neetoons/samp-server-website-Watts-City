<div class="row">
    <div class="col-md-12">
        <div class="note note-info">
            <h4 class="block"><strong>¡Información!</strong></h4><?php
            if ($total_cuentas > 0) :
                echo '<p>Hay un total de ' . $total_cuentas . ' cuentas por certificar. ¡Ponte a trabajar y revisa la cuentas!</p>';
            else :
                echo '<p><strong>¡Felicidades!</strong> No hay ninguna cuenta por certificar.</p>';
            endif;
            ?>
        </div>
        <?php
        if ($this->session->flashdata('msj')) :
            echo $this->session->flashdata('msj');
        endif;
        ?>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>Listado de cuentas por certificar
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tabla_certcuentas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Intentos</th>
                            <th>Últ. certificador</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        foreach ($cuentas as $lista) :
                            if ($lista->certificador == 0):
                                $ncert = '&#126;';
                            else :
                                $ncert = $this->certcuentas_model->nombre_certificador($lista->certificador);
                            endif;
                            ?>
                            <tr>
                                <td><?php echo $lista->CertificarID; ?></td>
                                <td><?php echo $this->general_library->NombreReal($lista->Nombre); ?></td>
                                <td><?php echo $lista->fecha; ?></td>
                                <td><?php echo $lista->int_cert; ?></td>
                                <td><?php echo $this->general_library->NombreReal($ncert); ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>certificar/cuentas/ver/<?php echo $lista->CertificarID; ?>" class="btn green btn-xs tooltips ver" data-placement="top" data-original-title="Ver"><i class="fa fa-eye"></i> Ver</a>
                                </td>
                            </tr><?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>