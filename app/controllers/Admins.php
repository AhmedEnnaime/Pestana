<?php

class Admins extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        } else if ($_SESSION['role'] == 1) {
            redirect('pages/index');
        }
        $this->userModel = $this->model('User');
    }

    public function dashboard()
    {
        $users = $this->userModel->getUsers();
        $data = [
            'users' => $users,
        ];
        $this->view('dashboard', $data);
    }
}
