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
        $this->employeeModel = $this->model('Employee');
    }

    public function dashboard()
    {
        $users = $this->userModel->getUsers();
        $clients = $this->userModel->getClientsCount();
        $employees = $this->employeeModel->getEmployeesCount();
        $data = [
            'users' => $users,
            'clients' => $clients,
            'employees' => $employees,
        ];
        $this->view('dashboard', $data);
    }
}
