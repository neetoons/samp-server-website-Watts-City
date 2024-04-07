<div class="row">
    <div class="col-md-12"><?php foreach ($detalles as $ju):
    $facc = explode(',', $ju->Faccion);
   ?>
	<div class="portlet box blue">
	    <div class="portlet-title">
		<div class="caption">
		    <i class="fa fa-edit"></i>Editar miembro - <?php echo $ju->Nombre; ?>
		</div>
	    </div>
	    <div class="portlet-body form">
		<form action="<?php echo base_url(); ?>administrar/facciones/editar_miembro/validar_edicion" class="form-horizontal" method="post">
		    <div class="form-body">
			<div class="form-group">
			    <label class="control-label col-md-3">ID personaje</label>
			    <div class="col-md-9">
				<input type="text" class="form-control" id="id_jugador" name="id_jugador" value="<?php echo $ju->id; ?>" required readonly>
				<input type="hidden" class="form-control" id="id_faccion" name="id_faccion" value="<?php echo $facc[1]; ?>" required readonly>
			    </div>
			</div>
			<div class="form-group">
			    <label class="control-label col-md-3">Nombre</label>
			    <div class="col-md-9">
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $ju->Nombre; ?>" required readonly>
			    </div>
			</div>
			</div>
			<div class="form-group">
			    <label class="control-label col-md-3">Rango</label>
			    <div class="col-md-9">
				<select class="form-control" id="rango" name="rango" required><?php
				    foreach ($faccion as $fac) :
					if($fac->Rango1 != NULL) { ?>
					    <option value="1" <?php if($facc[2] == 1) { echo 'selected'; }?>><?php echo $fac->Rango1; ?></option><?php
					}
					if($fac->Rango2 != NULL) { ?>
					    <option value="2" <?php if($facc[2] == 2) { echo 'selected'; }?>><?php echo $fac->Rango2; ?></option><?php
					}
					if($fac->Rango3 != NULL) { ?>
					    <option value="3" <?php if($facc[2] == 3) { echo 'selected'; }?>><?php echo $fac->Rango3; ?></option><?php
					}
					if($fac->Rango4 != NULL) { ?> 
					    <option value="4" <?php if($facc[2] == 4) { echo 'selected'; }?>><?php echo $fac->Rango4; ?></option><?php 
					}
					if($fac->Rango5 != NULL) { ?>
					    <option value="5" <?php if($facc[2] == 5) { echo 'selected'; }?>><?php echo $fac->Rango5; ?></option><?php
					}
					if($fac->Rango6 != NULL) { ?>
					    <option value="6" <?php if($facc[2] == 6) { echo 'selected'; }?>><?php echo $fac->Rango6; ?></option><?php
					}
					if($fac->Rango7 != NULL) { ?>
					    <option value="7" <?php if($facc[2] == 7) { echo 'selected'; }?>><?php echo $fac->Rango7; ?></option><?php
					}
					if($fac->Rango8 != NULL) { ?>
					    <option value="8" <?php if($facc[2] == 8) { echo 'selected'; }?>><?php echo $fac->Rango8; ?></option><?php
					}
				    endforeach; ?>
				</select>
			    </div>
			</div>
		    </div>
		    <div class="form-actions fluid">
			<div class="col-md-offset-3 col-md-9">
			    <button type="submit" class="btn green">Actualizar datos</button>
			</div>
		    </div>
		</form>
	    </div>
	</div><?php endforeach; ?>
    </div>
</div>
