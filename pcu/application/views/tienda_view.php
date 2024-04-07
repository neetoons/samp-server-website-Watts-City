<!-- INICIO ROW -->
<div class="row profile">
    <div class="col-md-12">
        <!-- INICIO TABS -->
        <div class="tabbable tabbable-custom tabbable-full-width">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#miperfil" data-toggle="tab">Tienda</a></li>
                <!--<li><a href="#accesos" data-toggle="tab">Comprar VIP</a></li>-->
                <li><a href="#accesos" data-toggle="tab"></a></li>
            </ul>
            <div class="tab-content">
                <!-- INICIO - TAB - MI PERFIL -->
                <div class="tab-pane active" id="miperfil">
                    <div class="row">
                        <!-- INICIO MENU IZ -->
                        <div class="col-md-3">
                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                <li><img src="<?php echo base_url(); ?>assets/img/tienda.png" class="img-responsive" alt=""/></li>
                                <li class="active"><a data-toggle="tab" href="#tab_info"><i class="fa fa-info"></i>Información</a></li>
                                <li><a data-toggle="tab" href="#comprar_paysafecard"><i class="fa fa-check"></i>Comprar vía Paysafecard</a></li>
                                <li><a data-toggle="tab" href="#comprar_paypal"><i class="fa fa-check"></i>Comprar vía PayPal</a></li>
                            </ul>
                        </div>
                        <!-- FIN MENU IZ -->
                        <!-- INICIO COL-MD-9 -->
                        <div class="col-md-9">
                            <div class="tab-content">
                                <!-- INICIO - TAB - INFO -->
                                <div id="tab_info" class="tab-pane profile-classic row-fluid active">
                                    <ul class="unstyled"><?php
                                        foreach ($resultados as $row) {
                                            ?>
                                            <div class="note note-info">
                                            <h4 class="block"><strong>¡Información!</strong></h4>
                                            <p>En la tienda puedes comprar WC Coins los cuales te servirán para comprar una membresía VIP o diversos items exclusivos, comprando en la Tienda ayudas a mantener los gastos del servidor.</p>
                                            </div>
                                            <li><strong>ID de la cuenta:</strong> <?php echo $this->session->userdata('UsuarioID'); ?></li>
                                            <li><strong>Nombre:</strong> <?php echo $this->general_library->NombreReal($this->session->userdata('nombre')); ?></li>
                                            <li><strong>Correo electrónico:</strong> <?php echo $row->email; ?></li>
                                            <?php if ($this->session->userdata('admin') > 0) { ?>
                                                <li><strong></strong> </li> 
                                                    <?php { ?>
                                                    <li><strong></strong> </li><?php
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- FIN - TAB - INFO -->
                                <!-- INICIO - TAB - CPASS -->
                                <div id="comprar_paysafecard" class="tab-pane">
                                    <?php
                                    if ($this->session->flashdata('msj')) :
                                        echo $this->session->flashdata('msj');
                                    endif; ?>
                                    <div class="note note-info">
                                        <h4 class="block"><strong>¡Forma de pago deshabilitada!</strong></h4>
                                        <p><b>Forma de pago deshabilitada temporalmente</b>.</p>
                                    </div>
                                    <form id="form-cclave" name="form-cclave" action="<?php echo base_url(); ?>tienda/validar_cambiar_clave" method="post">
                                        <div class="form-group">
                                        <i class="fa fa-credit-card"></i>
                                            <label class="control-label">Método de pago: Paysafecard (Prepago)</label>
                                        </div>
                                            <div class="form-group">
                                            <label class="control-label">Código del cupón</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-info"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Introduce el código de 16 dígitos que se encuentra en el cupón" id="paiscupon" name="paiscupon" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">País del cupón</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-info"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Introduce el país donde el cupón fue comprado" id="paiscupon" name="paiscupon" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Valor (En dólares)</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Ingrese el valor del cupón en dólares (USD)" id="renueva_clave" name="renueva_clave" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn green" id="validar_cclave" name="validar_cclave" data-loading-text="Enviando pago">Enviar pago</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- FIN - TAB - CPASS -->
                                <!-- INICIO - TAB - EMAIL -->
                                <div id="comprar_paypal" class="tab-pane">
                                    <?php
                                    if ($this->session->flashdata('msj')) :
                                        echo $this->session->flashdata('msj');
                                    endif; ?>
                                     <div class="note note-info">
                                        <h4 class="block"><strong>¡Forma de pago deshabilitada!</strong></h4>
                                        <p><b>Forma de pago deshabilitada temporalmente.</b>.</p>
                                    </div>
                                    <div class="note note-info">
                                        <h4 class="block"><strong>¡Información!</strong></h4>
                                        <p>El proceso es sencillo, primero debes eviar el pago seleccionado la cantidad de WC Coins a comprar, luego de que el pago se haya enviado debes volver a esta sección y colocar el mail asociado a tu cuenta de PayPal. <b>Nota:</b> El pago se debe enviar <b>antes</b> de colocar tu mail asociado a PayPal y no es necesario luego de enviar el pago, apurarse a enviar el mail, se puede enviar con un lapso de <b>3 horas</b>.</p>
                                    </div>

                                    <center><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="RQKE6P7BJCCX4">
                                    <table>
                                    <tr><td><input type="hidden" name="on0" value="Coins - Watts City">Coins - Watts City</td></tr><tr><td><select name="os0">
                                        <option value="10 WC Coins">10 WC Coins $5.00 USD</option>
                                        <option value="30 WC Coins">30 WC Coins $15.00 USD</option>
                                        <option value="55 WC Coins">55 WC Coins $25.00 USD</option>
                                        <option value="110 WC Coins">110 WC Coins $50.00 USD</option>
                                    </select> </td></tr>
                                    </table>
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                                    </form></center>

                                    <form id="form-cemail" name="form-cemail" action="<?php echo base_url(); ?>tienda/validar_comprar_paypal" method="post">
                                        <div class="form-group">
                                            <label class="control-label">Dirección de correo electrónico:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                                <input type="email" class="form-control" placeholder="Introduce la dirección de correo electrónico asociada a tu cuenta de PayPal" id="emailpaypal" name="emailpaypal" autocomplete="off" >
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn green" id="validar_cemail" name="validar_cmail" data-loading-text="Enviando...">Enviar email</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- FIN - TAB - EMAIL -->
                            </div>
                        </div>
                        <!-- FIN COL-MD-9 -->
                    </div>
                </div>
                <!-- FIN - TAB - MI PERFIL -->

                <!-- INICIO - TAB - ACCESSOS -->
                <div class="tab-pane" id="accesos">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- INICIO INFO -->
                            <div class="note note-info">
                                <h4 class="block"><strong>¡Información!</strong></h4>
                                <p>En este apartado podrás vigilar tus conexiones al servidor, ya que se muestran tus últimos 60 accesos al juego.</p>
                            </div>
                            <!-- FIN INFO -->

                            <!-- INICIO TABLA ACCESSOS -->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="fa fa-gamepad"></i>Historial de compras</div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="tabla_accesos">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID Compra</th>
                                                <th>Fecha</th>
                                                <th>Compra</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                        $i = 0;
                                        foreach ($accesos as $acc) :
                                            $i++;?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $acc->id; ?></td>
                                                <td><?php echo $acc->Fecha; ?></td>
                                                <td><?php echo $acc->Ip; ?></td>
                                            </tr><?php
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- FIN TABLA ACCESSOS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN TABS -->
    </div>
</div>
<!-- FIN ROW -->