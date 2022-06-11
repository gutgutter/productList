<?php

    include_once 'components/database.php';

    abstract class Product {

        abstract function getSku();
        abstract function getName();
        abstract function getPrice();  
        abstract function getSize();  
        abstract function getWeight();  
        abstract function getHeight();  
        abstract function getWidth();  
        abstract function getLength();  
        abstract function getAll();
        abstract function insertItem($sku, $name, $price, $size, 
        $weight, $height, $width, $length);
                
    }

?>