<?php
namespace App\Models;
class Categories extends BaseModel
{
    protected $table = "category";
    public function getCategory()
    {
        $sql = "Select * from $this->table order by id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    function addCategory($id, $name)
    {
        $sql = "INSERT INTO $this->table VALUES (?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name]);
    }

    function delCategory($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    function getDetailCategory($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    function editCategory($id, $name)
    {
        $sql = "UPDATE $this->table SET name = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $id]);
    }
}