<?php

namespace Airam\Store;
use Airam\Store\Services;

class NormalServices extends Services{
  public function __construct($name, $basePrice) { 
    parent::__construct($name, $basePrice);
  }
  public function __toString() {
    return parent::__toString();
  }
}