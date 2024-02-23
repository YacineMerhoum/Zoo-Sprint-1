<?php

class Employe {
    private string $name;
    private int $age;
    private string $genre;
    private string $nettoyer;


    public function __construct($name)
    {
        $this->name = $name;
        // $this->age = $age;
        // $this->genre = $genre;
        
    }
    
    
    public function getName(){
        return $this->name; 
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getAge(){
        return $this->age; 
    }
    

    public function nettoyer(){

    }
    public function nourrir(){

    }
    public function ajouterAnimal(){

    }
    public function enleverAnimal(){

    }
    public function transfertAnimal(){

    }







}