<?php

use Symfony\Component\Cache\Adapter\PdoAdapter;

class PDODateReserver{

    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=datereserver';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $dateReserver = null;

    private function __construct()
    {
        PDODateReserver::$monPdo = new PDO(PDODateReserver::$serveur . ';' . PDODateReserver::$bdd, PDODateReserver::$user, PDODateReserver::$mdp);
        PDODateReserver::$monPdo->query("SET CHARACTER SET utf8");
    }

    public function _destruct()
    {
        PDODateReserver::$monPdo = null;
    }

    public function disconnect(){
        session_unset();
        session_destroy();
    }

    public static function getPdoDateReserver()
    {
        if (PDODateReserver::$dateReserver == null) {
            PDODateReserver::$dateReserver = new PDODateReserver();
        }
        return PDODateReserver::$dateReserver;
    }

    function connect($login, $mdp){
        $query = "SELECT * FROM users WHERE login = '$login' AND mdp = '$mdp'";
        $lesLignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lesLignes = $res->fetchAll();
        foreach ($lesLignes as $ligne) {
            if ($ligne["login"] == $login && $ligne["mdp"] == $mdp) {
                return true;
            }
        }
        return false;
    }

    function getInfoUser($info){
        $query = "SELECT * FROM users WHERE login = '" . $info . "' OR pseudo = '" . $info . "'";
        $res = PDODateReserver::$monPdo->query($query);
        $ligne = $res->fetch();
        return $ligne;
    }

    function getList(){
        $query = "SELECT * FROM listereservation";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    function getListClients(){
        $query = "SELECT * FROM clients";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    function getReserves(){
        $query = "SELECT * FROM reservations";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    function getInfoReserv($libelleReserve){
        $query = "SELECT * FROM reservations WHERE libelleReservation = '".$libelleReserve."'";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    function submit($login, $mdp, $username){
        $id = PDODateReserver::lastID("users");
        $query = "INSERT INTO users VALUES($id, '$login', '$mdp', '$username', 'client')";
        $res = PDODateReserver::$monPdo->exec($query);
        return $res;
    }

    function actionClient($query, $params){
        $mysql = new PDO('mysql:host=localhost;dbname=datereserver', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); // convertir tte la colonne en utf8 
        $mysql->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $result = $mysql->prepare($query);
        $result->execute($params);
        $mysql = null;
    }

    function checkReservation($idReservation){
        $query = "SELECT * FROM clients WHERE idReservation = $idReservation";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    function getNbReserved($idReservation){
        $query = "SELECT count(*) AS nbId FROM clients WHERE idReservation = $idReservation";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    function getNbReservedPerDay($idReservation, $month, $day){
        $query = "SELECT count(*) AS nbId FROM clients WHERE idReservation = $idReservation AND dateReserve LIKE '_____%$month-$day'";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    // ADMIN SIDE //

    //function that will add/edit a row on a table
    function actionReserv($query, $params){
        $mysql = new PDO('mysql:host=localhost;dbname=datereserver', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")); // convertir tte la colonne en utf8 
        $mysql->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $result = $mysql->prepare($query);
        $result->execute($params);
        $mysql = null;
    }

    function deleteReserv($id){
        $query = "DELETE FROM reservations WHERE id = $id";
        PDODateReserver::$monPdo->exec($query);
    }

    function getInfoUserByID($id){
        $query = "SELECT * FROM users WHERE id = $id";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    function getInfoReservByID($id){
        $query = "SELECT * FROM reservations WHERE id = '".$id."'";
        $lignes = [];
        $res = PDODateReserver::$monPdo->query($query);
        $lignes = $res->fetchAll();
        return $lignes;
    }

    // USEFULL

    function lastID($table){
        $query = "SELECT id FROM $table ORDER BY id desc";
        $res = PDODateReserver::$monPdo->query($query);
        $lastID = $res->fetch();
        if ($lastID != 0){
            return $lastID[0]+1;
        }else{
            return 1;
        }
    }

}
