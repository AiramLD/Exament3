<?php
namespace Airam\Examen;
interface TimedOut {
  public function timedOut();
  public function daysLeft();
}