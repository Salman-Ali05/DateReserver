<?php

$_POST = json_decode(file_get_contents('php://input'), true); // forcer la reception POST
if (!empty($_POST)) {
    $laReserv = $pdo->getInfoReservByID($_POST['id']);
    echo json_encode($laReserv);
}

?>