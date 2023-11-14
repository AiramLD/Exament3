<?php

namespace Airam\Examen;
use Airam\ExamenT3\Elements;
use Airam\ExamenT3\Products;
use Airam\ExamenT3\Services;
use Airam\ExamenT3\TimedOut;


class Shop {
  public $elements = [];
  public function addElements($element) {
    $this->elements[] = $element;
  }

  public function showElements() {
    $array = [];
    foreach ($this->elements as $i) {
      $array[] = $i;
    }
    return $array;
  }

  public function showProducts() {
    $array = [];
    foreach ($this->elements as $i) {
      if ( $i instanceof Products) {
        $array[] = $i;
      }
    }
    return $array;
  }

  public function showServices() {
    $array = [];
    foreach ($this->elements as $i) {
      if ( $i instanceof Services) {
        $array[] = $i;
      }
    }
    return $array;
  }

  public function showElementsTimedOutDate() {
    $array = [];
    foreach ($this->elements as $i) {
      if ( $i instanceof TimedOut) {
        $array[] = $i;
      }
    }
    return $array;
  }

  public function showNoTimedOut() {
    $array = [];
    foreach ($this->showElementsTimedOutDate() as $i) {
        if ($i->timedOut() == false) {

        $array[] = $i;
      }
    }
    return $array;
  }
}