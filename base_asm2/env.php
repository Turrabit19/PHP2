<?php
const BASE_URL = "http://localhost/WEB3014_PHP2/base_asm2/";
const DBHOST = "localhost";
const DBNAME = "mvc";
const DBCHARSET = "utf8";
const DBUSER = "root";
const DBPASS = "";

function redirect($key = "",$msg = "",$url ="") {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case "errors":
            unset($_SESSION['success']);
            break;
        case "success":
            unset($_SESSION['errors']);
            break;
    }
    header('location: ' . BASE_URL . $url."?msg=".$key);die;
}

function route($name) {
    return BASE_URL.$name;
}