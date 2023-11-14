<?php

namespace Airam\Store;
use Airam\Store\Products;
use DateTime;

class PerishableProduct extends Products implements TimedOut {
    public $finalDate;

    public function __construct($name, $basePrice, $brand, $weight, $volume, $finalDate){
        parent::__construct($name, $basePrice, $brand, $weight, $volume);
        $this->finalDate = $finalDate;
    }

   //Si ha acabado el tiempo de uso
    public function timedOut() {
        $now = new DateTime();
        $finalDate = new DateTime($this->finalDate);
        return $now > $finalDate;
    }
    //Cuantos dias le quedan
    public function daysLeft() {
        $now = new DateTime();
        $date = new DateTime($this->finalDate);
        $diff = $date->diff($now);
        return $diff->days;
    }

    //Calculamos el precio incluyendo el descuento
    public function calculateBasePrice(): float {
    $daysLeft = $this->daysLeft();

    if ($daysLeft !== null) {
        if ($daysLeft <= 30) {
            return parent::calculateBasePrice() - ($this->basePrice * 0.10);
        } elseif ($daysLeft <= 10) {
            return parent::calculateBasePrice() - ($this->basePrice * 0.25);
        }
    }
    return parent::calculateBasePrice();
}


    public function __toString() {
        return parent::__toString() . 
        "<br>Fecha límite: $this->finalDate";
    }
}