<?php


class WeatherType {
    private $relayID, 
            $degrees,
            $expectedAlert,
            $timeDateChecked,
            $city,
            $state,
            $zip;
    public function __construct($relayID, $degrees, $expectedAlert, $timeDateChecked, $city, $state, $zip) {
        $this->relayID = $relayID;
        $this->degrees = $degrees;
        $this->expectedAlert = $expectedAlert;
        $this->timeDateChecked = $timeDateChecked;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
    }
    public function getRelayID() {
        return $this->relayID;
    }
    public function getDegrees() {
        return $this->degrees;
    }
    public function getExpectedAlert() {
        return $this->expectedAlert;
    }
    public function getTimeDateChecked() {
        return $this->timeDateChecked;
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
    public function setRelayID($relayID): void {
        $this->relayID = $relayID;
    }
    public function setDegrees($degrees): void {
        $this->degrees = $degrees;
    }
    public function setExpectedAlert($expectedAlert): void {
        $this->expectedAlert = $expectedAlert;
    }
    public function setTimeDateChecked($timeDateChecked): void {
        $this->timeDateChecked = $timeDateChecked;
    }
    public function setCity($city): void {
        $this->city = $city;
    }
    public function setState($state): void {
        $this->state = $state;
    }
    public function setZip($zip): void {
        $this->zip = $zip;
    }
}
