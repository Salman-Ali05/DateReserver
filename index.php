<?php

require_once("includes/fct.php");
require_once("includes/class_pdo.php");
$pdo= PDODateReserver::getPdoDateReserver();
session_start();
if (!isset($_GET['uc'])) {
    $uc = 'formConnection';
} else {
    $uc = $_GET["uc"];
}

switch($uc){
    case "formConnection":{
        include ('controleurs/c_connection.php');
        include("vues/v_connection.php");
        break;
    }
    case "accueil":{
        include("controleurs/c_accueil.php");
        break;
    }
    case "admin":{
        include("controleurs/c_admin.php");
        break;
    }
    case "disconnect":{
        include("vues/v_connection.php");
        break;
    }
}
?>
