<?php

namespace Web;
class Product extends db
{
    public function getProduct($action = true, $id = '')
    {
        if ($action) {
            $sql = "SELECT * FROM products";
            return $this->getData($sql);
        } else {
            $sql = "SELECT * FROM img_product WHERE idpro = $id";
            return $this->getData($sql);// trả về mảng ảnh của sản phẩm
        }
    }

    public function getOneProduct($id)
    {
        $sql = "SELECT * FROM products WHERE idpro = $id";
        return $this->getData($sql, [], false);
    }

    public function addData($data = [], $action = true)
    {
        // các khai báo chuẩn bị sql đọc tại https://www.php.net/manual/en/pdostatement.execute.phps
        if ($action) {
            $sql = "INSERT INTO products(product_name,product_price,descripton,iddm) VALUES (:product_name,:product_price,:descripton,:iddm)";
        } else {
            $sql = "INSERT INTO img_product(idpro,src) VALUES (:idpro,:src)";
        }
        return $this->getData($sql, $data, 'add');
    }

    public function deleteData($id, $action = true)
    {
        if ($action) {
            $sql = "DELETE FROM products WHERE idpro=$id";
        } else {
            $sql = "DELETE FROM img_product WHERE id=$id";
        }
        return $this->getData($sql);
    }

    public function updateData($data = [])
    {
        $sql = "UPDATE products SET product_name=:product_name,product_price=:product_price,descripton=:descripton,iddm=:iddm WHERE idpro=:idpro";
        return $this->getData($sql, $data, 'update');
    }

    public function searchProduct($search)
    {
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
        return $this->getData($sql);
    }

    public function getProductCategory($id)
    {
        $sql = "SELECT * FROM products WHERE iddm = $id";
        return $this->getData($sql);
    }

    public function updateCategory($iddm,$idpro){
        $sql = "UPDATE `products` SET `iddm`=$iddm WHERE idpro = $idpro";
        return $this->getData($sql);
    }

}
