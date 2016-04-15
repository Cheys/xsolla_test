<?php
class Main {

  private $mysqli;

  public function __construct(){
    $this->mysqli = new mysqli('localhost', 'cd05714_xsolla', 'f0kJW7RP', 'cd05714_xsolla');
    if ($this->mysqli->connect_error)throw new Exception('connect error '.$this->mysqli->connect_errno.'->'.$this->mysqli->connect_error);
  }


  public function escape($val){

    return $this->mysqli->real_escape_string($val);
  }
  public function add($order_id,$price,$currency,$fio,$data,$cvv){

    $this->mysqli->query("insert into orders (`order_id`,`price`,`currency`,`fio`,`card_m`,`card_y`,`cvv`, `when`) values ('".$this->escape((int)$order_id)."','".$this->escape((float)$price)."','".$this->escape($currency)."','".$this->escape($fio)."','".$this->escape((int)$data[0])."','".$this->escape((int)$data[1])."','".$this->escape((int)$cvv)."',NOW())");
  }
  public function upd($id,$order_id,$price,$currency,$fio,$data,$cvv){

    $resultat = $this->mysqli->query("update orders set `order_id`='".$this->escape((int)$order_id)."',`price`='".$this->escape((float)$price)."',`currency`='".$this->escape($currency)."',`fio`='".$this->escape($fio)."',`card_m`='".$this->escape((int)$data[0])."',`card_y`='".$this->escape((int)$data[1])."',`cvv`='".$this->escape((int)$cvv)."' where `id` = '".$this->escape((int)$id)."'",MYSQLI_USE_RESULT);
    return $resultat;
  }
}