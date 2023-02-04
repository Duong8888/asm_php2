<?php
namespace Web;
class ProductController
{
    function listProduct()
    {
        $product = new Product();
        $product = $product->getProduct();
        $view = 'product/v_listProduct.php';
        include_once './views/layout.php';
    }

    function addProduct()
    {
        $view = 'views/product/v_add.php';
        include_once './views/layout.php';
        if (isset($_POST['add'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            if (empty($name) || empty($price)) {
                header('location:index.php?url=add-product&erro&name=' . $name . '&price=' . $price . '');
            } else {
                $product = new Product();
                $product->addData($name, $price);
                header('location:index.php');
            }
        }
    }

    function editProduct(){
        $view = 'views/product/v_add.php';
        include_once './views/layout.php';
    }

    function deleteProduct()
    {
        $id = $_GET['id'];
        $product = new Product();
        $product->deleteData($id);
        header('location:index.php');
    }

// tao fuction giong nhu tren
// tao bang nhan vien gom id,ten,luong
// lam chuc nang danh sach,them,xoa bang mvc da hoc

}

?>