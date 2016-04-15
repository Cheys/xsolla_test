<?php
	ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
  $d = DateTime::createFromFormat("m/Y","11/2001");
  if ($d!==false){
    $data = explode('/',"11/2001");
  }else{
    throw new Exception('ys ');
  }

print_r($data);