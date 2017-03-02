<?php

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('_partial/header');
        $this->load->view('_partial/footer');
    }
}