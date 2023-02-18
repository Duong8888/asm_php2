<?php
ob_start();
session_start();
const DBNAME = "foodlum";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";
const BASE_URL = 'http://localhost/asm_php2/';
if(isset($_POST['search'])){
    $_SESSION['key'] = $_POST['search'];
}

function redirect($key,$msg,$route) {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case 'success':
            unset($_SESSION['errors']);
            break;
        case 'errors':
            unset($_SESSION['success']);
            break;
    }
    header('location:'.BASE_URL.$route."?msg=".$key);die;
}
