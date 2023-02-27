<?php
class Monitor{
    private $id,
            $userID,
            $animalCount,
            $foodWeightFull,
            $foodWeightEmpty,
            $foodLevelAlert,
            $waterWeightFull,
            $waterWeightEmpty,
            $waterLevelAlert,
            $feedingTime,
            $timeBetweenFeedings,
            $animalType,
            $location,
            $notes,
            $feedType,
            $foodLevel,
            $waterLevel,
            $dateTimeChecked;
    public function __construct($id, $userID, $animalCount, $foodWeightFull, $foodWeightEmpty, $foodLevelAlert, $waterWeightFull, $waterWeightEmpty, $waterLevelAlert, $feedingTime, $timeBetweenFeedings, $animalType, $location, $notes, $feedType, $foodLevel, $waterLevel, $dateTimeChecked) {
        $this->id = $id;
        $this->userID = $userID;
        $this->animalCount = $animalCount;
        $this->foodWeightFull = $foodWeightFull;
        $this->foodWeightEmpty = $foodWeightEmpty;
        $this->foodLevelAlert = $foodLevelAlert;
        $this->waterWeightFull = $waterWeightFull;
        $this->waterWeightEmpty = $waterWeightEmpty;
        $this->waterLevelAlert = $waterLevelAlert;
        $this->feedingTime = $feedingTime;
        $this->timeBetweenFeedings = $timeBetweenFeedings;
        $this->animalType = $animalType;
        $this->location = $location;
        $this->notes = $notes;
        $this->feedType = $feedType;
        $this->foodLevel = $foodLevel;
        $this->waterLevel = $waterLevel;
        $this->dateTimeChecked = $dateTimeChecked;
    }
    public function getId() {
        return $this->id;
    }
    public function getUserID() {
        return $this->userID;
    }
    public function getAnimalCount() {
        return $this->animalCount;
    }
    public function getFoodWeightFull() {
        return $this->foodWeightFull;
    }
    public function getFoodWeightEmpty() {
        return $this->foodWeightEmpty;
    }
    public function getFoodLevelAlert() {
        return $this->foodLevelAlert;
    }
    public function getWaterWeightFull() {
        return $this->waterWeightFull;
    }
    public function getWaterWeightEmpty() {
        return $this->waterWeightEmpty;
    }
    public function getWaterLevelAlert() {
        return $this->waterLevelAlert;
    }
    public function getFeedingTime() {
        return $this->feedingTime;
    }
    public function getTimeBetweenFeedings() {
        return $this->timeBetweenFeedings;
    }
    public function getAnimalType() {
        return $this->animalType;
    }
    public function getLocation() {
        return $this->location;
    }
    public function getNotes() {
        return $this->notes;
    }
    public function getFeedType() {
        return $this->feedType;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setUserID($userID): void {
        $this->userID = $userID;
    }
    public function setAnimalCount($animalCount): void {
        $this->animalCount = $animalCount;
    }
    public function setFoodWeightFull($foodWeightFull): void {
        $this->foodWeightFull = $foodWeightFull;
    }
    public function setFoodWeightEmpty($foodWeightEmpty): void {
        $this->foodWeightEmpty = $foodWeightEmpty;
    }
    public function setFoodLevelAlert($foodLevelAlert): void {
        $this->foodLevelAlert = $foodLevelAlert;
    }
    public function setWaterWeightFull($waterWeightFull): void {
        $this->waterWeightFull = $waterWeightFull;
    }
    public function setWaterWeightEmpty($waterWeightEmpty): void {
        $this->waterWeightEmpty = $waterWeightEmpty;
    }
    public function setWaterLevelAlert($waterLevelAlert): void {
        $this->waterLevelAlert = $waterLevelAlert;
    }
    public function setFeedingTime($feedingTime): void {
        $this->feedingTime = $feedingTime;
    }
    public function setTimeBetweenFeedings($timeBetweenFeedings): void {
        $this->timeBetweenFeedings = $timeBetweenFeedings;
    }
    public function setAnimalType($animalType): void {
        $this->animalType = $animalType;
    }
    public function setLocation($location): void {
        $this->location = $location;
    }
    public function setNotes($notes): void {
        $this->notes = $notes;
    }
    public function setFeedType($feedType): void {
        $this->feedType = $feedType;
    }
    public function getFoodLevel() {
        return $this->foodLevel;
    }
    public function getWaterLevel() {
        return $this->waterLevel;
    }
    public function getDateTimeChecked() {
        return $this->dateTimeChecked;
    }
    public function setFoodLevel($foodLevel): void {
        $this->foodLevel = $foodLevel;
    }
    public function setWaterLevel($waterLevel): void {
        $this->waterLevel = $waterLevel;
    }
    public function setDateTimeChecked($dateTimeChecked): void {
        $this->dateTimeChecked = $dateTimeChecked;
    }    
    
}?>