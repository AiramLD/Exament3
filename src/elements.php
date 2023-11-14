<?php

namespace Airam\Store;
abstract class Elements {
    protected $name;
    protected $basePrice;
    protected $tax = 0.07;

public function __construct($name, $basePrice) {
    $this->name = $name;
    $this->basePrice = $basePrice;
}
public function calculateBasePrice() {
    return $this->basePrice + ($this->basePrice * $this->tax);
}
public function setTax($newTax) {
    $this->tax = $newTax;
}
public function __toString() {
        return "Nombre: $this->name <br>
        Precio base: $this->basePrice";
    }
}