<?php
class Pages extends Controller
{
  public function __construct()
  {
    $this->roomModel = $this->model('Room');
  }

  public function index()
  {
    $this->view('index');
  }

  public function contact()
  {
    $this->view('contact');
  }

  public function facilities()
  {
    $this->view('facilities');
  }

  public function rooms()
  {

    $rooms_count = $this->roomModel->getRoomsCount();
    @$page = $_GET['page'];
    $rooms_nb = $rooms_count->total;
    $elem_nb = 9;
    $pages_nb = ceil($rooms_nb / $elem_nb);
    $debut = ($page - 1) * $elem_nb;
    $rooms = $this->roomModel->getRooms();
    $data = [
      'rooms' => $rooms,
      'page_number' => $pages_nb,
      'debut' => $debut,
      'elem_nb' => $elem_nb,
      'page' => $page,
    ];
    $this->view('rooms_suites', $data);
  }

  public function SingleRooms()
  {
    $rooms_count = $this->roomModel->getSingleRoomsCount();
    @$page = $_GET['page'];
    $rooms_nb = $rooms_count->total;
    $elem_nb = 9;
    $pages_nb = ceil($rooms_nb / $elem_nb);
    $debut = ($page - 1) * $elem_nb;
    $singleRooms = $this->roomModel->getSingleRooms();
    $data = [
      'rooms' => $singleRooms,
      'page_number' => $pages_nb,
      'debut' => $debut,
      'elem_nb' => $elem_nb,
      'page' => $page,
    ];
    $this->view('rooms_suites', $data);
  }

  public function DoubleRooms()
  {
    $rooms_count = $this->roomModel->getDoubleRoomsCount();
    @$page = $_GET['page'];
    $rooms_nb = $rooms_count->total;
    $elem_nb = 9;
    $pages_nb = ceil($rooms_nb / $elem_nb);
    $debut = ($page - 1) * $elem_nb;
    $singleRooms = $this->roomModel->getDoubleRooms();
    $data = [
      'rooms' => $singleRooms,
      'page_number' => $pages_nb,
      'debut' => $debut,
      'elem_nb' => $elem_nb,
      'page' => $page,
    ];
    $this->view('rooms_suites', $data);
  }

  public function Suites()
  {
    $rooms_count = $this->roomModel->getSuitesCount();
    @$page = $_GET['page'];
    $rooms_nb = $rooms_count->total;
    $elem_nb = 9;
    $pages_nb = ceil($rooms_nb / $elem_nb);
    $debut = ($page - 1) * $elem_nb;
    $singleRooms = $this->roomModel->getSuites();
    $data = [
      'rooms' => $singleRooms,
      'page_number' => $pages_nb,
      'debut' => $debut,
      'elem_nb' => $elem_nb,
      'page' => $page,
    ];
    $this->view('rooms_suites', $data);
  }

  public function filterRooms()
  {
    if (empty($_POST['debut_date']) || empty($_POST['final_date'])) {
      if (!empty($_POST['room_type'])) {
        if ($_POST['room_type'] == 'single') {
          $rooms_count = $this->roomModel->getSingleRoomsCount();
          @$page = $_GET['page'];
          $rooms_nb = $rooms_count->total;
          $elem_nb = 9;
          $pages_nb = ceil($rooms_nb / $elem_nb);
          $debut = ($page - 1) * $elem_nb;
          $singleRooms = $this->roomModel->getSingleRooms();
          $data = [
            'rooms' => $singleRooms,
            'page_number' => $pages_nb,
            'debut' => $debut,
            'elem_nb' => $elem_nb,
            'page' => $page,
          ];
          $this->view('rooms_suites', $data);
        } else if ($_POST['room_type'] == 'double') {
          $rooms_count = $this->roomModel->getDoubleRoomsCount();
          @$page = $_GET['page'];
          $rooms_nb = $rooms_count->total;
          $elem_nb = 9;
          $pages_nb = ceil($rooms_nb / $elem_nb);
          $debut = ($page - 1) * $elem_nb;
          $singleRooms = $this->roomModel->getDoubleRooms();
          $data = [
            'rooms' => $singleRooms,
            'page_number' => $pages_nb,
            'debut' => $debut,
            'elem_nb' => $elem_nb,
            'page' => $page,
          ];
          $this->view('rooms_suites', $data);
        } else if ($_POST['room_type'] == 'suite' && empty($_POST['suite_type'])) {
          $rooms_count = $this->roomModel->getSuitesCount();
          @$page = $_GET['page'];
          $rooms_nb = $rooms_count->total;
          $elem_nb = 9;
          $pages_nb = ceil($rooms_nb / $elem_nb);
          $debut = ($page - 1) * $elem_nb;
          $singleRooms = $this->roomModel->getSuites();
          $data = [
            'rooms' => $singleRooms,
            'page_number' => $pages_nb,
            'debut' => $debut,
            'elem_nb' => $elem_nb,
            'page' => $page,
          ];
          $this->view('rooms_suites', $data);
        } else if ($_POST['room_type'] == 'suite' && !empty($_POST['suite_type'])) {
          $rooms_count = $this->roomModel->getSuitesCount();
          @$page = $_GET['page'];
          $rooms_nb = $rooms_count->total;
          $elem_nb = 9;
          $pages_nb = ceil($rooms_nb / $elem_nb);
          $debut = ($page - 1) * $elem_nb;
          $suite_type = [
            'suite_type' => $_POST['suite_type'],
          ];
          $singleRooms = $this->roomModel->getSuitesTypes($suite_type);
          $data = [
            'rooms' => $singleRooms,
            'page_number' => $pages_nb,
            'debut' => $debut,
            'elem_nb' => $elem_nb,
            'page' => $page,
          ];
          $this->view('rooms_suites', $data);
        }
      }
    } else {
      die(print('refrfef'));
    }
  }
}
