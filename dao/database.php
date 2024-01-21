<?php

function connectToDB()
{
    $host = "dbPK";
    $user = "Ludo";
    $pass = "Pokemon2023";
    $dbname = "Pokemon";
    try {
        $dbPK = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $dbPK->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully to DataBase <br>";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    return $dbPK;
}