<?php
session_start();
const DBNAME = "foodlum";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";
if(isset($_POST['search'])){
    $_SESSION['key'] = $_POST['search'];
}
