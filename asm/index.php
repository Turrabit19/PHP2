<?php
// Giúp điều hướng đến control mà ta sử dụng
$url = isset($_GET['url']) == true ? $_GET['url'] : '/';
require_once "controllers/CustomerController.php";
$customerControl = new CustomerController();

switch ($url) {
    case '/':
        $customerControl->listCustomer();
        break;

    case 'list-customer':
        $customerControl->listCustomer();
        break;

    case 'add-customer':
        $customerControl->createCustomer();
        break;

    case 'del-customer':
        $customerControl->deleteCustomer();
        break;

    case 'edit-customer':
        $customerControl->editCustomer();
        break;

    case 'upd-customer':
        $customerControl->updateCustomer();
        break;
}
?>