<?php

class AnimalManager {
    private PDO $connexion;


    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }
    public function addAnimalDb($name , $size , $weight , $enclos_id)
    {
        $preparedRequest = $this->connexion->prepare("INSERT INTO `animal`(`name`, `weight`, `taille`, `enclos_id`) VALUES (?,?,?,?)");
        $preparedRequest->execute([
            $name,
            $weight,
            $size,
            $enclos_id,
        ]);
        

    }

    public function getAnimal($enclos_id)
    {
        $preparedRequest = $this->connexion->prepare("SELECT * FROM `animal` WHERE `enclos_id` = ?");
        $preparedRequest->execute([
            $enclos_id

        ]);
        $animalArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $animalArray;
    }

    public function deleteAnimal($id){
        $preparedRequest = $this->connexion->prepare("DELETE FROM `animal` WHERE `id` = ? ");
        $preparedRequest->execute([
            $id

        ]);
    }
    public function nourrirAnimal($id , $value){
        $preparedRequest = $this->connexion->prepare("UPDATE animal SET hungry = hungry + ? WHERE id = ?");
        $preparedRequest->execute([
            $value,
            $id
        ]);
    }
    // public function afficherHungry($id){
    //     $preparedRequest = $this->connexion->prepare("SELECT animal FROM hungry WHERE `id` = ?");
    //     $preparedRequest->execute([
    //         $id
    //     ]);
    // }

    public function cleanAnimal($id, $value){
        $preparedRequest = $this->connexion->prepare("UPDATE animal SET clean = clean + ? WHERE id = ?");
        $preparedRequest->execute([
            $value,
            $id
        ]);
    }

}