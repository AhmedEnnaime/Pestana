<?php

class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findUserByEmail($email)
    {
        try {
            $this->db->query("SELECT * FROM user WHERE email = :email");
            $this->db->bind(':email', $email);
            $row = $this->db->single();

            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function signup($data)
    {
        try {
            $this->db->query("INSERT INTO user (name,birthday,email,password,cin,loyal,role) VALUES(:name, :birthday, :email, :password, :cin, :loyal, :role)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':birthday', $data['birthday']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':cin', $data['cin']);
            $this->db->bind(':loyal', $data['loyal']);
            $this->db->bind(':role', $data['role']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            $this->db->query("SELECT * FROM user WHERE email = :email");
            $this->db->bind(':email', $email);
            $row = $this->db->single();
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
