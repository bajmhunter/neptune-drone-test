<?php
/**
 * Created by PhpStorm.
 * User: bryce
 * Date: 20/02/2017
 * Time: 23:20
 */

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Employee');

        if(!$this->Employee->is_logged_in())
        {
            redirect('login/');
        }
    }
}