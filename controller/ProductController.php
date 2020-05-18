<?php
namespace model;

use model\ProductDB;

class ProductController
{
    public $productDB;

    public function __construct()
    {
        $conn = new \model\DBConnect("mysql:host=localhost;dbname=testModule2", "admin", "kie14392");
        $this->productDB = new ProductDB($conn->connect());
    }

    public function index()
    {
        $products = $this->productDB->getAllProducts();
        include "view/list.php";
    }
}