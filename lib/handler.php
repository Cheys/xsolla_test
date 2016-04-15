<?php
include 'my.class.php';
$class  = new Main;
$errors = array();
//Validation
if (isset($_POST['id'])&&(strlen((int)$_POST['id'])<=16))
  $order_id = $_POST['id'];
else
  $errors[] = 'Номер заказа';

if (isset($_POST['price'])&&(0<(strlen((float)$_POST['price'])<17)&&(strlen((float)$_POST['price'])>0)))
  $price = $_POST['price'];
else
  $errors[] = 'Цена';

$curr_kinds = array('RUB','USD');
if (isset($_POST['currency'])&&(in_array($_POST['currency'],$curr_kinds)))
  $currency = $_POST['currency'];
else
  $errors[] = 'Валюта';


$fio_reg = '/[A-Za-z\s]{1,25}/';
if (isset($_POST['fio'])&&(preg_match($fio_reg,$_POST['fio'])))
  $fio = $_POST['fio'];
else
  $errors[] = 'Владелец';

if (isset($_POST['data'])&&($_POST['data'])){
  $d = DateTime::createFromFormat('m/Y',$_POST['data']);
  if ($d!==false){
    $data = explode('/',$_POST['data']);
  }else{
    $errors[] = 'Ex.date';
  }
}
else
  $errors[] = 'Ex.date';

if (isset($_POST['cvv'])&&(strlen((int)$_POST['cvv'])==3)){
  $cvv = $_POST['cvv'];
}
else
  $errors[] = 'cvv';
if (isset($_POST['create'])){
  if (empty($errors)){
  	$class->add($order_id,$price,$currency,$fio,$data,$cvv);
  	echo 'ok';
  }
  else{
  	echo $errors;
  }
}
if (isset($_POST['pid'])){
  $data = array();
  $data[0]=$_POST['month'];
  $data[1]=$_POST['year'];
  $pid = $_POST['pid'];
  $res = $class->upd($pid,$order_id,$price,$currency,$fio,$data,$cvv);
  if ($res===true)
    echo 'ok';
  else
    'kosyak';
}
