<?php
namespace App\Models;
class Customers extends BaseModel {
    protected $table = "customer";
    function getCustomer() {
        $sql = "SELECT * FROM $this->table order by id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    function addCustomer($id, $name, $email, $phone)
    {
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $email, $phone]);
    }

    function delCustomer($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    function getDetailCustomer($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    function editCustomer($id, $name, $email, $phone)
    {
        $sql = "UPDATE $this->table SET name = ?, email = ?, phone = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $email, $phone, $id]);
    }
}