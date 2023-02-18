<?php

namespace Web;
class ProductController extends BaseController
{
    function listProduct()
    {
        $product = new Product();
        $productPage = new Pagination('products', 'idpro', 5);
        $productsPages = $productPage->page();
        $productsPagesCount = $productPage->countPage();
        $path = '';
        $message = "Bạn muốn xóa chứ ?";
        $this->render('product.list', compact('path', 'productsPages', 'productsPagesCount', 'product', 'message'));
    }

    function addProductForm()
    {
        $path = '';
        $category = new Category();
        $listCategory = $category->getCategory();
        $this->render('product.add', compact('path', 'listCategory'));
    }

    function addDataProduct()
    {
        $errors = [];
        if (empty($_POST['product_name'])) {
            $errors['product_name'] = 'Vui lòng nhập tên sản phẩm';
        }
        if (empty($_POST['product_price'])) {
            $errors['product_price'] = 'Vui lòng nhập giá sản phẩm';
        }
        if (empty($_POST['description'])) {
            $errors['description'] = 'Vui lòng nhập mô tả sản phẩm';
        }
        if (empty($_POST['category'])) {
            $errors['category'] = 'Vui lòng chọn danh mục';
        }
        if ($_FILES['img-product']['size'] == 0) {
            $errors['img-product'] = 'Vui lòng chọn ảnh sản phẩm';
        }
        if (count($errors) != 0) {
            redirect('errors', $errors, 'add-product');
        }

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
            redirect('success', "Thêm sản phẩm thành công", 'add-product');
        }
    }

    function editProduct($id = 0, $save = true)
    {
        if ($save) {
            $product = new Product();
            $data = [
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'descripton' => $_POST['description'],
                'iddm' => $_POST['category'],
                'idpro' => $id
            ];
            $product->updateData($data);
            unset($_POST['product_name'], $_POST['product_price'], $_POST['description'], $_POST['category'], $_POST['add-product']);
            foreach ($_POST as $key => $value) {
                $product->deleteData($key, false);
            }
            $arrImg = $_FILES['img-product'];
            if ($arrImg['name'][0] !== '') {

                $dataImage = [];
                foreach ($arrImg['name'] as $item) {
                    $dataImage[] = [
                        'idpro' => $id,
                        'src' => "./public/img/" . $item
                    ];
                }
                foreach ($arrImg['tmp_name'] as $key => $item) {
                    $product->addData($dataImage[$key], false);
                    move_uploaded_file($item, $dataImage[$key]['src']);// add ảnh vào foder code
                }
            }
            header('location:' . BASE_URL . 'product-list');
        } else {
            $category = new Category();
            $listCategory = $category->getCategory();
            $product = new Product();
            $productInfo = $product->getOneProduct($id);
            $getImage = $product->getProduct(false, $id);
            $path = '../';
            $this->render('product.edit', compact('path', 'productInfo', 'getImage', 'listCategory'));
        }
    }

    function deleteProductAll()
    {
        $product = new Product();
        unset($_POST['search-table']);
        $arrDelete = $_POST;
        foreach ($arrDelete as $key => $value) {
            $product->deleteData($key);
        }
        header('location:product-list');
    }

    function deleteProduct($id)
    {
        $product = new Product();
        $product->deleteData($id);
        header('location:' . BASE_URL . 'product-list');
    }
}

?>