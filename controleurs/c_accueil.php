<?php

if (!isset($_GET['action'])) {
    $action = 'accueil';
} else {
    $action = $_GET["action"];
}
$listeReserv = $pdo->getReserves();

switch ($action) {
    case 'accueil': {
            include("vues/v_accueil.php");
            break;
        }
    case "planning": {
            include("vues/v_planning.php");
            break;
        }
    case "reserver": {
            include("vues/v_reserver.php");
            break;
        }
    case "validerReserver": {
            $pseudo = $_POST['pseudo'];
            $user = $pdo->getInfoUser($pseudo);
            if ($user) {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];

                date_default_timezone_set('Europe/Paris');
                $today = date("Y-n-j");
                $dateReserve = $_POST['date'];
                $heure = $_POST['heure'];

                $libelleReserve = $_POST['reserverSelect'];
                $reservation = $pdo->getInfoReserv($libelleReserve);
                $idR = $reservation[0]['id'];
                $lesReserves = $pdo->checkReservation($idR);
                $nbReserveID = count($lesReserves);
                $iCount = 0;

                $id = $pdo->lastID("clients");
                $params1 = [
                    $id,
                    $nom,
                    $prenom,
                    $today,
                    $dateReserve,
                    $heure,
                    $idR
                ];
                $query1 = "INSERT INTO clients VALUES (?, ?, ?, ?, ?, ?, ?)";

                $params2 = [
                    $id,
                    $libelleReserve,
                    $user['id']
                ];
                $query2 = "INSERT INTO listereservation VALUES (?, ?, ?)";

                $doublons; // boolean to check if it exist

                if ($lesReserves) {
                    foreach ($lesReserves as $uneReserve) {
                        if ($dateReserve == $uneReserve['dateReserve']) {
                            if ($heure == $uneReserve['heureReserve']) {
                                $doublons = true;
                                break;
                            } else {
                                $doublons = false;
                            }
                        } else {
                            $doublons = false;
                        }
                    }
                    if (!$doublons) {
                        $pdo->actionClient($query1, $params1);
                        $pdo->actionClient($query2, $params2);
                        include("vues/v_rickIsOk.html");
                    } else {
                        header('location:index.php?uc=accueil&action=reserver');
                    }
                } else {
                    $pdo->actionClient($query1, $params1);
                    $pdo->actionClient($query2, $params2);
                    include("vues/v_rickIsOk.html");
                }
            } else {
                header('location:index.php?uc=accueil&action=reserver');
            }
            break;
        }
}

?>