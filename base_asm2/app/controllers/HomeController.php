<?php
namespace App\Controllers;

class HomeController extends BaseController {
    public function index()
    {
        $title = "Trần Đức Khang";
        return $this->render('layout.main', compact('title'));
    }
}