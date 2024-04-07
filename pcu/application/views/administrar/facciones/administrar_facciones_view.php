<!-- INICIO ROW-->
<div class="row">
    <!-- INICIO ESTADISTICAS -->
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $facciones_total; ?></div>
                <div class="desc">Facciones totales</div>
            </div>
            <a class="more" href=""> Ver más <i class="m-icon-swapright m-icon-white"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="fa fa-check"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $facciones_activas; ?></div>
                <div class="desc">Facciones activas</div>
            </div>
            <a class="more" href=""> Ver más <i class="m-icon-swapright m-icon-white"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat yellow">
            <div class="visual">
                <i class="fa fa-exclamation"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $facciones_desactivas; ?></div>
                <div class="desc">Facciones desactivadas</div>
            </div>
            <a class="more" href=""> Ver más <i class="m-icon-swapright m-icon-white"></i></a>
        </div>
    </div>
    <!-- FIN ESTADISTICAS -->

    <!-- INICIO TABLA PREGUNTAS -->
    <div class="col-md-12">
    <?php
        if ($this->session->flashdata('msj')) :
            echo $this->session->flashdata('msj');
        endif;
        ?>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>Listado de facciones del servidor
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?php echo base_url(); ?>administrar/facciones/crear" role="button" data-placement="top" data-original-title="Crear facción" class="btn green">Crear facción <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="tabla_facciones">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Miembros</th>
                            <th>Líder</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody><?php 
                        foreach ($facciones as $row) : 
                            if($row->id == 0) { continue; }
                            if($row->Lider == 0) { $nombre = 'Ninguno'; }
                            else { $nombre = $this->general_library->NombreReal($this->general_library->obtener_nombre($row->Lider)); } ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->Nombre; ?></td>
                                <td><?php echo $this->admfacs_model->contar_miembros($row->id); ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php if($row->tipo == 0) { echo 'Legal'; } else { echo 'Ilegal'; } ?></td>
                                <td><?php if ($row->estado == 0) { ?>
                                    <button class="btn default btn-xs green">Activada</button><?php
                                } else { ?>
                                    <button class="btn default btn-xs yellow">Desactivada</button><?php 
                                } ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>administrar/facciones/ver/<?php echo $row->id; ?>" class="btn default btn-xs tooltips" role="button" data-placement="top" data-original-title="Ver detalles"><i class="fa fa-eye"></i> Ver detalles</a>
                                </td>
                            </tr><?php 
                        endforeach; ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- FIN TABLA PREGUNTAS -->
</div>
<!-- FIN ROW -->