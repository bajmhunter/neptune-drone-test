<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(TRUE);

        if(!$this->auth->isLoggedIn())
        {
            redirect('login/');
        }

        if($this->uri->segment(1) == 'repair')
        {
            $data['section'] = 'Repair';
        }elseif($this->uri->segment(1) == 'sales')
        {
            $data['section'] = 'Sales';
        }elseif($this->uri->segment(1) =='config')
        {
            $data['section'] = 'Config';
        }

        $this->load->vars($data);
    }
}