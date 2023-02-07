<?php
namespace Web;
class ProductController
{
    function listProduct()
    {
        $product = new Product();
        $productPage = new Pagination('products', 'idpro', 5);
        $productsPages = $productPage->page();
        $productsPagesCount = $productPage->countPage();
        $products = $product->getProduct();
        $view = 'product/v_listProduct.php';
        include_once './views/layout.php';
    }

    function addProduct()
    {
        $view = 'views/product/v_add.php';
        include_once './views/layout.php';
        if (isset($_POST['add-product'])) {
            $data = [
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'descripton' => $_POST['description'],
                'iddm' => $_POST['category']
            ];
            $product = new Product();
            $idpro = $product->addData($data);// lấy id vừa insert vào bảng
            $arrImg = $_FILES['img-product'];// mảng các file được thêm vào
            $dataImage = [];// tạo mảng lưu dữ liệu để thêm vào db
            foreach ($arrImg['name'] as $item) {
                $dataImage[] = [
                    'idpro' => $idpro,
                    'src' => "./public/img/" . $item
                ];
            }
            foreach ($arrImg['tmp_name'] as $key => $item) {
                $product->addData($dataImage[$key], false);
                move_uploaded_file($item, $dataImage[$key]['src']);// add ảnh vào foder code
            }
        }
    }

    function editProduct($save = true)
    {
        if ($save) {
            $product = new Product();
            $data = [
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'descripton' => $_POST['description'],
                'iddm' => $_POST['category'],
                'idpro' => $_GET['idpro']
            ];
            $product->updateData($data);
            unset($_POST['product_name'], $_POST['product_price'], $_POST['description'], $_POST['category'], $_POST['add-product']);
            foreach ($_POST as $key =>$value){
                $product->deleteData($key,false);
            }
            $arrImg = $_FILES['img-product'];
            if ($arrImg['name'][0] !== '') {

                $dataImage = [];
                foreach ($arrImg['name'] as $item) {
                    $dataImage[] = [
                        'idpro' => $_GET['idpro'],
                        'src' => "./public/img/" . $item
                    ];
                }
                foreach ($arrImg['tmp_name'] as $key => $item) {
                    $product->addData($dataImage[$key], false);
                    move_uploaded_file($item, $dataImage[$key]['src']);// add ảnh vào foder code
                }
            }
            header('location:index.php');
        } else {
            $product = new Product();
            $productInfo = $product->getOneProduct($_GET['idpro']);
            $getImage = $product->getProduct(false, $_GET['idpro']);
            $view = 'views/product/v_edit.php';
            include_once './views/layout.php';
        }
    }

    function deleteProduct()
    {
        $product = new Product();
        if (isset($_GET['products'])) {
            unset($_POST['search-table']);
            $arrDelete = $_POST;
            foreach ($arrDelete as $key => $value) {
                $product->deleteData($key);
            }
        } else {
            $id = $_GET['id'];
            $product->deleteData($id);
        }
        header('location:index.php');
    }
}

?>