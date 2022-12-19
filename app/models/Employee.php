<?php

class Employee
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getEmployees()
    {
        try {
            $this->db->query("SELECT * FROM employee");
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function add($data)
    {
        try {
            $this->db->query("INSERT INTO employee (name,birthday,cin,country,poste,img) VALUES(:name, :birthday, :cin, :country, :poste, :img)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':birthday', $data['birthday']);
            $this->db->bind(':cin', $data['cin']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':poste', $data['poste']);
            $this->db->bind(':img', $data['img']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->db->query("DELETE FROM employee WHERE id = :id");
            $this->db->bind(":id", $id);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
