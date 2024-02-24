<?php
namespace App\Models;
interface InterfaceModel
{
    public function getListTeacher();
    public function postTeacher(array $data);
    public function getIDTeacher($id);
    public function editTeacher($id, array $data);
    public function delTeacher($id);
}