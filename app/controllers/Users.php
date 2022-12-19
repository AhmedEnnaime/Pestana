<?php

class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function signup()
    {
        if (isLoggedIn()) {
            redirect('pages/index');
        } else if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = [
                'name' => trim($_POST['name']),
                'birthday' => trim($_POST['birthday']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'cin' => trim($_POST['cin']),
                'loyal' => 1,
                'role' => 1,
                'country' => trim($_POST['country']),
                'img' => $_FILES['img']['name'],
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
                'cin_err' => '',
                'country_err' => '',
                'img_err' => '',
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

            if (empty($data['country'])) {
                $data['country_err'] = 'Please enter your country';
            }

            if (empty($data['img'])) {
                $data['img_err'] = 'Please enter your image';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } else if (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }


            if (empty($data['name_err']) && empty($data['cin_err']) && empty($data['birthday_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['country_err']) && empty($data['img_err'])) {
                // Hashing password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                //die(print_r($data));
                if ($this->userModel->signup($data)) {
                    $file = $_FILES['img']['name'];
                    $folder = './assets/images/uploads/' . $file;
                    $fileTmp = $_FILES['img']['tmp_name'];
                    move_uploaded_file($fileTmp, $folder);
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
                'country' => '',
                'img' => '',
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
                'cin_err' => '',
                'country_err' => '',
                'img_err' => '',
            ];
            $this->view('signup');
        }
    }

    public function login()
    {
        if (isLoggedIn()) {
            redirect('pages/index');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

    public function profile($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'birthday' => trim($_POST['birthday']),
                'email' => trim($_POST['email']),
                'cin' => trim($_POST['cin']),
                'country' => trim($_POST['country']),
                'img' => $_FILES['img']['name'],
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
                'cin_err' => '',
                'country_err' => '',
                'img_err' => '',
            ];

            // Validation Form

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

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
                $data['country_err'] = 'Please enter your country';
            }

            if (empty($data['img'])) {
                $data['img_err'] = 'Please enter your image';
            }
            //die(print_r($data));

            if (empty($data['name_err']) && empty($data['cin_err']) && empty($data['birthday_err']) && empty($data['email_err']) && empty($data['country_err']) && empty($data['img_err'])) {

                if ($this->userModel->update($data)) {
                    $file = $_FILES['img']['name'];
                    $folder = './assets/images/uploads/' . $file;
                    $fileTmp = $_FILES['img']['tmp_name'];
                    move_uploaded_file($fileTmp, $folder);
                    flash('update_success', 'Profile updated');
                    redirect('pages/index');
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view('profile', $data);
            }
        } else {
            $user = $this->userModel->getUserById($id);
            if ($user->id != $id) {
                redirect('pages/index');
            }
            $data = [
                'id' => $id,
                'name' => $user->name,
                'birthday' => $user->birthday,
                'email' => $user->email,
                'cin' => $user->cin,
                'country' => $user->country,
                'img' => $user->img,
                'name_err' => '',
                'birthday_err' => '',
                'email_err' => '',
                'password_err' => '',
                'cin_err' => '',
                'country_err' => '',
                'img_err' => '',
            ];


            $this->view('profile', $data);
            die(print_r($data));
        }
    }
    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['logged']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);
        unset($_SESSION['loyal']);
        unset($_SESSION['cin']);
        unset($_SESSION['birthday']);
        unset($_SESSION['img']);
        unset($_SESSION['country']);
        session_destroy();
        redirect('users/login');
    }

    public function deactivate($id)
    {
        if (!isLoggedIn()) {
            redirect('admins/dashboard');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->delete($id)) {
                //logout();
                flash('user_message', 'Account deleted', 'alert alert-danger');
                redirect('users/signup');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('users/profile');
        }
    }

    public function delete($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->userModel->delete($id)) {
                flash('user_message', 'User deleted', 'alert alert-danger');
                redirect('admins/dashboard');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('users/profile');
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['id'] = $user->id;
        $_SESSION['logged'] = true;
        $_SESSION['role'] = $user->role;
        $_SESSION['email'] = $user->email;
        $_SESSION['name'] = $user->name;
        $_SESSION['birthday'] = $user->birthday;
        $_SESSION['cin'] = $user->cin;
        $_SESSION['loyal'] = $user->loyal;
        $_SESSION['country'] = $user->country;
        $_SESSION['img'] = $user->img;
        redirect('pages/index');
    }
}
