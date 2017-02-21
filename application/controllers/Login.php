<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if($this->Employee->is_logged_in())
        {
            redirect('home');
        }
        else
        {
            if($this->form_validation->run() == FALSE)
            {
                $data['method'] = $this->config->item('login_default');
                $this->load->view('login', $data);
            }
        }
    }

    public function pin()
    {
        $this->form_validation->set_rules('pinnumber', 'lang:login_pin', 'callback_pin_check');
        $this->form_validation->set_error_delimiters('<span class="error-msg">', '</span>');

        if($this->form_validation->run() == FALSE)
        {
            $data['method'] = $this->config->item('login_default');
            $this->load->view('login', $data);
        }
        else
        {
            redirect('home');
        }
    }

    public function pin_check()
    {
        $pin = $this->input->post('pinnumber');

        if(!$this->Employee->pin_login($pin))
        {
            $this->form_validation->set_message('pin_check', $this->lang->line('login_invalid_pin'));
            return FALSE;
        }

        return TRUE;
    }

    public function password()
    {
        $this->form_validation->set_rules('username', 'lang:login_username', 'callback_password_check');
        $this->form_validation->set_error_delimiters('<span class="error-msg">', '</span>');


        if($this->form_validation->run() == FALSE)
        {
            $data['method'] = $this->config->item('login_default');
            $this->load->view('login', $data);
        }
        else
        {
            redirect('home');
        }
    }

    public function password_check($username)
    {
        $password = $this->input->post('password');

        if(!$this->Employee->pasword_login($username, $password))
        {
            $this->form_validation->set_message('username', $this->lang->line('login_invalid_username_and_password'));

            return FALSE;
        }

        return TRUE;
    }

    public function logout()
    {
        $this->Employee->logout();
    }

}