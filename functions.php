<?php

function dd($data) {
  echo '<pre>';
  die(var_dump($data));
  echo '</pre>';
}

function checkLegalAge($age) {
  return $age >= 21 ? "ENTRY GRANTED" : "NO ENTRY";
}
