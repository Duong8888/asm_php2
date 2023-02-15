<?php

namespace Web;
class CategoryController extends BaseController
{
    public $category;
    public $product;

    public function __construct()
    {
        $this->category = new Category();
        $this->product = new Product();
    }

    public function listCategory()
    {
        $listCategory = $this->category->getCategory();
        $path = '';
        if (isset($_SESSION['erro'])) {
            unset($_SESSION['erro']);
        }
        $this->render('category.list', compact('listCategory', 'path'));
    }

    public function showFormAdd()
    {
        $path = '';
        $this->render('category.add', compact('path'));
    }

    public function categoryDelete($id)
    {
        $path = '../';
        $productAll = $this->product;
        $category = $this->category->getCategory(false, $id);
        $product = $this->product->getProductCategory($id);
        $listCategory = $this->category->getCategory();
        $message = "Bạn chắc chắn muốn thực hiện hành động này chứ?";
        $this->render('category.delete', compact('path', 'category', 'product', 'productAll', 'listCategory', 'message'));
    }

    public function addCategory()
    {
        $file = $_FILES['img-category'];
        $fileName = "./public/img/" . $file['name'];
        $data = [
            'categories_name' => $_POST['category_name'],
            'image' => $fileName
        ];
        move_uploaded_file($file['tmp_name'], $fileName);
        $this->category->addDataCategory($data);
        header("location:category");
    }

    public function updateProduct()
    {
        $iddm = $_POST['category-1'];
        unset($_POST['category-1']);
        $arrUpdate = $_POST;
        foreach ($arrUpdate as $key => $value) {
            $this->product->updateCategory($iddm, $key);
        }
        header("location:" . BASE_URL . 'category');
    }

    public function deleteCategory($id)
    {
        $countProduct = $this->product->getProductCategory($id);
        if (count($countProduct) == 0) {
            $this->category->deleteDataCategory($id);
            if (isset($_SESSION['erro'])) {
                unset($_SESSION['erro']);
            }
            header("location:" . BASE_URL . 'category');
        } else {
            $_SESSION['erro'] = "Vui long chuyển các sản phẩm ở danh mục này sang danh mục khác để tiến hành xóa danh mục !";
            header("location:" . BASE_URL . 'category-delete/' . $id);
        }

    }
}