<?php

class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function signup()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = [
                'name' => trim($_POST['name']),
                'birthday' => trim($_POST['birthday']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'cin' => trim($_POST['cin']),
                'loyal' => 1,
                'role' => 1,
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
                'cin_err' => '',
            ];

            // Validation Form

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email already taken';
                }
            }

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            if (empty($data['cin'])) {
                $data['cin_err'] = 'Please enter cin';
            }

            if (empty($data['birthday'])) {
                $data['birthday_err'] = 'Please enter your birthday';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } else if (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            if (empty($data['name_err']) && empty($data['cin_err']) && empty($data['birthday_err']) && empty($data['email_err']) && empty($data['password_err'])) {
                // Hashing password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                //die(print_r($data));
                if ($this->userModel->signup($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('signup', $data);
            }
        } else {
            $data = [
                'name' => '',
                'birthday' => '',
                'email' => '',
                'password' => '',
                'cin' => '',
                'loyal' => 1,
                'role' => 1,
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
                'cin_err' => '',
            ];
            $this->view('signup');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validation Form

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            if ($this->userModel->findUserByEmail($data['email'])) {
            } else {
                $data['email_err'] = 'No user found';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {

                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                    die(print_r($data));
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('login', $data);
                }
            } else {
                $this->view('login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('login');
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['id'] = $user->id;
        $_SESSION['logged'] = true;
        $_SESSION['role'] = $user->role;
        $_SESSION['email'] = $user->email;
        $_SESSION['name'] = $user->name;
        redirect('pages/index');
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['logged']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        session_destroy();
        redirect('users/login');
    }
}
