<?php

namespace Web;

class SliderController extends BaseController
{
    public $slide;

    public function __construct()
    {
        $this->slide = new Slider();
    }

    function showSlider()
    {
        $arrSlide = $this->slide->getSlider();
        $path = '';
        $message = 'Bạn chắc chắn muốn xóa chứ.';
        $this->render('slider.list', compact('arrSlide', 'path', 'message'));
    }

    function deleteSlider($id = '')
    {
        $this->slide->deleteSlider($id);
        header('location:' . BASE_URL . 'slider-list');
    }

    public function deleteAll()
    {
        foreach ($_POST as $key => $value) {
            $this->slide->deleteSlider($key);
        }
        header('location:' . BASE_URL . 'slider-list');
    }

    public function showFormAdd()
    {
        $path = '';
        $this->render('slider.add', compact('path'));
    }

    public function addSlider()
    {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors['title'] = 'Bạn chưa nhập tiều đề';
        }
        if (empty($_POST['description'])) {
            $errors['description'] = 'Bạn chưa nhập mô tả';
        }
        if ($_FILES['img']['size'] == 0) {
            $errors['img'] = 'Bạn chưa chọn ảnh';
        }
        if (count($errors) != 0) {
            redirect('errors', $errors, 'add-slider');
        }
        $img = $_FILES['img'];
        $imgName = "./public/img/" . $img['name'];
        $data = [$imgName, $_POST['title'], $_POST['description']];
        $this->slide->addSlider($data);
        move_uploaded_file($img['tmp_name'], $imgName);
        redirect('success', "Thêm thành công.", 'add-slider');
    }

    public function editSlider($id = '')
    {
        $path = '../';
        $infoSlider = $this->slide->getSlider(false, $id);
        $this->render('slider.edit', compact('path', 'infoSlider'));
    }

    public function saveEdit($id)
    {
        $img = $_FILES['img'];
        if ($_FILES['img']['size'] == 0) {
            $data = [$_POST['title'], $_POST['description'],$id];
            $this->slide->updateSlider($data, false);
        } else {
            $imgName = "./public/img/" . $img['name'];
            $data = [$imgName, $_POST['title'], $_POST['description'],$id];
            $this->slide->updateSlider($data);
            move_uploaded_file($img['tmp_name'], $imgName);
        }
        header("location:" . BASE_URL . 'slider-list');
    }
}