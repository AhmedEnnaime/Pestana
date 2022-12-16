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

    public function rooms()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'num' => trim($_POST['num']),
                'capacity' => trim($_POST['capacity']),
                'price' => trim($_POST['price']),
                'type' => trim($_POST['type']),
                'suite_type' => trim($_POST['suite_type']),
                'reserved' => 0,
                'num_err' => '',
                'capacity_err' => '',
                'price_err' => '',
                'type_err' => '',
                'suite_type_err' => '',
            ];

            // Validation Form

            if (empty($data['num'])) {
                $data['num_err'] = 'Please enter num';
            } else {
                if ($this->roomModel->findRoomByNum($data['num'])) {
                    $data['num_err'] = 'Num already taken';
                }
            }

            if (empty($data['capacity'])) {
                $data['capacity_err'] = 'Please enter capacity';
            }

            if (empty($data['price'])) {
                $data['price_err'] = 'Please enter price';
            }

            if (empty($data['type'])) {
                $data['type_err'] = 'Please enter your type';
            }

            if (empty($data['suite_type'])) {
                $data['suite_type_err'] = 'Please enter your suite type';
            }

            if (empty($data['num_err']) && empty($data['capacity_err']) && empty($data['price_err']) && empty($data['type_err'])) {

                if ($this->roomModel->add($data)) {
                    flash('register_success', 'Room added');
                    redirect('admins/rooms');
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('rooms', $data);
            }
        } else {
            $data = [
                'num' => '',
                'capacity' => '',
                'price' => '',
                'type' => '',
                'suite_type' => '',
                'reserved' => 0,
                'num_err' => '',
                'capacity_err' => '',
                'price_err' => '',
                'type_err' => '',
                'suite_type_err' => '',
            ];
            $this->view('rooms');
        }
    }
}
