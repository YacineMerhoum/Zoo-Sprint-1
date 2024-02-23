<?php
session_start();
require_once "../connexion/autoloader.php";
require "../connexion/connexion.php";

$animalManager = new AnimalManager($connexion);
if (!empty($_POST["nameAnimal"])) {
    $animalManager->addAnimalDb($_POST["nameAnimal"] , 1 , 10, 1);
    echo json_encode([
        'name' =>$_POST["nameAnimal"], 
        "taille" => 1, 
        "age" => 1,
        "appetit" => 25,
        "proprete" => 25, 
        "enclos_id" => 1 ,
        "id" => $connexion->lastInsertId()
    ]);
    die;
}

$animalManager = new AnimalManager($connexion);
if (!empty($_POST["id"])){
    $animalManager->deleteAnimal($_POST["id"]);
}

//NOURIR ANIMAL MARCHE SUR LA BDD
$animalManager = new AnimalManager($connexion);

if (!empty($_POST["nourir"])&& !empty($_POST["eat_value"]) ){
    $animalManager->nourrirAnimal($_POST["nourir"], $_POST["eat_value"]);
}


// LAVER ANIMAL
$animalManager = new AnimalManager($connexion);

if (!empty($_POST["clean_id"]) && !empty($_POST["clean_value"])){
    $animalManager->cleanAnimal($_POST["clean_id"], $_POST["clean_value"]);
}




$animals = $animalManager->getAnimal($_GET["enclos_id"]);
$animalObject = [];


foreach ($animals as $animal) {
  $objectAnimal = new Tigre($animal["name"],$animal["age"],$animal["weight"],
  $animal["taille"],$animal["enclos_id"],$animal["id"], $animal["hungry"],$animal["clean"]);
  array_push($animalObject, $objectAnimal);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/felins.css">
    <link rel="stylesheet" href="../test/test.css">
</head>

<body>
    <header>
        <nav class="navbar fixed-top bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img class="" src="../medias/disney.png" height="30px">Zoo</a>
                    <h1 class=""><a href="../LeZoo.php">Retour aux enclos</a></h1>
                    <?php if (!empty($_SESSION["pseudo"])) {
                echo '<p class="pseudo">' . '<img src="../medias/mickey.png" height="50px"> '. $_SESSION["pseudo"] . "</p>";

            } ?>
            </div>
        </nav>
        
    </header>


    <div class="divtitle d-flex justify-content-center">
        <img class="logo" src="../medias/disney.png">
        <h1 class="welcome">Zoo</h1>
    </div>

    <form class="d-flex justify-content-center" id="createAnimal"  method="post">
        <input class="css-input" name="nameAnimal" id="creation"  placeholder="Nom de l'animal" type="text">
        <button type="submit" id="buttonCreate" class="buttonAnimal1 btn btn-warning">Créer</button>
    </form>

    
   
    <div class="d-flex align-items-start" id="cardJs">
        <?php foreach ($animalObject as $tigre) {  ?>
            
            <div class="cards" id="animal-<?= $tigre->getId() ?>">
                <div class="wrapper">

                    <img src="../medias/1992-rajah-01.jpg" class="cover-image" >
                    <div class="card-text-overlay">
                        <p class="card-text">Age : <?= $tigre->getAge() ?></p>
                        <p class="card-text">Poids : <?= $tigre->getWeight() ?></p>
                        <p class="card-text">Taille : <?= $tigre->getSize() ?></p>
                        <p class="card-text">Appêtit : </p>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="majEat eatUpdate progress-bar bg-success progress-hungry-<?= $tigre->getId() ?>"data-id="<?= $tigre->getId() ?>" style="width: <?= $tigre->getHungry() ?>%"><?= $tigre->getHungry() ?>%</div>
                        </div>
                        <p class="card-text">Propreté : </p>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="test progress-bar bg-info progress-clean-<?= $tigre->getId() ?>" data-id="<?= $tigre->getId() ?>" style="width: <?= $tigre->getClean() ?>%"><?= $tigre->getClean() ?>%</div>
                        </div>
                    </div>

                </div>
                <h5 class="title"> <?= $tigre->getName() ?></h5>
                <img src="../medias/iconetigre-removebg-preview.png" id="raja"  class="character" />
                <div class="character d-flex justify-content-between ">
            
            <form method="post" id="wash">
            <input type="hidden" name="clean" id="getWash" value="<?= $tigre->getId()?>">
            <button type="submit"  class="buttonAnimal text-white btn btn-info p-2">Nettoyer</button>
            </form>

            <form method="post" id="allEat">
            <input type="hidden" id="getEat" name="nourir" value="<?= $tigre->getId()?>">
            <button type="submit" class="buttonAnimal btn btn-success p-2">Nourrir</button>
            </form>
            
            <form method="post" id="monFormulaire">
                <input type="hidden" name="id" id="getId" value="<?= $tigre->getId() ?>">
                <button id="libererBtn" type="submit" class="buttonAnimal btn btn-danger p-2">Libérer</button>
            </form>
            
        </div>
            </div>
            
            <?php }  ?>
    </div>

    <script src="../ajax.js"></script>
    <script src="../javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/23471b5a81.js" crossorigin="anonymous"></script>
</body>

</html>