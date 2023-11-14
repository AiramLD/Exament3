<?php

require "../vendor/autoload.php";
require "virtualShop.php";

if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];

  if ($filter == 'all') {
    foreach($shop->showElements() as $i) {
      echo "<br><p>$i</p>";
    };
  } else if ($filter == 'products') {
    foreach($shop->showProducts() as $i) {
      echo "<br><p>$i</p>";
    };
  } else if ($filter == 'services') {
    foreach($shop->showElements() as $i) {
      echo "<br><p>$i</p>";
    };
  } else if ($filter == 'finalDate') {
    foreach($shop->showElementsTimedOutDate() as $i) {
      echo "<br><p>$i</p>";
    };  } else if ($filter == 'unexpired') {
      foreach($shop->showNoTimedOut() as $i) {
        echo "<br><p>$i</p>";
      };
  }
}