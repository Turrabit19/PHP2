<?php
namespace App\Models;
class Products extends BaseModel
{
    protected $table = "product";
    function getProduct() {
        $sql = "select * from $this->table order by id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    function addProduct($id, $name, $img, $price, $des, $idcgr)
    {
        $sql = "INSERT INTO $this->table VALUES (?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $img, $price, $des, $idcgr]);
    }

    function delProduct($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    function getDetailProduct($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    function editProduct($id, $name, $img, $price, $des, $idcgr)
    {
        if ($img != "") {
            $sql = "UPDATE $this->table SET name = ?, img = ?, price = ?, des = ?, idcgr = ? WHERE id = ?";
            $this->setQuery($sql);
            return $this->execute([$name, $img, $price, $des, $idcgr, $id]);
        }
        else {
            $sql = "UPDATE $this->table SET name = ?, price = ?, des = ?, idcgr = ? WHERE id = ?";
            $this->setQuery($sql);
            return $this->execute([$name, $price, $des, $idcgr, $id]);
        }
    }
}