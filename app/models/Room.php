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

    public function getAllRooms()
    {
        try {
            $this->db->query("SELECT * FROM room");
            return $this->db->resultSet();
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

    public function getRoomsCount()
    {
        $this->db->query("SELECT COUNT(*) as total FROM room");
        $row = $this->db->single();
        return $row;
    }

    public function getRooms()
    {
        $rooms = $this->getRoomsCount();
        @$page = $_GET['page'];
        $rooms_nb = $rooms->total;
        $elem_nb = 9;
        $pages_nb = ceil($rooms_nb / $elem_nb);
        $debut = ($page - 1) * $elem_nb;
        try {
            $this->db->query("SELECT * FROM room LIMIT " . $debut . "," . $elem_nb . "");
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

    public function book($data)
    {
        try {
            $this->db->query("INSERT INTO reservation (user_id,room_id,debut_date,final_date,persons_num,total) VALUES(:user_id, :room_id, :debut_date, :final_date, :persons_num, :total)");
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':room_id', $data['room_id']);
            $this->db->bind(':debut_date', $data['debut_date']);
            $this->db->bind(':final_date', $data['final_date']);
            $this->db->bind(':persons_num', $data['persons_num']);
            $this->db->bind(':total', $data['total']);
            if ($this->db->execute()) {
                $this->db->query("UPDATE room SET reserved = 1 WHERE id = :id");
                $this->db->bind(':id', $data['room_id']);
                $this->db->execute();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getReservedRooms()
    {
        $this->db->query("SELECT COUNT(*) as total FROM reservation");
        $row = $this->db->single();
        return $row;
    }

    public function getReservations()
    {
        try {
            $this->db->query("SELECT reservation.id,user.name,room.num,room.type,reservation.debut_date,reservation.final_date,reservation.total FROM `reservation` JOIN user ON user.id = reservation.user_id JOIN room ON reservation.room_id = room.id ORDER BY reservation.final_date ASC;");
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getEarnings()
    {
        try {
            $this->db->query("SELECT SUM(reservation.total) as earnings FROM reservation INNER JOIN room WHERE room.id = reservation.room_id;");
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getReservationById($id)
    {
        try {
            $this->db->query("SELECT * FROM reservation WHERE id = :id");
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteReservation($data)
    {
        try {
            $this->db->query("DELETE FROM reservation WHERE id = :id");
            $this->db->bind(":id", $data['id']);
            if ($this->db->execute()) {
                $this->db->query("UPDATE room SET reserved = 0 WHERE id = :id");
                $this->db->bind(':id', $data['room_id']);
                $this->db->execute();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function freeRoom($data)
    {
        try {
            $today = date('Y-m-d');
            $reservation = $this->getReservationById($data['id']);
            if ($today >= $reservation->final_date) {
                $this->db->query("UPDATE room SET reserved = 0 WHERE id = :id");
                $this->db->bind(':id', $data['room_id']);
                $this->db->execute();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSingleRoomsCount()
    {
        try {
            $this->db->query("SELECT COUNT(*) as total FROM room WHERE type = 'single'");
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getDoubleRoomsCount()
    {
        try {
            $this->db->query("SELECT COUNT(*) as total FROM room WHERE type = 'double'");
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSuitesCount()
    {
        try {
            $this->db->query("SELECT COUNT(*) as total FROM room WHERE type = 'suite'");
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSingleRooms()
    {
        try {
            $this->db->query("SELECT * FROM room WHERE type = 'single'");
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getDoubleRooms()
    {
        try {
            $this->db->query("SELECT * FROM room WHERE type = 'double'");
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSuites()
    {
        try {
            $this->db->query("SELECT * FROM room WHERE type = 'suite'");
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getSuitesTypes($data)
    {
        try {
            $this->db->query("SELECT * FROM room WHERE type = 'suite' AND suite_type = :suite_type");
            $this->db->bind(":suite_type", $data['suite_type']);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function getReservationByRoomId($data)
    {
        try {
            $this->db->query("SELECT * FROM reservation WHERE room_id = :room_id");
            $this->db->bind(':room_id', $data['room_id']);
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function filterByDate($data)
    {
        try {
            $this->db->query("SELECT r.* FROM room r LEFT JOIN reservation res ON r.id = res.room_id AND(:date BETWEEN res.debut_date AND res.final_date OR :date BETWEEN res.debut_date AND res.final_date) WHERE res.room_id IS NULL;");
            $this->db->bind(":date", $data['date']);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function filterByDateCount($data)
    {
        try {
            $this->db->query("SELECT COUNT(*) as total FROM room r LEFT JOIN reservation res ON r.id = res.room_id AND(:date BETWEEN res.debut_date AND res.final_date OR :date BETWEEN res.debut_date AND res.final_date) WHERE res.room_id IS NULL;");
            $this->db->bind(":date", $data['date']);
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function filterByDateAndType($data)
    {
        try {
            $this->db->query("SELECT r.* FROM room r LEFT JOIN reservation res ON r.id = res.room_id AND(:date BETWEEN res.debut_date AND res.final_date OR :date BETWEEN res.debut_date AND res.final_date) WHERE res.room_id IS NULL AND r.type = :type;");
            $this->db->bind(":date", $data['date']);
            $this->db->bind(":type", $data['type']);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function filterByDateAndTypeCount($data)
    {
        try {
            $this->db->query("SELECT COUNT(*) as total FROM room r LEFT JOIN reservation res ON r.id = res.room_id AND(:date BETWEEN res.debut_date AND res.final_date OR :date BETWEEN res.debut_date AND res.final_date) WHERE res.room_id IS NULL AND r.type = :type;");
            $this->db->bind(":date", $data['date']);
            $this->db->bind(":type", $data['type']);
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function filterByAll($data)
    {
        try {
            $this->db->query("SELECT r.* FROM room r LEFT JOIN reservation res ON r.id = res.room_id AND(:date BETWEEN res.debut_date AND res.final_date OR :date BETWEEN res.debut_date AND res.final_date) WHERE res.room_id IS NULL AND r.type = 'suite' AND r.suite_type = :suite_type;");
            $this->db->bind(":date", $data['date']);
            $this->db->bind(":suite_type", $data['suite_type']);
            return $this->db->resultSet();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function filterByAllCount($data)
    {
        try {
            $this->db->query("SELECT COUNT(*) FROM room r LEFT JOIN reservation res ON r.id = res.room_id AND(:date BETWEEN res.debut_date AND res.final_date OR :date BETWEEN res.debut_date AND res.final_date) WHERE res.room_id IS NULL AND r.type = 'suite' AND r.suite_type = :suite_type;");
            $this->db->bind(":date", $data['date']);
            $this->db->bind(":suite_type", $data['suite_type']);
            $row = $this->db->single();
            return $row;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}
