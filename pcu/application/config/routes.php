<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = "home";
$route['404_override'] = '';

$route['logout'] = '/home/logout';
$route['recuperar/clave'] = '/login/recuperar_clave';
$route['confirmar/recuperarclave/(.*)/(.*)'] = '/login/confirmar_reclave/$1/$2';
$route['registro'] = 'login/registro';
$route['confirmar/correo/(.*)'] = 'login/confirmar_correo/$1';
$route['mipersonaje'] = 'mipersonaje';
$route['editar/mipersonaje'] = 'mipersonaje/editar';
$route['editar/mipersonaje/validar_edicion'] = 'mipersonaje/validar_edicion';
$route['buscar/personaje'] = 'perfil/buscar_personaje';
$route['perfil/(.*)'] = 'perfil/ver/$1';
$route['mifaccion'] = 'mifaccion/listar_miembros';
$route['mifaccion/editar_miembro/(:num)'] = 'mifaccion/lid_editar_miembro/$1';

$route['micuenta/(.*)'] = 'micuenta';
$route['micuenta/validar_cambiar_clave'] = 'micuenta/validar_cambiar_clave';
$route['micuenta/validar_cambiar_email'] = 'micuenta/validar_cambiar_email';

$route['certificar/test'] = 'certificacionusuario/test';
$route['certificar/test/validar_etest'] = 'certificacionusuario/validar_test';
$route['certificar/cuenta'] = 'certificacionusuario/desarrollo';
$route['certificar/cuenta/validar_edicion_personaje'] = 'certificacionusuario/configurar_personaje';
$route['certificar/cuenta/validar_certificacion'] = 'certificacionusuario/validar_certificacion';
$route['certificar/cuenta/validar_cambio_nombre'] = 'certificacionusuario/validar_cambio_nombre';
$route['certificar/cuenta/validar_responder_certificacion'] = 'certificacionusuario/validar_responder_certificacion';
$route['certificar/cuenta/editar/personaje'] = 'certificacionusuario/vereditar_personaje';
$route['certificar/cuenta/editar/personaje/validar_editpers'] = 'certificacionusuario/validar_editpers';

$route['certificar/gestionar/test'] = 'certificartest/test';
$route['certificar/gestionar/test/editar/(:num)'] = 'certificartest/editar_test/$1';
$route['certificar/gestionar/test/validar_edicion'] = 'certificartest/guardar_test';
$route['certificar/gestionar/test/crear'] = 'certificartest/vercrear_test';
$route['certificar/gestionar/test/validar_creacion'] = 'certificartest/crear_test';
$route['certificar/gestionar/test/eliminar/(:num)'] = 'certificartest/eliminar_test/$1';

$route['certificar/gestionar/desarrollo'] = 'certificarpreguntas/listar_preguntas';
$route['certificar/gestionar/desarrollo/editar/(:num)'] = 'certificarpreguntas/detalle_pregunta/$1';
$route['certificar/gestionar/desarrollo/validar_edicion'] = 'certificarpreguntas/guardar_pregunta';
$route['certificar/gestionar/desarrollo/crear'] = 'certificarpreguntas/vercrear_pregunta';
$route['certificar/gestionar/desarrollo/validar_creacion'] = 'certificarpreguntas/crear_pregunta';
$route['certificar/gestionar/desarrollo/eliminar/(:num)'] = 'certificarpreguntas/eliminar_pregunta/$1';

$route['certificar/cuentas'] = 'certificarcuentas/listar_cuentas';
$route['certificar/cuentas/ver/(:num)'] = 'certificarcuentas/ver_cuenta/$1';
$route['certificar/cuentas/validar_respuesta'] = 'certificarcuentas/validar_respuesta';

$route['administrar/skins'] = 'administrar_skins/listar_skins';
$route['administrar/skins/crear'] = 'administrar_skins/añadir_skin';
$route['administrar/skins/crear/validar_creacion'] = 'administrar_skins/validar_addskin';
$route['administrar/skins/editar/(:num)'] = 'administrar_skins/editar_skin/$1';
$route['administrar/skins/editar/validar_edicion'] = 'administrar_skins/guardar_skin';
$route['administrar/skins/eliminar/(:num)'] = 'administrar_skins/eliminar_skin/$1';

$route['administrar/skinsfaccion'] = 'administrar_skinsfaccion/listar_skins';
$route['administrar/skinsfaccion/crear'] = 'administrar_skinsfaccion/añadir_skin';
$route['administrar/skinsfaccion/crear/validar_creacion'] = 'administrar_skinsfaccion/validar_addskin';
$route['administrar/skinsfaccion/editar/(:num)'] = 'administrar_skinsfaccion/editar_skin/$1';
$route['administrar/skinsfaccion/editar/validar_edicion'] = 'administrar_skinsfaccion/guardar_skin';
$route['administrar/skinsfaccion/eliminar/(:num)'] = 'administrar_skinsfaccion/eliminar_skin/$1';

$route['administrar/cuentas'] = 'administrar_cuentas/listar_cuentas';
$route['administrar/cuentas/ver/(.*)'] = 'administrar_cuentas/ver_cuenta/$1';
$route['administrar/cuentas/editar/(.*)'] = 'administrar_cuentas/editar_cuenta/$1';
$route['administrar/cuentas/editar/validar_edicion'] = 'administrar_cuentas/validar_edicion';
$route['administrar/cuentasbloqueadas'] = 'administrar_cuentasbloqueadas/listar_cuentasbloqueadas';

$route['administrar/facciones'] = 'administrar_facciones/listar_facciones';
$route['administrar/facciones/ver/(:num)'] = 'administrar_facciones/ver_faccion/$1';
$route['administrar/facciones/validar_edicion'] = 'administrar_facciones/validar_edicion';
$route['administrar/facciones/(:num)/editar_miembro/(:num)'] = 'administrar_facciones/editar_miembro/$1/$2';
$route['administrar/facciones/editar_miembro/validar_edicion'] = 'administrar_facciones/guardar_miembro';
$route['administrar/facciones/(:num)/expulsar_miembro/(:num)'] = 'administrar_facciones/expulsar_miembro/$1/$2';
$route['administrar/facciones/agregar_miembro'] = 'administrar_facciones/agregar_miembro';

$route['cambiar/ropa-usual'] = 'skins/ropa_usual';
$route['cambiar/ropa-usual/validar_cropa'] = 'skins/validar_cropa';
$route['cambiar/ropa-trabajo'] = 'skins/ropa_trabajo';
$route['cambiar/ropa-trabajo/validar_jobcropa'] = 'skins/validar_jobcropa';

$route['historial/cambiosdenombre'] = 'historiales/cambiosdenombre';
$route['historial/expulsados'] = 'historiales/expulsados';
$route['historial/accesos'] = 'historiales/accesos';

/* End of file routes.php */
/* Location: ./application/config/routes.php */