<!-- INICIO ROW-->
<div class="row">
    <!-- INICIO ESTADISTICAS -->
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $skins_total; ?></div>
                <div class="desc">Skins totales</div>
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
                <div class="number"><?php echo $skins_activas; ?></div>
                <div class="desc">Skins activas</div>
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
                <div class="number"><?php echo $skins_desactivas; ?></div>
                <div class="desc">Skins desactivadas</div>
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
                    <i class="fa fa-list"></i>Listado de skins
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?php echo base_url(); ?>administrar/skins/crear" role="button" data-placement="top" data-original-title="Añadir skin" class="btn green">Añadir skin <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="tabla_skins">
                    <thead>
                        <tr>
                            <th>ID Skin</th>
                            <th>Sexo</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody><?php foreach ($resultados as $row) : ?>
                            <tr>
                                <td><?php echo $row->SkinID; ?></td>
                                <td><?php
        if ($row->sexo == 0)
            echo '<i class="fa fa-male"></i>';
        else
            echo '<i class="fa fa-female"></i>';
        ?>
                                </td>
                                <td><?php if ($row->estado == 0) { ?>
                                        <button class="btn default btn-xs green estado_skin">Activado</button><?php
                                } else {
            ?>
                                        <button class="btn default btn-xs yellow estado_skin">Desactivado</button><?php }
                            ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>administrar/skins/editar/<?php echo $row->SkinID; ?>" class="btn default btn-xs tooltips editar_skin" role="button" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i> Editar</a>
                                    <a href="<?php echo base_url(); ?>administrar/skins/eliminar/<?php echo $row->SkinID; ?>" class="btn default btn-xs red tooltips" data-placement="top" data-original-title="Eliminar" id="eliminarskin"><i class="fa fa-times"></i> Eliminar</a>
                                </td>
                            </tr><?php endforeach; ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- FIN TABLA PREGUNTAS -->
</div>
<!-- FIN ROW -->