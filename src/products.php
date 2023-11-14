<?php

namespace Airam\Examen;
use Airam\ExamenT3\Elements;


class Products extends Elements {
  public $brand;
  public $weight;
  public $volume;

  public function __construct($name, $basePrice, $brand,  $weight, $volume) {
    parent::__construct($name, $basePrice);
    $this->brand = $brand;
    $this->weight = $weight;
    $this->volume = $volume;
  }

  public function shippingCost() {
    return $price = 2 + ($this->weight * 0.0002) +  ((int)(floor((float)($this->volume / 1000))));
  }

  public function calculatePriceTax() {
    return parent::calculateBasePrice() + $this->shippingCost();
  }
  public function __toString() {
    return parent::__toString() . 
    "<br>Peso: $this->weight 
    <br>Volumen: $this->volume 
    <br>Coste de envío: " . $this->shippingCost();
  }
}