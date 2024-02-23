<?php
session_start();
require_once "../connexion/autoloader.php";
require "../connexion/connexion.php";

//POUR CRÉER UN ANIMAL 
$animalManager = new AnimalManager($connexion);
if (!empty($_POST['nameAnimal'])) {
    $animalManager->addAnimalDb($_POST['nameAnimal'], 1, 10, 3);
    
}


//POUR SUPPRIMER L'ANIMAL DE LA DB 
$animalManager = new AnimalManager($connexion);
if (!empty($_POST["id"])) {
    $animalManager->deleteAnimal($_POST["id"]);
}
$animalManager = new AnimalManager($connexion);
if (!empty($_POST["nourir"])&& !empty($_POST["eat_id"])) {
    $animalManager->nourrirAnimal($_POST["nourir"],$_POST["eat_id"]);
}
$animalManager = new AnimalManager($connexion);
if (!empty($_POST["clean"])&& !empty($_POST["clean_id"])) {
    $animalManager->cleanAnimal($_POST["clean"], $_POST["clean_id"]);
}

//POUR QUE L'ANIMAL SOIT LIER AVEC SON ENCLOS VIA L'ID 
$animals = $animalManager->getAnimal($_GET["enclos_id"]);
$animalObject = [];



// $deleteAnimal = $animalManager->deleteAnimal($_POST["id"]);

foreach ($animals as $animal) {
    $objectAnimal = new Poisson(
        $animal["name"],
        $animal["age"],
        $animal["weight"],
        $animal["taille"],
        $animal["enclos_id"],
        $animal["id"],
        $animal["hungry"],
        $animal["clean"]
    );
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
    <link rel="stylesheet" href="../styleAqua.css">
    <link rel="stylesheet" href="../test/test.css">
</head>

<body>
    <div class="bubble"></div>

    <header>
        <nav class="navbar fixed-top bg-body-tertiary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img class="" src="../medias/disney.png" height="30px">Zoo</a>
                <h1 class=""><a href="../LeZoo.php">Retour aux enclos</a></h1>
                <?php if (!empty($_SESSION["pseudo"])) {
                    echo '<p class="pseudo">' . '<img src="../medias/mickey.png" height="50px"> ' . $_SESSION["pseudo"] . "</p>";
                } ?>

            </div>
        </nav>
    </header>

    <div class="divtitle d-flex justify-content-center">
        <img class="logo" src="../medias/disney.png">
        <h1 class="welcome">Zoo</h1>

    </div>
    <form class="d-flex justify-content-center" action="" method="post">
        <input class="css-input" name="nameAnimal" placeholder="Nom de l'animal" type="text">
        <button type="submit" class="buttonAnimal1 btn btn-info">Créer</button>
    </form>



    <!-- 

FOR EaCH A FAIRE SANS DOUTE  -->

    <div class="d-flex align-items-start">
        <?php foreach ($animalObject as $poisson) { ?>
            <div class="cards" id="animal-<?= $poisson->getId() ?>">
                <div class="wrapper">

                    <img src="../medias/nemo.jpeg" class="cover-image" alt="Aigle Mignon">
                    <div class="card-text-overlay">
                        <p class="card-text">Age : <?= $poisson->getAge() ?></p>
                        <p class="card-text">Poids : <?= $poisson->getWeight() ?></p>
                        <p class="card-text">Taille : <?= $poisson->getSize() ?></p>
                        <p class="card-text">Appêtit : </p>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="majEat  progress-bar bg-success progress-hungry-<?= $poisson->getId() ?>"data-id="<?= $poisson->getId() ?>" style="width: <?= $poisson->getHungry() ?>%"><?= $poisson->getHungry() ?>%</div>
                        </div>
                        <p class="card-text">Propreté : </p>
                        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="majWash progress-bar bg-info progress-wash-<?= $poisson->getId() ?>"data-id="<?= $poisson->getId() ?>" style="width: <?= $poisson->getClean() ?>%"><?= $poisson->getClean() ?>%</div>
                        </div>
                    </div>

                </div>
                <h5 class="title"> <?= $poisson->getName() ?></h5>
                <img src="../medias/finding-nemo.png" class="character" />
                <div class="character d-flex justify-content-between ">

                    <form  id="wash" method="post">
                        <input type="hidden" name="clean" value="<?= $poisson->getId() ?>">
                        <button type="submit" class="buttonAnimal text-white btn btn-info p-2">Nettoyer</button>
                    </form>

                    <form id="eat" method="post">
                        <input type="hidden" name="nourir" value="<?= $poisson->getId() ?>">
                        <button type="submit" class="buttonAnimal btn btn-success p-2">Nourrir</button>
                    </form>


                    <form id="deleteAnimal" method="post">
                        <input type="hidden" name="id" value="<?= $poisson->getId() ?>">
                        <button type="submit" class="buttonAnimal btn btn-danger p-2">Libérer</button>
                    </form>




                </div>
            </div>
        <?php  } ?>
    </div>

    <div id="background-wrap">
        <div class="bubble x1"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x4"></div>
        <div class="bubble x5"></div>
        <div class="bubble x6"></div>
        <div class="bubble x7"></div>
        <div class="bubble x8"></div>
        <div class="bubble x9"></div>
        <div class="bubble x10"></div>
    </div>

    <script src="../ajax/ajaxAqua.js"></script>
    <script src="../styleAqua.css"></script>
    <script src="../javascript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/23471b5a81.js" crossorigin="anonymous"></script>
</body>

</html>