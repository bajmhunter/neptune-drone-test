<?php

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Welcome";
        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/footer');
    }
}