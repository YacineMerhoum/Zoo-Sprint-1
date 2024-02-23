<?php

class EnclosManager 
{
    private PDO $connexion;

    public function __construct(PDO $connexion )
    {
        $this->connexion = $connexion;
    }
    public function getEnclos()
    {
        $preparedRequest = $this->connexion->prepare("SELECT * FROM `enclos` WHERE 1; ");
        $preparedRequest->execute([

        ]);
        $enclosArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $enclosArray;
    }
  
}