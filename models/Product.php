<?php
namespace Web;

class Product extends db{

    function hello(){
        echo "hello";
    }


    public function getProduct()
    {
        $sql = "SELECT * FROM products";
        return $this->getData($sql);
    }

    public function addData($name, $price)
    {
        $sql = "INSERT INTO products(product_name,product_price,descripton,iddm) VALUES (product_name,product_price,descripton,iddm)";
        return $this->getData($sql);
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM products WHERE id=$id";
        return $this->getData($sql);
    }
}
