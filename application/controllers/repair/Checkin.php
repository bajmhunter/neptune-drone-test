<?php

class Checkin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function new()
    {
    	$data['title'] = "New Checkin";
        $this->load->view('checkin/new', $data);
    }
}