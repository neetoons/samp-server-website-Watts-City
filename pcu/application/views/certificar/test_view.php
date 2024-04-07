<!-- INICIO ROW-->
<div class="row">
    <!-- INICIO ESTADISTICAS -->
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"><?php echo $total_preguntas; ?></div>
                <div class="desc">Preguntas totales</div>
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
                <div class="desc">Preguntas activadas</div>
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
                <div class="number"><?php echo $total_desactivadas; ?></div>
                <div class="desc">Preguntas desactivadas</div>
            </div>
            <a class="more" href=""> Ver más <i class="m-icon-swapright m-icon-white"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="fa fa-eye"></i>
            </div>
            <div class="details">
                <div class="number">10</div>
                <div class="desc">Preguntas a mostrar</div>
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
                    <i class="fa fa-cogs"></i>Listado de preguntas test para el proceso de certificación
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="btn-group">
                        <a href="<?php echo base_url(); ?>certificar/gestionar/test/crear" role="button" data-placement="top" data-original-title="Añadir pregunta" class="btn green">Añadir pregunta <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="tabla_preguntas_test">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                            <th>Autor</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody><?php foreach ($preguntas as $preg) : ?>
                            <tr>
                                <td><?php echo $preg->TestID; ?></td>
                                <td>
                                    <?php echo $this->general_library->RecortarTexto($preg->pregunta); ?>
                                    <input type="hidden" id="textot<?php echo $preg->TestID; ?>" name="textot<?php echo $preg->TestID; ?>" value="<?php echo $preg->pregunta; ?>" />
                                    <input type="hidden" id="pa<?php echo $preg->TestID; ?>" name="pa<?php echo $preg->TestID; ?>" value="<?php echo $preg->A; ?>" />
                                    <input type="hidden" id="pb<?php echo $preg->TestID; ?>" name="pb<?php echo $preg->TestID; ?>" value="<?php echo $preg->B; ?>" />
                                    <input type="hidden" id="pc<?php echo $preg->TestID; ?>" name="pc<?php echo $preg->TestID; ?>" value="<?php echo $preg->C; ?>" />
                                    <input type="hidden" id="pd<?php echo $preg->TestID; ?>" name="pd<?php echo $preg->TestID; ?>" value="<?php echo $preg->D; ?>" />
                                </td>
                                <td><?php echo $preg->resultado; ?></td>
                                <td><?php echo $this->general_library->NombreReal($preg->Nombre); ?></td>
                                <td><?php if ($preg->estado == 0) { ?>
                                        <button class="btn default btn-xs green estado_test">Activada</button><?php
                                    } else {
                                        ?><button class="btn default btn-xs yellow estado_test">Desactivada</button><?php }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>certificar/gestionar/test/editar/<?php echo $preg->TestID; ?>" class="btn default btn-xs tooltips editar_test" role="button" data-toggle="modal" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i> Editar</a>
                                    <a href="<?php echo base_url(); ?>certificar/gestionar/test/eliminar/<?php echo $preg->TestID; ?>" class="btn default btn-xs red tooltips" data-placement="top" data-original-title="Eliminar" id="eliminarpreg_test"><i class="fa fa-times"></i> Eliminar</a>
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