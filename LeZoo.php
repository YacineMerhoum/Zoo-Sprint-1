<?php
session_start();
include_once "./partials/header.php";
require_once "./connexion/autoloader.php";
require_once "./connexion/connexion.php";

$enclosManager = new EnclosManager($connexion);
// $enclos1 = new Enclos ("Enclos des Félins");
// $enclos2 = new Enclos ("Enclos des Ours");
// $enclos3 = new Enclos ("Enclos de la Poisscaille");
// $enclos4 = new Enclos ("Enclos des Piafs");
$enclos = $enclosManager->getEnclos();
$enclosObject = [];


foreach ($enclos as $enclo) {
  $ObjectEnclos = new Enclos($enclo["name"], $enclo["type"]);
  $ObjectEnclos->setId($enclo["id"]);
  array_push($enclosObject, $ObjectEnclos);
}
?>



<div id="loader">
<h1 class="textLoader">Chargement 
<?php if (!empty($_SESSION["pseudo"])) { 
      echo   $_SESSION['pseudo']  ;  
    } ?>
    ...
</h1>
</div>

<div class="container text-center" id="enclosContainer">
  <?php foreach ($enclosObject as $enclo) { ?>


    <div class="row justify-content-evenly">
      <div class="m-3 enclos card col-6 col-sm-4"><a href="./pagesAnimaux/<?= $enclo->getType() ?>?enclos_id=<?= $enclo->getId() ?>" class="no-underline"><?= $enclo->getName() ?></a>

      </div>

    </div>
  <?php } ?>
</div>
<?php

if (isset($_GET['success'])) {
  $successMessage = $_GET['success'];

  echo '<h2 class="text-center text-anim">' . htmlspecialchars($successMessage) . '</h2>';
} else if (isset($_GET['error'])) {
  $errorMessage = $_GET['error'];

  echo '<h2 class="text-center text-danger error ">' . htmlspecialchars($errorMessage) . '</h2>';
}
?>


<?php
include_once "./partials/footer.php";
?>