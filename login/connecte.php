<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <link rel="stylesheet" href="../loader.css">
    <link rel="stylesheet" href="./create.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div id="loader">
        <h1 class="textLoader">Chargement...</h1>
        
    </div>

    <div class="inputconnexion">
        <form action="./processLogin.php" method="post">
            <h1 class="textinput">Connexion</h1>
        <?php if (isset($_GET['error'])) {
            $successMessage = $_GET['error'];

            echo '<h2 class="text-center text-anim">' . htmlspecialchars($successMessage) . '</h2>';
            }?>
            <input type="text" class="css-input" name="login" placeholder="" />
            <button class="original-button" type="submit">C'est parti !</button>

        </form>
        <h1 class="mt-5" id="monH1">Vous n'avez pas de compte ?<br>
            <a href="../create/create.php">Inscrivez-vous ici</a>
        </h1>
    </div>







    <script src="../javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
        



