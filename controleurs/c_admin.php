<?php
$action = $_GET['action'];

switch ($action) {
    case "accueil": {
            include("vues/admin/v_admin_accueil.php");
            break;
        }
    case "creerReservation": {
            $lesReserves = $pdo->getReserves();
            include("vues/admin/v_admin_reservations.php");
            break;
        }
    case "createReserv":{
        $id = $pdo->lastID("reservations");
        $nom = $_POST['nom'];
        $desc = $_POST['desc'];
        $params = [
            $id,
            $nom,
            $desc
        ];
        $query = "INSERT INTO reservations (id, libelleReservation, description) VALUES (?, ?, ?)"; //set up query to dodge SQL injections
        $pdo->actionReserv($query, $params);
        include('vues/admin/v_rickIsOk.html');
        break;
    }
    case "modifReserv": {
        $id = $_GET['id'];
        $nom = $_POST['nom'];
        $desc = $_POST['desc'];
        $params = [
            $nom,
            $desc,
            $id
        ];
        $query = "UPDATE reservations SET libelleReservation = ?, description = ? WHERE id = ?";
        $pdo->actionReserv($query, $params);

        $reservsC = $pdo->checkReservation($id);
        foreach ($reservsC as $uneReservClient){
            $params2 = [
                $nom,
                $uneReservClient['id']
            ];
            $query2 = "UPDATE listereservation SET libelleReservation = ? WHERE id = ?";
            $pdo->actionReserv($query2, $params2);
        }

        include('vues/admin/v_rickModif.html');
        break;
    }
    case "suppReserv": {
        $pdo->deleteReserv($_GET['id']);
        include("vues/admin/v_rickSupp.html");
        break;
    }
    case "handleReserver": {
        $listReserv = $pdo->getList();
        $listReservC = $pdo->getListClients();
        include("vues/admin/v_admin_handleReserver.php");
        break;
    }
    case "popupReserv":{
        include("vues/admin/popupsValuesReserv.php");
        break;
    }
    case "popupUser":{
        include("vues/admin/popupsValuesUser.php");
        break;
    }
}
?>