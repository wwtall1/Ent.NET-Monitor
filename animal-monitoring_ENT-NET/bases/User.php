<?php

class User {
    private $id,
            $UserTypeID,
            $firstName,
            $lastName,
            $phone,
            $email,
            $address,
            $city,
            $state,
            $zip,
            $password,
            $isActive;
    public function __construct($id, $UserTypeID, $firstName, $lastName, $phone, $email, $address, $city, $state, $zip, $password, $isActive) {
        $this->id = $id;
        $this->UserTypeID = $UserTypeID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->password = $password;
        $this->isActive = $isActive;
    }
    public function getId() {
        return $this->id;
    }
    public function getUserTypeID() {
        return $this->UserTypeID;
    }
    public function getFirstName() {
        return $this->firstName;
    }
    public function getLastName() {
        return $this->lastName;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getAddress() {
        return $this->address;
    }
    public function getCity() {
        return $this->city;
    }
    public function getState() {
        return $this->state;
    }
    public function getZip() {
        return $this->zip;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getIsActive() {
        return $this->isActive;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUserTypeID($UserTypeID){
        $this->UserTypeID = $UserTypeID;
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    public function setCity($city){
        $this->city = $city;
    }
    public function setState($state){
        $this->state = $state;
    }
    public function setZip($zip){
        $this->zip = $zip;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setIsActive($isActive){
        $this->isActive = $isActive;
    }    
}