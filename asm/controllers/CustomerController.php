<?php
require_once "models/Customer.php";

class CustomerController {
    protected $customerModel;
    public function __construct()
    {
        $this->customerModel = new Customer();
    }
    public function listCustomer() {

        $customers = $this->customerModel->getCustomer();
        include_once "views/Customer/ListCustomer.php";
    }

    public function createCustomer() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['add']) && ($_POST['add']) != "") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];

                $this->customerModel->addCustomer($name, $email, $phone);

                $thongbao = "Cập nhật thành công";
            }
        }

        include_once "views/Customer/AddCustomer.php";
    }

    public function deleteCustomer()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $this->customerModel->delCustomer($_GET['id']);
        }
        $customers = $this->customerModel->getCustomer();
        include_once "views/Customer/ListCustomer.php";
    }

    public function editCustomer() {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $cus = $this->customerModel->detailCustomer($_GET['id']);
        }
        include_once "views/Customer/UpdCustomer.php";
    }

    public function updateCustomer() {
        if (isset($_POST['update']) && ($_POST['update']) != "") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $this->customerModel->updCustomer($id, $name, $email, $phone);

            $thongbao = "Cập nhật thành công";
        }

        $customers = $this->customerModel->getCustomer("", 0);
        include_once "views/Customer/ListCustomer.php";
    }
}
