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
        $this->roomModel = $this->model('Room');
    }

    public function dashboard()
    {
        $users = $this->userModel->getUsers();
        $clients = $this->userModel->getClientsCount();
        $employees = $this->employeeModel->getEmployeesCount();
        $reservation = $this->roomModel->getReservedRooms();
        $reservation_info = $this->roomModel->getReservations();
        $earnings = $this->roomModel->getEarnings();
        $data = [
            'users' => $users,
            'clients' => $clients,
            'employees' => $employees,
            'reservation' => $reservation,
            'reservation_info' => $reservation_info,
            'earnings' => $earnings,
        ];
        $this->view('dashboard', $data);
    }
}
