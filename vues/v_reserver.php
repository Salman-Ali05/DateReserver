<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"><i class="fa-solid fa-eye"></i>-->
    <title>Date Reserver</title>
</head>

<body>
    <div class="container">
        <a href='index.php?uc=disconnect' id="disconnect">Se déconnecter</a>
        <h2 id="mainTitle">Date Resever</h2>
        <p>Voici le formulaire pour reserver : </p>
        <br>
        <div class="formReserv">
            <form action="index.php?uc=accueil&action=validerReserver" method="POST" name="fromReserver">
                <p class="inputs">Veuillez saisir votre Nom / Prenom :</p><input type="text" name="nom" placeholder="nom"> / <input type="text" name="prenom" placeholder="prenom">
                <p class="inputs">Veuillez saisir votre pseudo (celui utilisé lors de la création) :</p><input type="text" name="pseudo" placeholder="pseudo">
                <div id="usernameB">
                    <p id="pseudoCopy"><?php echo $_SESSION['pseudo']; ?></p>
                </div>
                <input type="button" value="Show" id="displayButton">
                <p class="inputs">Veuillez choisir une réservation parmis celles proposées :</p>
                <select name="reserverSelect">
                    <?php
                    foreach ($listeReserv as $uneReserv) {
                        echo "<option value='" . $uneReserv['libelleReservation'] . "' id='" . $uneReserv['id'] . "'>" . $uneReserv['libelleReservation'] . "</option>";
                    }
                    ?>
                </select>
                <p class="inputs">Veuillez choisir une date à laquelle vous voulez la réserver ainsi qu'une heure :</p>
                <?php date_default_timezone_set('Europe/Paris');
                $today = date("Y-m-d");
                ?>
                <input type="date" name="date" min="<?php echo $today; ?>"><input type="number" name="heure" min="7" max="17">h
                <br>
                <br>
                <input type="submit" value="Reserver">
            </form>
        </div>
        <a href="index.php?uc=accueil" id="return" class="counterA">Retour</a>
    </div>
    <script src="js/buttonShow.js"></script>
</body>

</html>