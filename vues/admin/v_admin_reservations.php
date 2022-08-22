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
        <div class="formModif">
            <p>Que voulez-vous modifier ?</p>
            <?php
            foreach ($lesReserves as $uneReserv) {
                echo "<form action='index.php?uc=admin&action=modifReserv&id=" . $uneReserv['id'] . "' method='POST' name='formModif'>";
                echo "<button type='button' class='collapsible'>" . $uneReserv['libelleReservation'] . "</button>";
                echo "<div class='uneReserv'>";
                echo "<p>Nom de la réservation :</p> <input type='text' name='nom' placeholder='Libelle' value='" . $uneReserv['libelleReservation'] . "'>
                            <p>Descripttion :</p><textarea name='desc' placeholder='Description'>" . $uneReserv['description'] . "</textarea>
                            <input type='hidden' name='id' value='" . $uneReserv['id'] . "'>
                            <br>
                            <input type='submit' value='Modifier'>
                            <u>OU</u>
                            <a href='index.php?uc=admin&action=suppReserv&id=" . $uneReserv['id'] . "'>Supprimer la reservation</a>";
                echo "</div>";
                echo "</form>";
            }
            ?>
        </div>

        <div class="formAdd">
            <p>Voici le formualaire pour en créer une :</p>
            <form action="index.php?uc=admin&action=createReserv" method="POST" name="formAdd">
                <p>Nom de la réservation :</p> <input type="text" name="nom" placeholder="Libelle">
                <p>Description :</p><textarea name="desc" placeholder="Description"></textarea>
                <br>
                <input type="submit" value="Créer">
            </form>
        </div>
        <a href="index.php?uc=admin&action=accueil" id="return" class="counterA">Retour</a>
    </div>
    <script src="js/slide.js"></script>
</body>

</html>