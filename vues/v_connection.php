<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/connection.css">
    <title>Connection form</title>
</head>

<body>
    <div class="container">
        <p id="info">Bienvenue sur notre application : </p>
        <hr id="hr">
        <h1>Date Reserver</h1>
        <div id="connection">
            <form action="index.php?uc=formConnection&action=connect" method="POST">
                <h2 class="choices">Se connecter : </h2>
                <u>Login</u> : <input type="text" name="login" placeholder="login" class="inputs"><br>
                <u>Mot de passe</u> : <input type="password" name="mdp" placeholder="mdp" class="inputs"><br>
                <input type="submit" value="Se connecter" class="inputs">
            </form>
        </div>
        <h3 id="ou">OU</h3>
        <div id="submit">
            <form action="index.php?uc=formConnection&action=submit" method="POST">
                <h2 class="choices">S'inscire : </h2>
                <u>Login</u> : <input type="text" name="login" placeholder="login" class="inputs"><br>
                <u>Mot de passe</u> : <input type="password" name="mdp" placeholder="mdp" class="inputs"><br>
                <u>Username</u> : <input type="text" name="usrn" placeholder="username" class="inputs"><br>
                <input type="submit" value="S'inscire" class="inputs">
            </form>
        </div>
        <p id="rickRoll"><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">Ou découvrir un eatser egg 😮</a></p>
    </div>
</body>

</html>