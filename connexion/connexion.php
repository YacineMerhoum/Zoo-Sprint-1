<?php

try {
    $connexion = new PDO('mysql:host=127.0.0.1;dbname=zoo;charset=utf8','root','', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (\Throwable $th) {
    die('erreur db');
}