<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class General_library {

    //Obtenemos el nombre del jugador
    public function obtener_nombre($id) {
        $CI = & get_instance();
        $CI->load->model('general_model');
        return $CI->general_model->obtener_nombre($id);
    }
    
    //Comprobar si el jugador esta jugando
    public function jugando($id_jugador) {
        $CI = & get_instance();
        $CI->load->model('general_model');
        return $CI->general_model->jugando($id_jugador);
    }
    
    //Comprobar si existe actualizacion
    public function comprobar_actualizaciones($valor, $tipo) {
        $CI = & get_instance();
        $CI->load->model('general_model');
        return $CI->general_model->comprobar_actualizaciones($valor, $tipo);
    }

    //Comprobar si esta logeado
    public function comprobar_login() {
        $CI = & get_instance();
        $CI->load->library('session');
        $CI->load->library('input');
        if (!$CI->session->userdata('logged_in')) {
            //No esta logeado lo enviamos a que se logee
            redirect('login');
        }
        if ($CI->input->server('REQUEST_URI') != '/logout') {
            if ($CI->session->userdata('certificar_test') && $CI->uri->segment(2) != 'test') {
                redirect('certificar/test');
            }
            if ($CI->session->userdata('certificar_cuenta') && $CI->uri->segment(2) != 'cuenta') {
                redirect('certificar/cuenta');
            }
        }
    }

    //Generar cadena aleatoria
    public function CadenaAleatoria($tam = 10, $let = true, $nums = true, $esp = false) {
        $source = 'abcdefghijklmnopqrstuvwxyz';
        if ($let == 1) {
            $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($nums == 1) {
            $source .= '1234567890';
        }
        if ($esp == 1) {
            $source .= '|@#~$%()=^*+[]{}-_';
        }
        if ($tam > 0) {
            $rstr = "";
            $source = str_split($source, 1);
            for ($i = 1; $i <= $tam; $i++) {
                mt_srand((double) microtime() * 1000000);
                $num = mt_rand(1, count($source));
                $rstr .= $source[$num - 1];
            }
        }
        return $rstr;
    }

    //Obtener fecha
    public function ObtenerFecha() {
        $mes = date("n");
        $mesArray = array(
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre"
        );
        $semana = date("D");
        $semanaArray = array(
            "Mon" => "Lunes",
            "Tue" => "Martes",
            "Wed" => "Miercoles",
            "Thu" => "Jueves",
            "Fri" => "Viernes",
            "Sat" => "Sábado",
            "Sun" => "Domingo"
        );
        $mesReturn = $mesArray[$mes];
        $semanaReturn = $semanaArray[$semana];
        $dia = date("d");
        $año = date("Y");
        return $semanaReturn . ", " . $dia . " de " . $mesReturn . " de " . $año;
    }

    //Retiramos la _ del nombre
    public function NombreReal($nombre) {
        $nombre_sin = str_replace("_", " ", $nombre);
        return $nombre_sin;
    }

    //Obtenemos el respeto del jugador
    public function ObtenerRespeto($nivel) {
        $respeto = ($nivel * 4) + 4;
        return $respeto;
    }

    // Recortar texto
    public function RecortarTexto($texto, $limite = 100) {
        $texto_r = trim($texto);
        $texto_f = strip_tags($texto_r);
        $tamano = strlen($texto_f);
        $resultado = '';
        if ($tamano <= $limite) {
            return $texto_f;
        } else {
            $texto = substr($texto_f, 0, $limite);
            $palabras = explode(' ', $texto);
            $resultado = implode(' ', $palabras);
            $resultado .= '...';
        }
        return $resultado;
    }

    //Obtenemos el nombre del sexo
    public function obtener_sexo($id) {
        if ($id == 0) {
            $nombre = 'Masculino';
        } else {
            $nombre = 'Femenino';
        }
        return $nombre;
    }

    //Obtenemos el nombre de la raza
    public function obtener_raza($id) {
        switch ($id) {
            case 1:
                $nombre = 'Afroamericano';
                break;
            case 2:
                $nombre = 'Norteamericano';
                break;
            case 3:
                $nombre = 'Europeo';
                break;
            case 4:
                $nombre = 'Latino';
                break;
            case 5:
                $nombre = 'Oriental';
                break;
            case 6:
                $nombre = 'Arabe';
                break;

            default:
                $nombre = 'Sin asignar';
                break;
        }
        return $nombre;
    }

    //Obtenemos el nombre del color de ojos
    public function obtener_color_ojos($id) {
        switch ($id) {
            case 0:
                $nombre = 'Negros';
                break;
            case 1:
                $nombre = 'Marrones';
                break;
            case 2:
                $nombre = 'Verdes';
                break;
            case 3:
                $nombre = 'Azules';
                break;
            case 4:
                $nombre = 'Otros';
                break;

            default:
                $nombre = 'Sin asignar';
                break;
        }
        return $nombre;
    }

    //Obtener nombre del color de pelo
    public function obtener_color_pelo($id) {
        switch ($id) {
            case 0:
                $nombre = 'Negro';
                break;
            case 1:
                $nombre = 'Marron';
                break;
            case 2:
                $nombre = 'Pelirojo';
                break;
            case 3:
                $nombre = 'Rubio';
                break;
            case 4:
                $nombre = 'Blanco';
                break;
            case 5:
                $nombre = 'Otros';
                break;

            default:
                $nombre = 'Sin asignar';
                break;
        }
        return $nombre;
    }

    //Obtener si lo tiene o no (bool)
    public function obtener_check($id) {
        if ($id > 0) {
            $resultado = '<img src="' . base_url() . 'assets/img/check.png">';
        } else {
            $resultado = '<img src="' . base_url() . 'assets/img/cross.png">';
        }
        return $resultado;
    }

    //Obtener el estado de la cuenta
    public function obtener_estado_cuenta($id) {
        switch ($id) {
            case 0:
                $nombre = '<span class="text-success">Activa</span>';
                break;
            case 1:
                $nombre = '<span class="text-danger">Cuenta baneada</span>';
                break;
            case 2:
                $nombre = '<span class="text-warning">Pendiente de confirmar el email</span>';
                break;
            case 3:
                $nombre = '<span class="text-warning">Pendiente a configurar el personaje</span>';
                break;
            case 4:
                $nombre = '<span class="text-info">Pendiente a configurar el personaje</span>';
                break;

            default:
                break;
        }
        return $nombre;
    }

    //Obtener si el dinero es positivo o negativo
    public function obtener_positivo($cantidad) {
        if ($cantidad > 0) {
            $nombre = '<span class="text-success">' . $cantidad . '$</span>';
        } else {
            $nombre = '<span class="text-danger">' . $cantidad . '$</span>';
        }
        return $nombre;
    }

    //Obtener estado de la llave del jugador
    public function obtener_estado_llave($id) {
        if ($id != -1) {
            $resultado = $id;
        } else {
            $resultado = '<img src="' . base_url() . 'assets/img/cross.png">';
        }
        return $resultado;
    }

    // Obtener nombre vehiculo
    public function obtener_nombreveh($id) {
        switch ($id) {
            case 400:
                $nombre = "Landstalker";
                break;
            case 401:
                $nombre = "Bravura";
                break;
            case 402:
                $nombre = "Buffalo";
                break;
            case 403:
                $nombre = "Linerunner";
                break;
            case 404:
                $nombre = "Perenniel";
                break;
            case 405:
                $nombre = "Sentinel";
                break;
            case 407:
                $nombre = "Bomberos";
                break;
            case 408:
                $nombre = "Basurero";
                break;
            case 409:
                $nombre = "Stretch";
                break;
            case 410:
                $nombre = "Manana";
                break;
            case 411:
                $nombre = "Infernus";
                break;
            case 412:
                $nombre = "Voodo";
                break;
            case 413:
                $nombre = "Pony";
                break;
            case 414:
                $nombre = "Mule";
                break;
            case 415:
                $nombre = "Cheetah";
                break;
            case 416:
                $nombre = "Ambulancia";
                break;
            case 417:
                $nombre = "Leviathan";
                break;
            case 418:
                $nombre = "Moonbeam";
                break;
            case 419:
                $nombre = "Esperanto";
                break;
            case 420:
                $nombre = "Taxi";
                break;
            case 421:
                $nombre = "Washington";
                break;
            case 422:
                $nombre = "Bobcat";
                break;
            case 423:
                $nombre = "Mr Whoopee";
                break;
            case 424:
                $nombre = "BF Injection";
                break;
            case 425:
                $nombre = "Hunter";
                break;
            case 426:
                $nombre = "Premier";
                break;
            case 427:
                $nombre = "Enforcer";
                break;
            case 428:
                $nombre = "Securicar";
                break;
            case 429:
                $nombre = "Banshee";
                break;
            case 430:
                $nombre = "Predator";
                break;
            case 431:
                $nombre = "Bus";
                break;
            case 432:
                $nombre = "Rhino";
                break;
            case 433:
                $nombre = "Barracks";
                break;
            case 435:
                $nombre = "Trailer";
                break;
            case 436:
                $nombre = "Previon";
                break;
            case 437:
                $nombre = "Coach";
                break;
            case 438:
                $nombre = "Cabbie";
                break;
            case 439:
                $nombre = "Stallion";
                break;
            case 440:
                $nombre = "Rumpo";
                break;
            case 442:
                $nombre = "Romero";
                break;
            case 443:
                $nombre = "Packer";
                break;
            case 444:
                $nombre = "Monster";
                break;
            case 445:
                $nombre = "Admiral";
                break;
            case 446:
                $nombre = "Squallo";
                break;
            case 448:
                $nombre = "Pizza";
                break;
            case 449:
                $nombre = "Tram";
                break;
            case 451:
                $nombre = "Turismo";
                break;
            case 452:
                $nombre = "Speeder";
                break;
            case 453:
                $nombre = "Reefer";
                break;
            case 454:
                $nombre = "Tropic";
                break;
            case 455:
                $nombre = "Flatbed";
                break;
            case 456:
                $nombre = "Yankee";
                break;
            case 457:
                $nombre = "Caddy";
                break;
            case 458:
                $nombre = "Solair";
                break;
            case 459:
                $nombre = "Berkley's RC Van";
                break;
            case 460:
                $nombre = "Skimmer";
                break;
            case 461:
                $nombre = "PCJ-600";
                break;
            case 462:
                $nombre = "Faggio";
                break;
            case 463:
                $nombre = "Freeway";
                break;
            case 466:
                $nombre = "Glendale";
                break;
            case 467:
                $nombre = "Oceanic";
                break;
            case 468:
                $nombre = "Sanchez";
                break;
            case 469:
                $nombre = "Sparrow";
                break;
            case 471:
                $nombre = "Patriot";
                break;
            case 472:
                $nombre = "Quad";
                break;
            case 473:
                $nombre = "Dinghy";
                break;
            case 474:
                $nombre = "Hermes";
                break;
            case 475:
                $nombre = "Sabre";
                break;
            case 477:
                $nombre = "ZR-350";
                break;
            case 478:
                $nombre = "Walton";
                break;
            case 479:
                $nombre = "Regina";
                break;
            case 480:
                $nombre = "Comet";
                break;
            case 481:
                $nombre = "BMX";
                break;
            case 482:
                $nombre = "Burrito";
                break;
            case 483:
                $nombre = "Camper";
                break;
            case 484:
                $nombre = "Marquis";
                break;
            case 485:
                $nombre = "Baggage";
                break;
            case 486:
                $nombre = "Dozer";
                break;
            case 487:
                $nombre = "Maverick";
                break;
            case 488:
                $nombre = "News Maverick";
                break;
            case 489:
                $nombre = "Rancher";
                break;
            case 490:
                $nombre = "FBI Rancher";
                break;
            case 491:
                $nombre = "Virgo";
                break;
            case 492:
                $nombre = "Greenwood";
                break;
            case 493:
                $nombre = "Jetmax";
                break;
            case 494:
                $nombre = "Hotring Racer";
                break;
            case 495:
                $nombre = "Sandking";
                break;
            case 496:
                $nombre = "Blista Compact";
                break;
            case 497:
                $nombre = "Poli Maverick";
                break;
            case 498:
                $nombre = "BoxVille";
                break;
            case 499:
                $nombre = "Benson";
                break;
            case 500:
                $nombre = "Mesa";
                break;
            case 505:
                $nombre = "Rancher";
                break;
            case 506:
                $nombre = "Super GT";
                break;
            case 507:
                $nombre = "Elegant";
                break;
            case 508:
                $nombre = "Journey";
                break;
            case 516:
                $nombre = "Nebula";
                break;
            case 517:
                $nombre = "Majestic";
                break;
            case 518:
                $nombre = "Buccaneer";
                break;
            case 519:
                $nombre = "Shamal";
                break;
            case 520:
                $nombre = "Hydra";
                break;
            case 521:
                $nombre = "FCR-900";
                break;
            case 522:
                $nombre = "NRG-500";
                break;
            case 523:
                $nombre = "HPV1000";
                break;
            case 524:
                $nombre = "Cemento";
                break;
            case 525:
                $nombre = "Grua";
                break;
            case 526:
                $nombre = "Fortune";
                break;
            case 527:
                $nombre = "Cadrona";
                break;
            case 528:
                $nombre = "FBI Coche";
                break;
            case 529:
                $nombre = "Willard";
                break;
            case 530:
                $nombre = "Forklift";
                break;
            case 531:
                $nombre = "Tractor";
                break;
            case 532:
                $nombre = "Cultivadora";
                break;
            case 533:
                $nombre = "Feltzer";
                break;
            case 534:
                $nombre = "Remington";
                break;
            case 535:
                $nombre = "Slamvan";
                break;
            case 536:
                $nombre = "Blade";
                break;
            case 540:
                $nombre = "Vincent";
                break;
            case 541:
                $nombre = "Bullet";
                break;
            case 542:
                $nombre = "Clover";
                break;
            case 543:
                $nombre = "Sadler";
                break;
            case 544:
                $nombre = "PBomberos";
                break;
            case 545:
                $nombre = "Hustler";
                break;
            case 546:
                $nombre = "Intruder";
                break;
            case 547:
                $nombre = "Primo";
                break;
            case 548:
                $nombre = "Nevada";
                break;
            case 549:
                $nombre = "Tampa";
                break;
            case 550:
                $nombre = "Sunrise";
                break;
            case 551:
                $nombre = "Merit";
                break;
            case 553:
                $nombre = "Nevada";
                break;
            case 554:
                $nombre = "Yosemite";
                break;
            case 555:
                $nombre = "Windsor";
                break;
            case 556:
                $nombre = "Monster";
                break;
            case 557:
                $nombre = "Monster";
                break;
            case 558:
                $nombre = "Uranus";
                break;
            case 559:
                $nombre = "Jester";
                break;
            case 560:
                $nombre = "Sultan";
                break;
            case 561:
                $nombre = "Stratum";
                break;
            case 562:
                $nombre = "Elegy";
                break;
            case 563:
                $nombre = "Raindance";
                break;
            case 565:
                $nombre = "Flash";
                break;
            case 566:
                $nombre = "Tahoma";
                break;
            case 567:
                $nombre = "Savanna";
                break;
            case 568:
                $nombre = "Bandito";
                break;
            case 571:
                $nombre = "Kart";
                break;
            case 572:
                $nombre = "Mower";
                break;
            case 573:
                $nombre = "Dune";
                break;
            case 574:
                $nombre = "Sweeper";
                break;
            case 575:
                $nombre = "Broadway";
                break;
            case 576:
                $nombre = "Tornado";
                break;
            case 577:
                $nombre = "AT400";
                break;
            case 578:
                $nombre = "DFT-30";
                break;
            case 579:
                $nombre = "Huntley";
                break;
            case 580:
                $nombre = "Stafford";
                break;
            case 581:
                $nombre = "BF-400";
                break;
            case 582:
                $nombre = "NewsVan";
                break;
            case 584:
                $nombre = "Trailer";
                break;
            case 585:
                $nombre = "Emperor";
                break;
            case 586:
                $nombre = "Wayfarer";
                break;
            case 587:
                $nombre = "Euros";
                break;
            case 588:
                $nombre = "HotDog";
                break;
            case 589:
                $nombre = "Club";
                break;
            case 590:
                $nombre = "Box Trailer";
                break;
            case 591:
                $nombre = "Trailer";
                break;
            case 592:
                $nombre = "Andromada";
                break;
            case 593:
                $nombre = "Dodo";
                break;
            case 594:
                $nombre = "RC Cam";
                break;
            case 595:
                $nombre = "Launch";
                break;
            case 596:
                $nombre = "Poli LS";
                break;
            case 597:
                $nombre = "Poli SF";
                break;
            case 598:
                $nombre = "Poli LV";
                break;
            case 599:
                $nombre = "RangerPo";
                break;
            case 600:
                $nombre = "Picador";
                break;
            case 601:
                $nombre = "S.W.A.T";
                break;
            case 602:
                $nombre = "Alpha";
                break;
            case 603:
                $nombre = "Phoenix";
                break;
            case 604:
                $nombre = "Glendale";
                break;
            case 605:
                $nombre = "Sadler";
                break;
            case 609:
                $nombre = "Boxville";
                break;
        }
        return $nombre;
    }

    //Obtener tipo de facción
    public function obtener_tipofaccion($id) {
        if ($id == 0) {
            $nombre = 'Legal';
        } else {
            $nombre = 'Ilegal';
        }
        return $nombre;
    }

}
