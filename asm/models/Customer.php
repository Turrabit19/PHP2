<?php
require_once "BaseModel.php";
class Customer extends BaseModel {
    function getCustomer() {
        $sql = "SELECT * FROM customer order by id";
        return $this->getData($sql);
    }

    function detailCustomer($id)
    {
        $sql = "select * from customer where id=" . $id;
        return $this->getData($sql, false);
    }

    function addCustomer($name, $email, $phone)
    {
        $sql = "INSERT INTO customer(name, email, phone) VALUES('$name', '$email', '$phone')";
        $this->getData($sql);
    }

    function delCustomer($id)
    {
        $sql = "DELETE FROM customer WHERE id=" . $id;
        $this->getData($sql);
    }

    function updCustomer($id, $name, $email, $phone)
    {
        $sql = "update customer set  name='" . $name . "',email='" . $email . "',phone='" . $phone . "' where id=" . $id;
        $this->getData($sql);
    }
}
