<?php

class Rooms extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        } else if ($_SESSION['role'] == 1) {
            redirect('pages/index');
        }
        $this->roomModel = $this->model('Room');
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
                'media' => $_FILES['media']['name'],
                'num_err' => '',
                'capacity_err' => '',
                'price_err' => '',
                'type_err' => '',
                'suite_type_err' => '',
                'media_err' => '',
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

            if (empty($data['media'])) {
                $data['media_err'] = 'Please upload images';
            }

            if (empty($data['num_err']) && empty($data['capacity_err']) && empty($data['price_err']) && empty($data['type_err']) && empty($data['media_err'])) {

                if ($this->roomModel->add($data)) {

                    $file = $_FILES['media']['name'];
                    $folder = './assets/images/uploads/' . $file;
                    $fileTmp = $_FILES['media']['tmp_name'];
                    move_uploaded_file($fileTmp, $folder);
                    flash('room_success', 'Room added');
                    redirect('rooms/rooms');
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('rooms', $data);
            }
        } else {
            $rooms = $this->roomModel->getRooms();
            $data = [
                'num' => '',
                'capacity' => '',
                'price' => '',
                'type' => '',
                'suite_type' => '',
                'reserved' => 0,
                'media' => '',
                'num_err' => '',
                'capacity_err' => '',
                'price_err' => '',
                'type_err' => '',
                'suite_type_err' => '',
                'media_err' => '',
                'rooms' => $rooms,
            ];
            $this->view('rooms', $data);
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->roomModel->delete($id)) {
                flash('room_message', 'Room deleted', 'alert alert-danger');
                redirect('rooms/rooms');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('rooms/rooms');
        }
    }
}
