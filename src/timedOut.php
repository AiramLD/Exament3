<?php
namespace Airam\Store;
interface TimedOut {
  public function timedOut();
  public function daysLeft();
}