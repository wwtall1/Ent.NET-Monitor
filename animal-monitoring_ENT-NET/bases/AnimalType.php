<?php


class AnimalType {
    private $id,
            $description,
            $recommendedFood;
    public function __construct($id, $description, $recommendedFood) {
        $this->id = $id;
        $this->description = $description;
        $this->recommendedFood = $recommendedFood;
    }
    public function getId() {
        return $this->id;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getRecommendedFood() {
        return $this->recommendedFood;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setRecommendedFood($recommendedFood){
        $this->recommendedFood = $recommendedFood;
    }

}
    










?>