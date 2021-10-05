<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$var_getMenu = isset($_GET['menu']) ? $_GET['menu'] : 'inicio';
// $var_getMenu = $_GET['menu'];

switch ($var_getMenu) {
    case "home":
        require_once('./views/home.php');
        break;
    case "uni":
        require_once('./views/uni.php');
        break;
    case "ciudad":
        require_once('./views/ciudad.php');
        break;
    case "acerca":
        require_once('./views/acerca.php');
        break;
    case "login":
        require_once('./views/login.php');
        break;
    case "visitas":
        include_once './model/visitas.php';
        $sqlvisitas = visitas::consultar();
        include_once './views/viewvisitas.php';

        break;


    case "deletealumno":
        $_idalumno = trim(filter_input(INPUT_GET, 'idalumno'));
// $_idalumno = isset($_GET['idalumno']) ? $_GET['idalumno'] : '0';
        require_once ('./model/visitas.php');
        $sqlvisitas = visitas::delete($_idalumno);
        header("location: ./index.php?menu=visitas");
        break;
    case "bienvenidos":
        require_once('./views/bienvenidos.php');
        break;
    default:
        require_once('./views/home.php');
}
?>
