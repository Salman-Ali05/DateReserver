<?php

function generateUsername(){
    $names = ["Rick", "Astley", "Nibru", "Kuzumo", "Peanuts", "Anya", "Sanfuki", "MyToutoute","N-No"];
    $usernameGenerated = "";
    $randNum = 0;
    for ($i = 0; $i < 8; $i++){
        $randNum = rand(0, count($names)-1);
        $usernameGenerated = $names[$randNum];
    }

    return $usernameGenerated;
}

?>