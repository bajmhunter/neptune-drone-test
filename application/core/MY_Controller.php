<?php

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

        $data['employee'] = $this->Employee->get_logged_in_employee_all_info();

        $this->load->vars($data);
    }
}