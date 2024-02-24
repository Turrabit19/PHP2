<?php
namespace App\Models;

class Teacher extends BaseModel implements InterfaceModel {
    protected $table = "teacher";
    public function getListTeacher() {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function postTeacher(array $data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $salary = $data['salary'];
        $school = $data['school'];

        $sql = "insert into $this->table values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $email, $salary, $school]);
    }
    public function getIDTeacher($id)
    {
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editTeacher($id, array $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $salary = $data['salary'];
        $school = $data['school'];

        $sql = "update $this->table set name = ?, email = ?, salary = ?, school = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $email, $salary, $school, $id]);
    }
    public function delTeacher($id)
    {
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
?>