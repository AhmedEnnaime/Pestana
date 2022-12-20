<?php
class Pages extends Controller
{
  public function __construct()
  {
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
}
