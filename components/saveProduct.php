<?php

include_once 'components/item.php';

$item = new Item();

function clear_data($val) {
  $val = trim($val);
  $val = stripslashes($val);
  $val = strip_tags($val);
  $val = htmlspecialchars($val);
  return $val;
}

$sku = clear_data($_POST['sku']??'');
$name = clear_data($_POST['name']??'');
$price = clear_data($_POST['price']??'');
$type = clear_data($_POST['type']??'');
$size = clear_data($_POST['size']??'');
$weight = clear_data($_POST['weight']??'');
$height = clear_data($_POST['height']??'');
$width = clear_data($_POST['width']??'');
$length = clear_data($_POST['length']??'');


  $errSku = $errName = $errPrice = $errType = $erraSize = $errWeight = $errHeight = 
      $errWidth = $errLength = "";
  $input = true;

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      if($item->getUniqueSku($sku)) {
        $errSku = '<small class="text-danger">Sku already exists</small>';
        $input = false;
      } 
      if (!preg_match("/^([[:alnum:]])*$/", $sku)){
          $errSku = '<small class="text-danger">Letters followed by numbers</small>';
          $input = false;
      } 
      if(empty($sku)) {
          $errSku = '<small class="text-danger">Fill in this field</small>';
          $input = false;
      }
      if (!preg_match("/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/", $name)){
          $errName = '<small class="text-danger">Only letters and numbers</small>';
          $input = false;
      }
      if(empty($name)) {
          $errName = '<small class="text-danger">Fill in this field</small>';
          $input = false;
      }
      if (!preg_match("/^[-]?([1-9]{1}[0-9]{0,}(\.[0-9]{0,2})?|0(\.[0-9]{0,2})?|\.[0-9]{1,2})$/", $price)){
          $errPrice = '<small class="text-danger">Only float numbers</small>';
          $input = false;
      }
      if(empty($price)) {
          $errPrice = '<small class="text-danger">Fill in this field</small>';
          $input = false;
      }
      if($type == "") {
        $errType = '<small class="text-danger">Choose the type</small>';
        $input = false;
      } else if($type == 1){
          
          if(empty($size)) {
              $errSize = '<small class="text-danger">Fill in this field</small>';
              $input = false;
          }
      } else if($type == 2) {
        
          if(empty($weight)) {
              $errWeight = '<small class="text-danger">Fill in this field</small>';
              $input = false;
          }
      } else if($type == 3) {
          
          if(empty($height)) {
              $errHeight = '<small class="text-danger">Fill in this field</small>';
              $input = false;
          }
          
          if(empty($width)) {
              $errWidth = '<small class="text-danger">Fill in this field</small>';
              $input = false;
          } 
          
          if(empty($length)) {
              $errLength = '<small class="text-danger">Fill in this field</small>';
              $input = false;
          }
      }
         
  }


if ($input) {
  if (isset($_POST["save"])) {

    $item->setSku($sku);
    $item->setName($name);
    $item->setPrice($price);
    if(isset($type)) {
      $type = $type;
    }
    
    if(isset($size)) {
      $item->setSize($size);
    }
    if(isset($weight)) {
    $item->setWeight($weight);  
    }
    
    if(isset($height)) {
      $item->setHeight($height);
    }
    if(isset($width)) {
      $item->setWidth($width);
    }
    if(isset($length)) {
      $item->setLength($length);
    }

    $item -> insertItem($item->getSku(), $item->getName(), $item->getPrice(), 
    $item->getSize(), $item->getWeight(), $item->getHeight(), $item->getWidth(), $item->getLength(),);

    header("Location:index.php");
  }
}

