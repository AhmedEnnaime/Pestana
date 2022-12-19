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
        $clients = $this->userModel->getClientsCount();
        $data = [
            'users' => $users,
            'clients' => $clients,
        ];
        $this->view('dashboard', $data);
    }
}
