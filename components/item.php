<?php

    include_once 'components/Product.php';

    class Item extends Product {

        private $sku;
        private $name;
        private $price;
        private $size;
        private $weight;
        private $height;
        private $width;
        private $length;
        protected $conn;
            
        public function __construct()
        {
            $db = new Connection();
            $this->conn = $db->getConnection();
        }

        public function getRow($row_from_database) 
        {
            
            $this->sku = $row_from_database->sku;
            $this->name = $row_from_database->name;
            $this->price = $row_from_database->price;
            $this->size = $row_from_database->size;
            $this->weight = $row_from_database->weight;
            $this->height = $row_from_database->height;
            $this->width = $row_from_database->width;
            $this->length = $row_from_database->length;
        }

        public function getSKU() {
            return $this -> sku;
        }
        public function getName() {
            return $this -> name;
        }
        public function getPrice() {
            return $this -> price;
        }
        public function getSize() {
            return $this -> size;
        }
        public function getWeight() {
            return $this -> weight;
        }
        public function getHeight() {
            return $this -> height;
        }
        public function getWidth() {
            return $this -> width;
        }
        public function getLength() {
            return $this -> length;
        }

        public function setSku($sku) {
            $this->sku = $sku;
        }
        public function setName($name) {
            $this->name = $name;
        }
        public function setPrice($price) {
            $this->price = $price;
        }
        public function setSize($size) {
            $this->size = $size;
        }
        public function setWeight($weight) {
            $this->weight = $weight;
        }
        public function setHeight($height) {
            $this->height = $height;
        }
        public function setWidth($width) {
            $this->width = $width;
        }
        public function setLength($length) {
            $this->length = $length;
        }

        public function getAll() {

            $query = "SELECT * FROM `item`";

            $results = $this -> conn -> query($query);

            return $results;
           
        }

        public function deleteItem($product_id){
            $sql = "DELETE FROM `item` WHERE product_id = :product_id";

            $query = $this->conn -> prepare($sql);
            $query -> bindParam('product_id', $product_id);
            $query -> execute();
        }
        public function insertItem($sku, $name, $price, $size, $weight, $height, $width, $length) {

            $query = "INSERT INTO `item` (`sku`, `name`, `price`, 
            `size`, `weight`, `height`, `width`, `length`) 
                VALUES(:sku, :name, :price, :size, :weight, :height, :width, :length)";
            
            $stmt = $this-> conn -> prepare($query);

            $stmt -> bindParam(':sku', $sku);
            $stmt -> bindParam(':name', $name);
            $stmt -> bindParam(':price', $price);
            $stmt -> bindParam(':size', $size);
            $stmt -> bindParam(':weight', $weight);
            $stmt -> bindParam(':height', $height);
            $stmt -> bindParam(':width', $width);
            $stmt -> bindParam(':length', $length);
            
            $stmt -> execute();
        }

        public function getUniqueSku($sku) {
            $uniqueSku = [];
            $data = self::getAll();

            while ($row = $data ->fetch(PDO::FETCH_ASSOC)) {
                array_push($uniqueSku, $row['sku']); 
            }
            if(in_array($sku, $uniqueSku)) {
                return true;
            } else {
                return false;
            }

        }
    }
?>