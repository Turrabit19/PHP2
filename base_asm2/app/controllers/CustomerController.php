<?php
namespace App\Controllers;

use App\Models\Customers;
class CustomerController extends BaseController
{
    protected $customerModel;
    public function __construct()
    {
        $this->customerModel = new Customers();
    }
    public function listCustomer() {
        $title = "Danh sách khách hàng";
        $customers = $this->customerModel->getCustomer();
        return $this->render('user.index', compact('customers', 'title'));
    }
    public function addCustomer()
    {
        $title = "Thêm khách hàng";
        return $this->render('user.add', compact('title'));
    }
    public function postCustomer() {
            if (isset($_POST['add']) && ($_POST['add']) != "") {
                $errors = [];
                if (empty($_POST['name'])) {
                    $errors[] = "Bạn không được bỏ trống tên";
                }
                if (empty($_POST['email'])) {
                    $errors[] = "Bạn không được bỏ trống email";
                } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Email bạn điền là không hợp lệ";
                }
                if (empty($_POST['phone'])) {
                    $errors[] = "Bạn không được bỏ trống số điện thoại";
                }

                if (count($errors) > 0) {
                    redirect('errors', $errors, 'add-customer');
                } else {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];

                    $result = $this->customerModel->addCustomer(NULL, $name, $email, $phone);
                    if ($result) {
                        redirect('success', 'Thêm mới thành công', 'add-customer');
                    }
                }
            }
    }

    public function deleteCustomer($id)
    {
        $result = $this->customerModel->delCustomer($id);
        if ($result) {
            header("location: " . BASE_URL . "home-customer");
        }
    }

    public function detailCustomer($id) {
        $title = "Sửa khách hàng";
        $cus = $this->customerModel->getDetailCustomer($id);
        $this->render('user.edit', compact('cus', 'title'));
    }

    public function editCustomer($id) {
        if (isset($_POST['update']) && ($_POST['update']) != "") {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = "Bạn không được bỏ trống tên";
            }
            if (empty($_POST['email'])) {
                $errors[] = "Bạn không được bỏ trống email";
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email bạn điền là không hợp lệ";
            }
            if (empty($_POST['phone'])) {
                $errors[] = "Bạn không được bỏ trống số điện thoại";
            }

            if (count($errors) > 0) {
                redirect('errors', $errors, 'detail-customer/' . $id);
            } else {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];

                $result = $this->customerModel->editCustomer($id, $name, $email, $phone);
                if ($result) {
                    redirect('success', 'Cập nhật thành công', 'detail-customer/' . $id);
                }
            }
        }
    }
}
