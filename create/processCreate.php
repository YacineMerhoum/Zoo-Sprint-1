<?php 
session_start();

if (!empty($_POST["create"])){
    require_once "../connexion/connexion.php";
    $preparedRequest = $connexion->prepare(
        "INSERT INTO user (pseudo) VALUES (?)"
    );
    $preparedRequest->execute([
        $_POST["create"]
    ]);

    $_SESSION["pseudo"] = $_POST["create"];

    header("Location: ../LeZoo.php?success=Votre compte a été crée avec succès!");
    
    }else{

    header("Location: ./create.php?error=Merci de remplir le formulaire");
}