<div class="row">
    <div class="col-md-12">
        <?php
        if ($this->session->flashdata('msj')) :
            echo $this->session->flashdata('msj');
        endif;
        foreach ($detalle as $row):
            ?>
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list"></i>Lista de miembros
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabla_miembrosfac">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th><?php
                                    if($this->session->userdata('faccion') >= 1 && $this->session->userdata('faccion') <= 4 || $this->session->userdata('faccion') == 6) {
                                    echo '<th></th>'; } ?>
                                    <th>Rango</th>
                                </tr>
                            </thead>
                            <tbody><?php
                                foreach ($miembros as $ju):
                                    $fac = explode(',', $ju->Faccion);
                                    switch ($fac[2]) {
                                        case 1:
                                            $rango = $row->Rango1;
                                            break;
                                        case 2:
                                            $rango = $row->Rango2;
                                            break;
                                        case 3:
                                            $rango = $row->Rango3;
                                            break;
                                        case 4:
                                            $rango = $row->Rango4;
                                            break;
                                        case 5:
                                            $rango = $row->Rango5;
                                            break;
                                        case 6:
                                            $rango = $row->Rango6;
                                            break;
                                        case 7:
                                            $rango = $row->Rango7;
                                            break;
                                        case 8:
                                            $rango = $row->Rango8;
                                            break;

                                        default:
                                            break;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $ju->id; ?></td>
                                        <td><?php echo $this->general_library->NombreReal($ju->Nombre); ?></td><?php
                                        if($this->session->userdata('faccion') >= 1 && $this->session->userdata('faccion') <= 4 || $this->session->userdata('faccion') == 6) {
                                        echo '<td></td>'; } ?>
                                        <td><?php echo $rango . ' (' . $fac[2] . ')'; ?></td>
                                    </tr><?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><?php endforeach; ?>
    </div>
</div>