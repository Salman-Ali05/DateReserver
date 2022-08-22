<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Date Reserver</title>
</head>

<body>
    <div class="container">
        <script src="js/popup.js"></script>
        <a href='index.php?uc=disconnect' id="disconnect">Se déconnecter</a>
        <h2 id="mainTitle">Date Reserver</h2>
        <p id="planP">Voici la liste des réservations de ce mois : (<?php $date = new DateTime();
                                                                    echo $date->format('m-Y'); ?>)</p>
        <p>
        <i>PS : Cliquez sur le nom de la réservation pour en savoir plus !</i>
        </p>
        <table border="1" class="planningTable">

            <?php

            echo "<tr>";
            echo "<th>Libelle</th><th>Nombre de Reservations</th>";
            foreach ($listeReserv as $uneReserv) {
                $infoReserv = $pdo->getInfoReserv($uneReserv['libelleReservation']);
                echo "<tr><td><a href='#' data-popup='myPopup' id='openMyPopup' class='counterA' onClick='getPopupValuesReserv(" . $infoReserv[0]['id'] . "); openPopupR()' aria-label='Open popup'>" . $uneReserv['libelleReservation'] . "</a></td>";
                $lesReservesClients = $pdo->checkReservation($uneReserv['id']);
                $lesReservesCount = $pdo->getNbReserved($uneReserv['id']);
                foreach ($lesReservesCount as $uneReservCount) {
                    echo "<td>" . $uneReservCount['nbId'] . "</td>";
                }
            }
            echo "</tr>";
            ?>

        </table>

        <div class='popupR' id='myPopupR' aria-hidden='true' onClick='closePopupR()'>
            <div class='wrapper' aria-labelledby='popupTitle' aria-describedby='popupText' aria-modal='true'>
                <h2 id='popupTitle'>Voici les détails de la réservation :</h2>
                <p id='popupText'>
                <p id="popIdReserv"></p>
                <p id="popNameReserv"></p>
                <p id="popDescReserv"></p>
                </p>
            </div>
        </div>

        <a href="index.php?uc=accueil" id="return" class="counterA">Retour</a>
    </div>
</body>

</html>