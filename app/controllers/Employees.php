<?php

class Employees extends Controller
{

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        } else if ($_SESSION['role'] == 1) {
            redirect('pages/index');
        }
        $this->employeeModel = $this->model('Employee');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'birthday' => trim($_POST['birthday']),
                'cin' => trim($_POST['cin']),
                'country' => trim($_POST['country']),
                'poste' => trim($_POST['poste']),
                'img' => $_FILES['img']['name'],
                'name_err' => '',
                'birthday_err' => '',
                'cin_err' => '',
                'country_err' => '',
                'poste_err' => '',
                'img_err' => '',
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            if (empty($data['birthday'])) {
                $data['birthday_err'] = 'Please enter birthday';
            }

            if (empty($data['cin'])) {
                $data['cin_err'] = 'Please enter cin';
            }

            if (empty($data['country'])) {
                $data['country_err'] = 'Please enter country';
            }

            if (empty($data['poste'])) {
                $data['poste_err'] = 'Please enter poste';
            }

            if (empty($data['img'])) {
                $data['img_err'] = 'Please upload image';
            }

            if (empty($data['name_err']) && empty($data['birthday_err']) && empty($data['cin_err']) && empty($data['country_err']) && empty($data['poste_err']) && empty($data['img_err'])) {

                if ($this->employeeModel->add($data)) {
                    $file = $_FILES['img']['name'];
                    $folder = './assets/images/uploads/' . $file;
                    $fileTmp = $_FILES['img']['tmp_name'];
                    move_uploaded_file($fileTmp, $folder);
                    flash('employee_success', 'Employee added');
                    redirect('employees/add');
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('employees', $data);
            }
        } else {
            $employees = $this->employeeModel->getEmployees();
            $data = [
                'name' => '',
                'birthday' => '',
                'cin' => '',
                'country' => '',
                'poste' => '',
                'img' => '',
                'name_err' => '',
                'birthday_err' => '',
                'cin_err' => '',
                'country_err' => '',
                'poste_err' => '',
                'img_err' => '',
                'employees' => $employees,
            ];
            $this->view('employees', $data);
        }
    }

    public function delete($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->employeeModel->delete($id)) {
                flash('employee_message', 'Employee deleted', 'alert alert-danger');
                redirect('employees/add');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('employees/add');
        }
    }
}
