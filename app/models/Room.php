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

    public function getRoomById($id)
    {
        try {
            $this->db->query("SELECT * FROM room WHERE id = :id");
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function add($data)
    {
        try {
            $this->db->query("INSERT INTO room (num,capacity,price,type,suite_type,reserved,media) VALUES(:num, :capacity, :price, :type, :suite_type, :reserved, :media)");
            $this->db->bind(':num', $data['num']);
            $this->db->bind(':capacity', $data['capacity']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':suite_type', $data['suite_type']);
            $this->db->bind(':reserved', $data['reserved']);
            $this->db->bind(':media', $data['media']);
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getRooms()
    {
        try {
            $this->db->query("SELECT * FROM room");
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $this->db->query("DELETE FROM room WHERE id = :id");
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

    public function update($data)
    {
        try {
            $this->db->query("UPDATE room SET num = :num,capacity = :capacity,price = :price,type = :type,suite_type = :suite_type,reserved = :reserved, media = :media WHERE id = :id");
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':num', $data['num']);
            $this->db->bind(':capacity', $data['capacity']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':suite_type', $data['suite_type']);
            $this->db->bind(':reserved', $data['reserved']);
            $this->db->bind(':media', $data['media']);
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
