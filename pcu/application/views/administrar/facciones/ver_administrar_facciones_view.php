<div class="row">
    <div class="col-md-12">
	 <?php
        if ($this->session->flashdata('msj')) :
            echo $this->session->flashdata('msj');
        endif;
        ?>
        <div class="portlet-body form">
            <div class="tabbable-custom ">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#informacion" data-toggle="tab">Información</a></li>
                    <li><a href="#miembros" data-toggle="tab">Miembros</a></li>
                    <li><a href="#editar" data-toggle="tab">Editar facción</a></li>
                </ul>
                <div class="tab-content"><?php
                    foreach ($detalle as $row) : 
                        if($row->Lider == 0) { $lider = 'Ninguno'; }
                        else { $lider = $this->general_library->NombreReal($this->general_library->obtener_nombre($row->Lider)); } ?>
                        <div class="tab-pane active" id="informacion">
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20">Facción - <?php echo $row->Nombre; ?></h2>
                                    <h3 class="form-section">Inforrmación general</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">ID:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $row->id; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nombre:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $row->Nombre; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tipo:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->general_library->obtener_tipofaccion($row->tipo); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Líder:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $lider; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Miembros:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php echo $this->admfacs_model->contar_miembros($row->id); ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Estado:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"><?php 
                                                        if ($row->estado == 0) { ?>
                                                            <button class="btn default btn-xs green">Activada</button><?php
                                                        } else { ?>
                                                            <button class="btn default btn-xs yellow">Desactivada</button><?php 
                                                        } ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="form-section">Rangos y sueldos</h3>
                                    <div class="row">
                                        <div class="col-md-6"><?php
                                            if($row->Rango1 != '') { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Rango 1:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row->Rango1.' - '.$row->Sueldo1; ?>$</p>
                                                    </div>
                                                </div><?php
                                            }
                                            if($row->Rango2 != '') { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Rango 2:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row->Rango2.' - '.$row->Sueldo2; ?>$</p>
                                                    </div>
                                                </div><?php
                                            }
                                            if($row->Rango3 != '') { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Rango 3:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row->Rango3.' - '.$row->Sueldo3; ?>$</p>
                                                    </div>
                                                </div><?php
                                            }
                                            if($row->Rango4 != '') { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Rango 4:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row->Rango4.' - '.$row->Sueldo4; ?>$</p>
                                                    </div>
                                                </div><?php
                                            }
                                            if($row->Rango5 != '') { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Rango 5:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row->Rango5.' - '.$row->Sueldo5; ?>$</p>
                                                    </div>
                                                </div><?php
                                            }
                                            if($row->Rango6 != '') { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Rango 6:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row->Rango6.' - '.$row->Sueldo6; ?>$</p>
                                                    </div>
                                                </div><?php
                                            }
                                            if($row->Rango7 != '') { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Rango 7:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row->Rango7.' - '.$row->Sueldo7; ?>$</p>
                                                    </div>
                                                </div><?php
                                            }
                                            if($row->Rango8 != '') { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Rango 8:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $row->Rango8.' - '.$row->Sueldo8; ?>$</p>
                                                    </div>
                                                </div><?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="miembros">
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
                                                    <th>Nombre</th>
                                                    <th>Skin</th>
                                                    <th>Rango</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php
                                                foreach($miembros as $ju): 
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
                                                    }?>
                                                    <tr>
                                                        <td><?php echo $ju->id; ?></td>
                                                        <td><?php echo $this->general_library->NombreReal($ju->Nombre); ?></td>
                                                        <td><img src="<?php echo base_url(); ?>assets/img/skins/Skin_<?php echo $ju->Uniforme; ?>.png"></td>
                                                        <td><?php echo $rango.' ('.$fac[2].')'; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url(); ?>administrar/facciones/<?php echo $row->id; ?>/editar_miembro/<?php echo $ju->id; ?>" class="btn default btn-xs tooltips" role="button" data-placement="top" data-original-title="Editar miembro"><i class="fa fa-edit"></i> Editar</a>
                                                            <a href="<?php echo base_url(); ?>administrar/facciones/<?php echo $row->id; ?>/expulsar_miembro/<?php echo $ju->id; ?>" class="btn red btn-xs tooltips" role="button" data-placement="top" data-original-title="Expulsar miembro"><i class="fa fa-rocket"></i> Expulsar</a>
                                                        </td>
                                                    </tr><?php
                                                endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
			    <div class="portlet box red">
				<div class="portlet-title">
                                    <div class="caption">
					<i class="fa fa-plus"></i>Agregar miembro
                                    </div>
				</div>
                                <div class="portlet-body form">
				    <form action="<?php echo base_url(); ?>administrar/facciones/agregar_miembro" class="form-horizontal" method="post">
					<div class="form-body">
					    <div class="form-group">
						<label class="control-label col-md-3">Nombre</label>
						<div class="col-md-9">
						    <input type="text" class="form-control" id="nombre_ju" name="nombre_ju" placeholder="Nombre_Apellido" autocomplete="off" required>
						    <input type="hidden" class="form-control" id="id_faccion_ju" name="id_faccion_ju" value="<?php echo $row->id; ?>">
						</div>
					    </div>
					    <div class="form-group">
						<label class="control-label col-md-3">Rango</label>
						<div class="col-md-9">
						    <select class="form-control" id="rango_ju" name="rango_ju" required>
							<option value=""></option><?php
							if($row->Rango1 != NULL) { ?>
							    <option value="1"><?php echo $row->Rango1; ?></option><?php
							}
							if($row->Rango2 != NULL) { ?>
							    <option value="2"><?php echo $row->Rango2; ?></option><?php
							}
							if($row->Rango3 != NULL) { ?>
							    <option value="3"><?php echo $row->Rango3; ?></option><?php
							}
							if($row->Rango4 != NULL) { ?> 
							    <option value="4"><?php echo $row->Rango4; ?></option><?php 
							}
							if($row->Rango5 != NULL) { ?>
							    <option value="5"><?php echo $row->Rango5; ?></option><?php
							}
							if($row->Rango6 != NULL) { ?>
							    <option value="6"><?php echo $row->Rango6; ?></option><?php
							}
							if($row->Rango7 != NULL) { ?>
							    <option value="7"><?php echo $row->Rango7; ?></option><?php
							}
							if($row->Rango8 != NULL) { ?>
							    <option value="8"><?php echo $row->Rango8; ?></option><?php
							} ?>
						    </select>
						</div>
					    </div>
					</div>
					<div class="form-actions fluid">
					    <div class="col-md-offset-3 col-md-9">
						<button type="submit" class="btn green">Agregar miembro</button>
					    </div>
					</div>
				    </form>
				</div>
			    </div>
                        </div>
                        <div class="tab-pane" id="editar">
                            <div class="alert alert-warning">
                                <span class="fa fa-warning margin-right-10"></span> <strong>¡Atención!</strong> Para eliminar un rango basta con dejar el nombre del rango y su sueldo en blanco.
                            </div>
                            <div class="portlet box blue">
				<div class="portlet-title">
                                    <div class="caption"><i class="fa fa-reorder"></i>Editar facción - <?php echo $row->Nombre; ?></div>
				</div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>administrar/facciones/validar_edicion" method="post">
                                        <div class="form-body">
                                            <h3 class="form-section">Información general</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">ID</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="id_faccion" name="id_faccion" value="<?php echo $row->id; ?>" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Nombre</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row->Nombre; ?>" required autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Tipo</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="tipo" name="tipo" required>
                                                                <option value="0" <?php if($row->tipo == 0) { echo 'selected'; } ?>>Legal</option>
                                                                <option value="1" <?php if($row->tipo == 1) { echo 'selected'; } ?>>Ilegal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Líder</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="lider" name="lider" value="<?php echo $row->Lider; ?>" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Estado</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="estado" name="estado" required>
                                                                <option value="0" <?php if($row->estado == 0) { echo 'selected'; } ?>>Activa</option>
                                                                <option value="1" <?php if($row->estado == 1) { echo 'selected'; } ?>>Desactiva</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="form-section">Rangos y sueldos</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rango 1</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="rango1" name="rango1" value="<?php echo $row->Rango1; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rango 2</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="rango2" name="rango2" value="<?php echo $row->Rango2; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rango 3</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="rango3" name="rango3" value="<?php echo $row->Rango3; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rango 4</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="rango4" name="rango4" value="<?php echo $row->Rango4; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rango 5</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="rango5" name="rango5" value="<?php echo $row->Rango5; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rango 6</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="rango6" name="rango6" value="<?php echo $row->Rango6; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rango 7</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="rango7" name="rango7" value="<?php echo $row->Rango7; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Rango 8</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="rango8" name="rango8" value="<?php echo $row->Rango8; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sueldo 1</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="sueldo1" name="sueldo1" value="<?php echo $row->Sueldo1; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sueldo 2</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="sueldo2" name="sueldo2" value="<?php echo $row->Sueldo2; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sueldo 3</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="sueldo3" name="sueldo3" value="<?php echo $row->Sueldo3; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sueldo 4</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="sueldo4" name="sueldo4" value="<?php echo $row->Sueldo4; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sueldo 5</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="sueldo5" name="sueldo5" value="<?php echo $row->Sueldo5; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sueldo 6</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="sueldo6" name="sueldo6" value="<?php echo $row->Sueldo6; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sueldo 7</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="sueldo7" name="sueldo7" value="<?php echo $row->Sueldo7; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sueldo 8</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="sueldo8" name="sueldo8" value="<?php echo $row->Sueldo8; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn green">Actualizar facción</button>
                                                        <a href="<?php echo base_url(); ?>administrar/facciones" role="button" class="btn default">Cancelar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><?php
                    endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>