<?php

include_once "components/item.php";

$products = new Item();
if (isset($_POST["but_delete"])) {
 
  if (isset($_POST["delete"])) {
    foreach ($_POST["delete"] as $deleteid) {
      $products->deleteItem($deleteid); 
      
    }
  }
  
  header("Location:index.php");
}
