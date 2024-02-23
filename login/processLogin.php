<?php
session_start();

if(!empty($_POST["login"])){
    require_once "../connexion/connexion.php";
    $preparedRequest = $connexion->prepare(
        "SELECT * FROM `user` WHERE `pseudo` = ?"
    );
    $preparedRequest->execute([$_POST["login"]]);
    $user = $preparedRequest->fetch(PDO::FETCH_ASSOC);


    
    $_SESSION["pseudo"] = $_POST["login"];


    header("Location: ../LeZoo.php");
} else {
    header("Location: ./connecte.php?error=Merci de remplir le formulaire");
}

