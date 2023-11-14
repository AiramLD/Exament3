<?php

namespace Airam\Store;
use Airam\Store\Services;
use DateTime;

class EventsServices extends Services implements TimedOut {
    public $finalDate;

    public function __construct($name, $basePrice, $finalDate) {
        parent::__construct($name, $basePrice);
        $this->finalDate = $finalDate;
    }

   //Si ha expirado
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

    //Calculamos el precio incluyendo el añadido
    public function calculatePrice() {
        if ($this->daysLeft() !== null) {
            if ($this->daysLeft() <= 7) {
                return parent::calculatePrice() + ($this->basePrice * 0.20);
            } elseif ($this->daysLeft() == 1) {
                return parent::calculatePrice() + ($this->basePrice * 0.50);
            }
        }

        return parent::calculatePrice();
    }

    public function __toString() {
        return parent::__toString() .
         "<br>Fecha de ejecución: " . 
         $this->daysLeft();
    }
}