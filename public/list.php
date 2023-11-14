<?php

require "../vendor/autoload.php";
require "virtualShop.php";

if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];

  if ($filter == 'all') {
    foreach($shop->showElements() as $e) {
      echo "<br><p>$e</p>";
    };
  } else if ($filter == 'products') {
    foreach($shop->showProducts() as $e) {
      echo "<br><p>$e</p>";
    };
  } else if ($filter == 'services') {
    foreach($shop->showElements() as $e) {
      echo "<br><p>$e</p>";
    };
  } else if ($filter == 'expirationDate') {
    foreach($shop->showElementsExpirationDate() as $e) {
      echo "<br><p>$e</p>";
    };  } else if ($filter == 'unexpired') {
      foreach($shop->showNoExpired() as $e) {
        echo "<br><p>$e</p>";
      };
  }
}