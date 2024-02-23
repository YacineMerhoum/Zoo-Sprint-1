<?php

class Enclos {
    private string $name;
    private array $animaux = [];
    private int $proprete = 100;
    private string $type;
    private int $id;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getProprete(){
        return $this->proprete;
    }
    public function setProprete($proprete){
        $this->proprete = $proprete;
    }
    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type = $type;
    }


    





}

