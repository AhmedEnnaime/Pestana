<?php

class Rooms extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->roomModel = $this->model('Room');
    }

    public function rooms()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'num' => trim($_POST['num']),
                'capacity' => $_POST['capacity'],
                'price' => trim($_POST['price']),
                'type' => trim($_POST['type']),
                'suite_type' => trim($_POST['suite_type']),
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
            //die(print_r($data));
            if (empty($data['num_err']) && empty($data['capacity_err']) && empty($data['price_err']) && empty($data['type_err']) && empty($data['media_err'])) {

                if ($this->roomModel->add($data)) {
                    foreach ($_FILES['img']['name'] as $key => $error) {
                        if ($error == UPLOAD_ERR_OK) {
                            $file = basename($_FILES['media']['name'][$key]);
                            $folder = './assets/images/uploads/' . $file;
                            $fileTmp = $_FILES['media']['tmp_name'][$key];
                            move_uploaded_file($fileTmp, $folder);
                        }
                    }
                    flash('room_success', 'Room added');
                    redirect('rooms/rooms');
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('rooms', $data);
            }
        } else {
            $rooms = $this->roomModel->getAllRooms();
            $data = [
                'num' => '',
                'capacity' => '',
                'price' => '',
                'type' => '',
                'suite_type' => '',
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

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'id' => $id,
                'num' => trim($_POST['num']),
                'capacity' => trim($_POST['capacity']),
                'price' => trim($_POST['price']),
                'type' => trim($_POST['type']),
                'suite_type' => trim($_POST['suite_type']),
                'media' => $_FILES['media']['name'],
                'num_err' => '',
                'capacity_err' => '',
                'price_err' => '',
                'type_err' => '',
                'suite_type_err' => '',
                'media_err' => '',
            ];

            // Validation Form
            //die(print('dcde'));
            if (empty($data['num'])) {
                $data['num_err'] = 'Please enter num';
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

                if ($this->roomModel->update($data)) {
                    flash('update_success', 'Room updated');
                    redirect('rooms/rooms');
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('update', $data);
            }
        } else {
            $room = $this->roomModel->getRoomById($id);

            if ($room->id != $id) {
                redirect('rooms/rooms');
            }


            $data = [
                'id' => $id,
                'num' => $room->num,
                'capacity' => $room->capacity,
                'price' => $room->price,
                'type' => $room->type,
                'suite_type' => $room->suite_type,
                'media' => $room->media,
                'num_err' => '',
                'capacity_err' => '',
                'price_err' => '',
                'type_err' => '',
                'suite_type_err' => '',
                'media_err' => '',
            ];

            $this->view('update', $data);
        }
    }

    public function book($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $room = $this->roomModel->getRoomById($id);
            $secs = strtotime($_POST['final_date']) - strtotime($_POST['debut_date']);
            $nights = $secs / 86400;
            $total = $nights * $room->price;
            if ($room->type == 'suite') {
                $data = [
                    'id' => $id,
                    'room' => $room,
                    'user_id' => $_SESSION['id'],
                    'room_id' => $id,
                    'debut_date' => $_POST['debut_date'],
                    'final_date' => $_POST['final_date'],
                    'persons_num' => $_POST['persons_num'],
                    'user_id' => $_SESSION['id'],
                    'total' => $total,
                    'name' => $_POST['name'],
                    'birthday' => $_POST['birthday'],
                    'reservation_id' => $_POST['reservation_id'],
                    'debut_date_err' => '',
                    'final_date_err' => '',
                    'persons_num_err' => '',
                ];
                //echo "<pre>";
                //die(print_r($data));
                if ($this->roomModel->bookSuite($data)) {
                    flash('reservation_success', 'Room booked');
                    redirect('pages/rooms?page=1');
                } else {
                    die('Something went wrong');
                }
            } else {
                $info = [
                    'user_id' => $_SESSION['id'],
                ];
                $userReservations = $this->roomModel->getUserReservations($info);

                $data = [
                    'id' => $id,
                    'room' => $room,
                    'user_id' => $_SESSION['id'],
                    'room_id' => $id,
                    'debut_date' => $_POST['debut_date'],
                    'final_date' => $_POST['final_date'],
                    'user_id' => $_SESSION['id'],
                    'total' => $total,
                    'userReservations' => $userReservations,
                    'debut_date_err' => '',
                    'final_date_err' => '',
                    'persons_num_err' => '',
                ];

                if ($this->roomModel->book($data)) {
                    flash('reservation_success', 'Room booked');
                    redirect('pages/rooms?page=1');
                } else {
                    die('Something went wrong');
                }
            }

            $this->view('book', $data);
        } else {
            $room = $this->roomModel->getRoomById($id);
            $nights = $_POST['debut_date'] - $_POST['final_date'];
            $info = [
                'room_id' => $id,
            ];
            $reservation_info = $this->roomModel->getReservationByRoomId($info);
            $data = [
                'room' => $room,
                'reservation_info' => $reservation_info,
            ];
            $this->view('book', $data);
        }
    }

    public function deleteReservation($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $reservation = $this->roomModel->getReservationById($id);

            if ($this->roomModel->deleteReservation($id)) {

                flash('reservation_message', 'Reservation deleted', 'alert alert-danger');
                //die(print_r($id));
                if ($_SESSION['role'] == 0) {
                    redirect('admins/dashboard');
                } else {
                    redirect('index');
                }
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('admins/dashboard');
        }
    }
}
