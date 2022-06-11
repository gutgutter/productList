<?php

include_once "components/item.php";
include_once "components/delete_products.php";

$products = new Item();
$results = $products->getAll();

while ($row = $results -> fetch(PDO::FETCH_OBJ)) {
  
  $products->getRow($row);
  
  $sku = $products->getSKU();
  $name = $products->getName();
  $price = $products->getPrice();
  $size = $products->getSize();
  $weight = $products->getWeight();
  $height = $products->getHeight();
  $width = $products->getWidth();
  $length = $products->getLength();
  
  $element = "
  <div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form action='index.php' method='post'>
      <div class='card-deck'>
        <div class='card border-2 border-success mb-3'>
          <div class='form-check pb-3'>
            <input class='form-check-input' type='checkbox' 
            form='delete_form' name='delete[]' value='$row->product_id' class='delete-checkbox'>
        
          </div>
          <div class='card-body'>
            <h6 class='card-title'>$sku</h6>
            <h6 class='card-text'>$name</h6>
            <h6 class='card-text'>$price  $</h6>";
  if (!empty($size)) {
    
    $element .= "
            <h6 class='card-text'>Size: $size MB</h6>";
  }
  if (!empty($weight)) {
    $element .= "
            <h6 class='card-text'>Weight: $weight Kg</h6>";
  }
  if (!empty($height)) {
    $element .= "
            <h6 class='card-text'>Dimensions: $height x $width x $length</h6>";
  }
  $element .= "
            
          </div>
        </div>
      </div>
    </form>
  </div>
  ";

  echo $element;
  
}