<?php
namespace App\Controllers;
interface InterfaceController
{
    public function getTeacher();
    public function addTeacher();
    public function postTeacher();
    public function getIDTeacher($id);
    public function editTeacher($id);
    public function delTeacher($id);
}