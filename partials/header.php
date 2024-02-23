<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../loader.css">
</head>

<body>
    <header>
        <nav class="navbar fixed-top bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">
                    <img class="" src="./medias/disney.png" height="30px">Zoo</a>
                <?php if (!empty($_SESSION["pseudo"])) {
                    echo '<p class="bienvenue">' . "Bienvenue " . $_SESSION['pseudo'] . '</p>' . '<p class="pseudo">'
                        . '<a class="no-underline" title="Déconnexion et retour au menu"
                         href="../login/logout.php">' . '<img src="./medias/mickey.png" height="50px"> ' 
                         . $_SESSION["pseudo"] . "</p>" . '</a>';
                } ?>
            </div>
        </nav>
    </header>
    <div class="divtitle d-flex justify-content-center">
        <img class="logo" src="./medias/disney.png">
        <h1 class="welcome">Zoo</h1>
    </div>