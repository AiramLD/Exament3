<?php
namespace Airam\Examen;
use Airam\ExamenT3\Services;
use Airam\ExamenT3\TimedOut;
use DateTime;

class MixedServices extends Services implements TimedOut {
    private $finalDate;
    private $sessions;

    public function __construct($name, $basePrice, $finalDate, $sessions) {
        parent::__construct($name, $basePrice);
        $this->finalDate = $finalDate;
        $this->sessions = $sessions;
    }

    public function daysLeft() {
        $now = new DateTime();
        $date = new DateTime($this->finalDate);
        $diff = $date->diff($now);
        return $diff->days;
    }

    public function timedOut() {
        $now = new DateTime();
        $finalDate = new DateTime($this->finalDate);
        return $now > $finalDate;
    }

    public function elementTimedOut() {
        if ($this->daysLeft() !== null) {
            if ($this->daysLeft() <= 7) {
                return parent::calcBasePrice() + ($this->basePrice * 0.20);
            } elseif ($this->daysLeft() == 1) {
                return parent::calcBasePrice() + ($this->basePrice * 0.50);
            }
        }
    }

    public function used() {
        $this->sessions--;
        if ($this->sessions == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function __toString() {
        return parent::__toString() .
         "<br>Fecha: $this->finalDate 
         <br>Sesiones restantes: $this->sessions";
    }
}