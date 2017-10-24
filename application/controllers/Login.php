<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //die(var_dump($this->auth->logout()));
        if($this->auth->isLoggedIn())
        {
            redirect('repair');
        }
        else
        {
            if($this->form_validation->run() == FALSE)
            {
                $this->load->view('login');
            }
        }
    }

    public function check()
    {
        $this->form_validation->set_rules('username', 'lang:login_username', 'callback_password_check');
        $this->form_validation->set_error_delimiters('<span class="error-msg">', '</span>');


        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('repair');
        }
    }

    public function password_check()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if(!$this->auth->login($username, $password)){

            $this->form_validation->set_message('username', $this->lang->line('login_invalid_username_and_password'));

            return FALSE;
        }

        return TRUE;
    }

    public function logout()
    {
        if($this->auth->logout())
            redirect('login');
    }

}