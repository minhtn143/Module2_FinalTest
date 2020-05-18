<?php
namespace model;

use model\Product;

class ProductDB
{
    public $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        return $this->getFromDB($stmt);
    }

    public function getFromDB($stmt)
    {
        $stmt->execute();
        $result = $stmt->fetchAll();
        $products = [];
        foreach ($result as $item) {
            $product = new Product($item['name'], $item['productLineId'], $item['price'], $item['quantity'],$item['description']);
            $product->setCode($item['code']);
            array_push($products, $product);
        }
        return $products;
    }

}