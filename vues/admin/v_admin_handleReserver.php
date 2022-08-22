<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Date Reserver</title>
</head>

<body>
    <div class="container">
        <a href='index.php?uc=disconnect' id="disconnect">Se déconnecter</a>
        <h2 id="mainTitle">Date Reserver</h2>
        <p>Voici la liste des réservations par les clients : </p>
        <div id="listReserv">
            <script src="js/popup.js"></script>
            <table border="1">
                <tr>
                    <th>ID de la réserve</th>
                    <th>Libelle de la réserve</th>
                    <th>ID de l'utilisateur</th>
                    <th>Date (a-m-j)</th>
                    <th>Heure</th>
                </tr>
                <?php
                $iCount = 0;
                foreach ($listReserv as $uneReserve) {
                    echo "<tr>";
                    
                    echo "<td>" . $uneReserve['id'] . "</td>";
                    
                    $infoReserv = $pdo->getInfoReserv($uneReserve['libelleReservation']);
                    echo "<td><a href='#' data-popup='myPopup' id='openMyPopup' class='counterA' onClick='getPopupValuesReserv(" . $infoReserv[0]['id'] . "); openPopupR()' aria-label='Open popup'>" . $uneReserve['libelleReservation'] . "</a></td>";
                    
                    echo "<td><a href='#' data-popup='myPopup' id='openMyPopup' class='counterA' onClick='getPopupValuesUser(" . $uneReserve['idUser'] . "); openPopupU()' aria-label='Open popup'>" . $uneReserve['idUser'] . "</a></td>";
                    echo "<td>".$listReservC[$iCount]['dateReserve']."</td>";
                    echo "<td>".$listReservC[$iCount]['heureReserve']."h</td>";
                    echo "</tr>";
                    $iCount++;
                }
                
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

            <div class='popupU' id='myPopupU' aria-hidden='true' onClick='closePopupU()'>
                <div class='wrapper' aria-labelledby='popupTitle' aria-describedby='popupText' aria-modal='true'>
                    <h2 id='popupTitle'>Voici les détails de l'utilisateur :</h2>
                    <p id='popupText'>
                    <p id="popIdUser"></p>
                    <p id="popLoginUser"></p>
                    <p id="popMdpUser"></p>
                    <p id="popPseudoUser"></p>
                    <p id="popStatutUser"></p>
                    </p>
                </div>
            </div>
            <a href="index.php?uc=admin&action=accueil" id="return" class="counterA">Retour</a>
</body>

</html>