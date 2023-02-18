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

    public function addUser($action = '')
    {
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
        if($action == 'sign-up'){
            header('location:' . BASE_URL . 'sign-in');
        }else{
            header('location:' . BASE_URL . 'user-list');
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
        if($action){
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
                if($checkMail[0]['position'] == 1){
                    header("location:" . BASE_URL . "product-list");
                }else{
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