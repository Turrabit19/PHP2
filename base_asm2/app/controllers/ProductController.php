<?php
namespace App\Controllers;

use App\Models\Products;
use App\Models\Categories;
class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    public function __construct()
    {
        $this->productModel = new Products();
        $this->categoryModel = new Categories();
    }
    public function listProduct() {
        $products = $this->productModel->getProduct();
        return $this->render('product.index', compact('products'));
    }
    public function addProduct()
    {
        $title = "Thêm sản phẩm";
        $categories = $this->categoryModel->getCategory();
        return $this->render('product.add', compact('categories', 'title'));
    }
    public function postProduct()
    {
        if (isset($_POST['add']) && ($_POST['add']) != "") {
            $errors = [];
            if (empty($_POST['idcgr'])) {
                $errors[] = "Bạn không được bỏ trống danh mục";
            }
            if (empty($_POST['name'])) {
                $errors[] = "Bạn không được bỏ trống tên";
            }
            if (empty($_FILES['img']['name'])) {
                $errors[] = "Bạn không được bỏ trống ảnh";
            }
            if (empty($_POST['price'])) {
                $errors[] = "Bạn không được bỏ trống giá";
            }
            if (empty($_POST['des'])) {
                $errors[] = "Bạn không được bỏ trống mô tả";
            }

            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-product');
            } else {
                $name = $_POST['name'];
                $img = $_FILES['img']['name'];
                $price = $_POST['price'];
                $des = $_POST['des'];
                $idcgr = $_POST['idcgr'];

                $result = $this->productModel->addProduct(NULL, $name, $img, $price, $des, $idcgr);
                if ($result) {
                    redirect('success', 'Thêm mới thành công', 'add-product');
                }
            }
        }
    }

    public function deleteProduct($id)
    {
        $result = $this->productModel->delProduct($id);
        if ($result) {
            header("location: " . BASE_URL . "home-product");
        }
    }

    public function detailProduct($id) {
        $title = "Sửa sản phẩm";
        $pro = $this->productModel->getDetailProduct($id);
        $cgrs = $this->categoryModel->getCategory();
        $this->render('product.edit', compact('pro', 'cgrs', 'title'));
    }


    public function editProduct($id) {
        if (isset($_POST['update']) && ($_POST['update']) != "") {
            $errors = [];
            if (empty($_POST['idcgr'])) {
                $errors[] = "Bạn không được bỏ trống danh mục";
            }
            if (empty($_POST['name'])) {
                $errors[] = "Bạn không được bỏ trống tên";
            }
            if (empty($_POST['price'])) {
                $errors[] = "Bạn không được bỏ trống giá";
            }
            if (empty($_POST['des'])) {
                $errors[] = "Bạn không được bỏ trống mô tả";
            }

            if (count($errors) > 0) {
                redirect('errors', $errors, 'detail-product/' . $id);
            } else {
            $name = $_POST['name'];
            $img = $_FILES['img']['name'];
            $price = $_POST['price'];
            $des = $_POST['des'];
            $idcgr = $_POST['idcgr'];

            $result = $this->productModel->editProduct($id, $name, $img, $price, $des, $idcgr);
                if ($result) {
                    redirect('success', 'Cập nhật thành công', 'detail-product/' . $id);
                }
            }
        }
    }
}