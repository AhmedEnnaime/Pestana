<?php

class Admins extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->roomModel = $this->model('Room');
    }

    public function dashboard()
    {
        $this->view('dashboard');
    }
}
