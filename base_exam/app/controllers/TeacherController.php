<?php
namespace App\Controllers;
use App\Models\Teacher;

class TeacherController extends BaseController implements InterfaceController {
    protected $teacher;
    public function __construct()
    {
        $this->teacher = new Teacher();
    }
    public function getTeacher() {
        $teachers = $this->teacher->getListTeacher();
        return $this->render('teacher.index',compact('teachers'));
    }
    public function addTeacher()
    {
        return $this->render('teacher.add');
    }
    public function postTeacher()
    {
        if(isset($_POST['add'])) {
            $errors = [];

            if(empty($_POST['name'])) {
                $errors[] = "Bạn không được bỏ trống tên";
            }
            if(empty($_POST['email'])) {
                $errors[] = "Bạn không được bỏ trống email";
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email bạn nhập là không hợp lệ";
            }
            if(empty($_POST['salary'])) {
                $errors[] = "Bạn không được bỏ trống lương";
            }
            if(empty($_POST['school'])) {
                $errors[] = "Bạn không được bỏ trống nơi làm việc";
            }

            if(count($errors) > 0) {
                redirect("errors", $errors, "add-teacher");
            } else {
                $data = [
                    "id" => NULL,
                    "name" => $_POST['name'],
                    "email" => $_POST['email'],
                    "salary" => $_POST['salary'],
                    "school" => $_POST['school']
                ];
                $result = $this->teacher->postTeacher($data);
                if($result) {
                    redirect("success", "Thêm mới thành công", "add-teacher");
                }
            }
        }
    }
    public function getIDTeacher($id)
    {
        $teacher = $this->teacher->getIDTeacher($id);
        return $this->render('teacher.edit', compact('teacher'));
    }
    public function editTeacher($id)
    {
        if(isset($_POST['edit'])) {
            $errors = [];

            if (empty($_POST['name'])) {
                $errors[] = "Bạn không được bỏ trống tên";
            }
            if (empty($_POST['email'])) {
                $errors[] = "Bạn không được bỏ trống email";
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email bạn nhập là không hợp lệ";
            }
            if (empty($_POST['salary'])) {
                $errors[] = "Bạn không được bỏ trống lương";
            }
            if (empty($_POST['school'])) {
                $errors[] = "Bạn không được bỏ trống nơi làm việc";
            }

            if (count($errors) > 0) {
                redirect("errors", $errors, "detail-teacher/" . $id);
            } else {
                $data = [
                    "name" => $_POST['name'],
                    "email" => $_POST['email'],
                    "salary" => $_POST['salary'],
                    "school" => $_POST['school']
                ];
                $result = $this->teacher->editTeacher($id, $data);
                if ($result) {
                    redirect("success", "Chỉnh sửa thành công", "detail-teacher/" . $id);
                }
            }
        }
    }
    public function delTeacher($id)
    {
        $result = $this->teacher->delTeacher($id);
        if($result) {
            header("location:" . BASE_URL);
        }
    }
}
