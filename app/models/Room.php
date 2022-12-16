<?php

class Room
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findRoomByNum($num)
    {
        try {
            $this->db->query("SELECT * FROM room WHERE num = :num");
            $this->db->bind(':num', $num);
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

    public function add($data)
    {
        try {
            $this->db->query("INSERT INTO room (num,capacity,price,type,suite_type,reserved) VALUES(:num, :capacity, :price, :type, :suite_type, :reserved)");
            $this->db->bind(':num', $data['num']);
            $this->db->bind(':capacity', $data['capacity']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':suite_type', $data['suite_type']);
            $this->db->bind(':reserved', $data['reserved']);
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
