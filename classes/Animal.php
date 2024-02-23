<?php

abstract class Animal {
    private int $id;
    private string $name;
    private int $age;
    private int $weight;
    private int $size;
    private int $hungry = 30;
    private int $clean = 25;
    private $sleeping = 100;
    private $sick = false;
    private $enclos_id;

    public function __construct($name , $age, $weight, $size , $enclos_id, $id, $hungry, $clean)
    {
        $this->name = $name;
        $this->age = $age;
        $this->weight = $weight;
        $this->size = $size;
        $this->enclos_id = $enclos_id;
        $this->id = $id; 
        $this->hungry = $hungry;
        $this->clean = $clean;
    }
    abstract public function move();


    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getAge(){
        return $this->age;
    }
    public function setAge($age){
        $this->age = $age;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function setWeight($weight){
        $this->weight = $weight;
    }
    public function getSize(){
        return $this->size;
    }
    public function setSize($size){
        $this->size = $size;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }


    public function getHungry(){
        return $this->hungry;
    }
    public function setHungry($hungry){
        $this->$hungry;

    }
    public function getClean(){
        return $this->clean;
    }
    public function setClean($clean){
        $this->$clean;
    }

    public function faireSon(){
        $this->name;
    }
    public function soin(){
        $this->sick = false;
    }
    public function getSleep(){
        $this->sleeping = 100;
    }
    


}








