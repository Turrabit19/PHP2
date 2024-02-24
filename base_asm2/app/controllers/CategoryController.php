<?php
namespace App\Controllers;

use App\Models\Categories;
class CategoryController extends BaseController
{
    protected $categoryModel;
    public function __construct()
    {
        $this->categoryModel = new Categories();
    }
    public function listCategory() {
        $title = "Danh sách danh mục";
        $categories = $this->categoryModel->getCategory();
        return $this->render('category.index', compact('categories', 'title'));
    }
    public function addCategory()
    {
        $title = "Thêm danh mục";
        return $this->render('category.add', compact('title'));
    }
    public function postCategory() {
            if (isset($_POST['add']) && ($_POST['add']) != "") {
                $errors = [];
                if(empty($_POST['name'])) {
                    $errors[] = "Bạn không được bỏ trống tên";
                }

                if(count($errors) > 0) {
                    redirect('errors', $errors, 'add-category');
                } else {
                    $name = $_POST['name'];

                    $result = $this->categoryModel->addCategory(NULL, $name);
                    if ($result) {
                        redirect('success', 'Thêm mới thành công', 'add-category');
                    }
                }
            }
    }

    public function deleteCategory($id)
    {
        $result = $this->categoryModel->delCategory($id);
        if ($result) {
            header("location: " . BASE_URL . "home-category");
        }
    }

    public function detailCategory($id) {
        $title = "Sửa danh mục";
        $cgr = $this->categoryModel->getDetailCategory($id);
        $this->render('category.edit', compact('cgr', 'title'));
    }

    public function editCategory($id) {
        if (isset($_POST['update']) && ($_POST['update']) != "") {
            $errors = [];
            if(empty($_POST['name'])) {
                $errors[] = "Bạn không được bỏ trống tên";
            }

            if(count($errors) > 0) {
                redirect('errors', $errors, 'detail-category/' . $id);
            } else {
                $name = $_POST['name'];

                $result = $this->categoryModel->editCategory($id, $name);
                if ($result) {
                    // echo "Thêm mới thành công";
                    redirect('success', 'Cập nhật thành công', 'detail-category/' . $id);
                }
            }
        }
    }
}
