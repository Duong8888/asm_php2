<?php

namespace Web;

class UserController extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showSignIn()
    {
        $path = '../';
        $this->render('logIn.signIn', compact('path'));
    }

    public function showSignUp()
    {
        $path = '../';
        $this->render('logIn.signUp', compact('path'));
    }

    public function showFormAdd()
    {
        $this->render('user.add');
    }

    public function editUser($id, $action = '')
    {
        if ($action == 'save') {
            $file = $_FILES['img-user'];
            if ($file['size'] > 0) {
                $file_name = "./public/img/" . $file['name'];
                $data = [
                    'user_name' => $_POST['user_name'],
                    'full_name' => $_POST['user_name'],
                    'pass' => $_POST['pass'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'address' => "Hà Tây",
                    'position' => 0,
                    'avatar' => $file_name,
                    'iduser' => $id
                ];
                $this->user->updateDataUser($data);
            } else {
                $data = [
                    'user_name' => $_POST['user_name'],
                    'full_name' => $_POST['user_name'],
                    'pass' => $_POST['pass'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'address' => "Hà Tây",
                    'position' => 0,
                    'iduser' => $id
                ];
                $this->user->updateDataUser($data,false);
            }
            header('location:'.BASE_URL.'user-list');
        } else {
            $path = '../';
            $infoUser = $this->user->getDataUser(false, $id);
            $this->render('user.edit', compact('path', 'infoUser'));
        }
    }

    public function addUser($action = '')
    {
        $errors = [];
        if (empty($_POST['user_name'])) {
            $errors['user_name'] = 'Vui lòng nhập tên';
        }
        if (empty($_POST['pass'])) {
            $errors['pass'] = 'Vui lòng nhập mật khẩu';
        }
        if ($_POST['pass'] !== $_POST['re-pass']) {
            $errors['re-pass'] = 'Mật khẩu không khớp';
        }
        if (empty($_POST['email'])) {
            $errors['email'] = 'Vui lòng nhập email';
        } else {
            $pattern = '/^[a-z]+[a-z\.0-9-_]{2,}@[a-z\.0-9-_]{3,}.[a-z]{2,}$/';
            $check = preg_match($pattern, $_POST['email']);
            if ($check == 0) {
                $errors['email'] = 'Email không đúng định dạng';
            }
        }
        if (empty($_POST['phone'])) {
            $errors['phone'] = 'Vui lòng nhập số điện thoại';
        } else {
            $pattern = '/^0[0-9]{9}$/';
            $matches = preg_match($pattern, $_POST['phone']);
            if ($matches == 0) {
                $errors['phone'] = 'Số điện thoại không đúng định dạng';
            }
        }
        if ($_FILES['img-user']['size'] == 0) {
            $errors['img-user'] = 'Vui lòng chọn ảnh';
        }
        if (count($errors) != 0) {
            redirect('errors', $errors, 'add-user');
        }
        $file = $_FILES['img-user'];
        $file_name = "./public/img/" . $file['name'];
        $data = [
            'user_name' => $_POST['user_name'],
            'full_name' => $_POST['user_name'],
            'pass' => $_POST['pass'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => "Hà Tây",
            'position' => 0,
            'avatar' => $file_name
        ];
        move_uploaded_file($file['tmp_name'], $file_name);
        $this->user->addDataUser($data);
        if ($action == 'sign-up') {
            redirect('success', "Đăng kí thành công", 'sign-up');
        } else {
            redirect('success', "Thêm user thành công", 'add-user');
        }
    }

    public function userList()
    {
        $userPage = new Pagination('user', 'iduser', 5);
        $arrUser = $userPage->page(false, 'position', 0);
        $userPagesCount = $userPage->countPage();
        $path = '';
        $message = "Bạn chắc chắn muốn xóa chứ ?";
        $this->render('user.list', compact('arrUser', 'path', 'userPagesCount', 'message'));
    }

    public function deleteUser($id)
    {
        $this->user->deleteDataUser($id);
        header("location:/asm_php2/user-list");
    }

    public function deleteAllUser()
    {
        $arrCheck = $_POST;
        foreach ($arrCheck as $key => $value) {
            $this->deleteUser($key);
        }
        header("location:/asm_php2/user-list");
    }

    public function checkSignIn($action = false)
    {
        if ($action) {
            unset($_SESSION['auth']);
            header("location:" . BASE_URL . "sign-in");
            die();
        }
        $email = "'" . $_POST['account'] . "'";
        $pass = "'" . $_POST['pass'] . "'";
        $checkMail = $this->user->checkInfo('email', $email);
        if (count($checkMail) > 0) {
            $id = $checkMail[0]['iduser'];
            $checkPass = $this->user->checkInfo('pass', $pass, $id);
            if (count($checkPass) > 0) {
                $_SESSION['auth'] = $id;
                if ($checkMail[0]['position'] == 1) {
                    header("location:" . BASE_URL . "product-list");
                } else {
                    header("location:" . BASE_URL . "home-user");
                }
            } else {
                header("location:" . BASE_URL . "sign-in");
            }
        } else {
            header("location:" . BASE_URL . "sign-in");
        }
    }
}