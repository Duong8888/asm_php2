<?php
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
