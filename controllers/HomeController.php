<?php

namespace controllers;

class HomeController
{
    public function index()
    {
        require base_path('views/index.view.php');
    }
}
