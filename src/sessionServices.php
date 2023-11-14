<?php
namespace Airam\Examen;
use Airam\ExamenT3\Services;

class SessionsServices extends Services {
  public $sessions;

  public function __construct($name, $basePrice, $sessions) {
      parent::__construct($name, $basePrice);
      $this->sessions = $sessions;
  }

  public function used() {
    $this->sessions --;
    if ($this->sessions == 0) return true;
  }

  public function __toString(){
    return parent::__toString() . 
    "Sesiones restantes: $this->sessions";
  }
}