<?php

$action = $_GET['action'];

$login = $_POST['login'];
$mdp = $_POST['mdp'];

switch ($action){
    case "connect":{
        $connect = $pdo->connect($login, $mdp);
        if ($connect){
            session_destroy();
            session_start();
            $user = $pdo->getInfoUser($login);
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['statut'] = $user['statut'];
            header("location:index.php?uc=accueil");
        }else{
            header("location:index.php?uc=formConnection");
        }
        break;
    }
    case "submit":{
        $username = $_POST['usrn'];
        if ($username == ""){
            $username = generateUsername();
        }
        $submit = $pdo->submit($login, $mdp, $username);
        if ($submit){
            session_destroy();
            session_start();
            $_SESSION['pseudo'] = $username;
            $_SESSION['statut'] = $user['statut'];
            header("location:index.php?uc=accueil");
        }else{
            header("location:index.php?uc=formConnection");
        }
        break;
    }
}

?>