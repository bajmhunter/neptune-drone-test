<?php

class Employee extends Person
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
	Determines if a given person_id is an employee
	*/
    public function exists($person_id)
    {
        $this->db->from('employees');
        $this->db->join('people', 'people.person_id = employees.person_id');
        $this->db->where('employees.person_id', $person_id);

        return ($this->db->get()->num_rows() == 1);
    }

    /*
	Gets total of rows
	*/
    public function get_total_rows()
    {
        $this->db->from('employees');
        $this->db->where('deleted', 0);

        return $this->db->count_all_results();
    }

    /*
	Returns all the employees
	*/
    public function get_all($limit = 10000, $offset = 0)
    {
        $this->db->from('employees');
        $this->db->where('deleted', 0);
        $this->db->join('people', 'employees.person_id = people.person_id');
        $this->db->order_by('last_name', 'asc');
        $this->db->limit($limit);
        $this->db->offset($offset);

        return $this->db->get();
    }

    /*
	Gets information about a particular employee
	*/
    public function get_info($employee_id)
    {
        $this->db->from('employees');
        $this->db->join('people', 'people.person_id = employees.person_id');
        $this->db->where('employees.person_id', $employee_id);
        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            //Get empty base parent object, as $employee_id is NOT an employee
            $person_obj = parent::get_info(-1);

            //Get all the fields from employee table
            //append those fields to base parent object, we we have a complete empty object
            foreach($this->db->list_fields('employees') as $field)
            {
                $person_obj->$field = '';
            }

            return $person_obj;
        }
    }

    /*
	Gets information about multiple employees
	*/
    public function get_multiple_info($employee_ids)
    {
        $this->db->from('employees');
        $this->db->join('people', 'people.person_id = employees.person_id');
        $this->db->where_in('employees.person_id', $employee_ids);
        $this->db->order_by('last_name', 'asc');

        return $this->db->get();
    }

    /*
	Inserts or updates an employee
	*/
    public function save_employee(&$person_data, &$employee_data, &$grants_data, $employee_id = FALSE)
    {
        $success = FALSE;

        //Run these queries as a transaction, we want to make sure we do all or nothing
        $this->db->trans_start();

        if(parent::save($person_data, $employee_id))
        {
            if(!$employee_id || !$this->exists($employee_id))
            {
                $employee_data['person_id'] = $employee_id = $person_data['person_id'];
                $success = $this->db->insert('employees', $employee_data);
            }
            else
            {
                $this->db->where('person_id', $employee_id);
                $success = $this->db->update('employees', $employee_data);
            }

            //We have either inserted or updated a new employee, now lets set permissions.
            if($success)
            {
                //First lets clear out any grants the employee currently has.
                $success = $this->db->delete('grants', array('person_id' => $employee_id));

                //Now insert the new grants
                if($success)
                {
                    foreach($grants_data as $permission_id)
                    {
                        $success = $this->db->insert('grants', array('permission_id' => $permission_id, 'person_id' => $employee_id));
                    }
                }
            }
        }

        $this->db->trans_complete();

        $success &= $this->db->trans_status();

        return $success;
    }

    /*
	Deletes one employee
	*/
    public function delete($employee_id)
    {
        $success = FALSE;

        //Don't let employees delete theirself
        if($employee_id == $this->get_logged_in_employee_info()->person_id)
        {
            return FALSE;
        }

        //Run these queries as a transaction, we want to make sure we do all or nothing
        $this->db->trans_start();

        //Delete permissions
        if($this->db->delete('grants', array('person_id' => $employee_id)))
        {
            $this->db->where('person_id', $employee_id);
            $success = $this->db->update('employees', array('deleted' => 1));
        }

        $this->db->trans_complete();

        return $success;
    }

    /*
	Deletes a list of employees
	*/
    public function delete_list($employee_ids)
    {
        $success = FALSE;

        //Don't let employees delete theirself
        if(in_array($this->get_logged_in_employee_info()->person_id, $employee_ids))
        {
            return FALSE;
        }

        //Run these queries as a transaction, we want to make sure we do all or nothing
        $this->db->trans_start();

        $this->db->where_in('person_id', $employee_ids);
        //Delete permissions
        if($this->db->delete('grants'))
        {
            //delete from employee table
            $this->db->where_in('person_id', $employee_ids);
            $success = $this->db->update('employees', array('deleted' => 1));
        }

        $this->db->trans_complete();

        return $success;
    }

    /*
	Performs a search on employees
	*/
    public function search($search, $rows = 0, $limit_from = 0, $sort = 'last_name', $order = 'asc')
    {
        $this->db->from('employees');
        $this->db->join('people', 'employees.person_id = people.person_id');
        $this->db->group_start();
        $this->db->like('first_name', $search);
        $this->db->or_like('last_name', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('phone_number', $search);
        $this->db->or_like('username', $search);
        $this->db->or_like('CONCAT(first_name, " ", last_name)', $search);
        $this->db->group_end();
        $this->db->where('deleted', 0);
        $this->db->order_by($sort, $order);

        if($rows > 0)
        {
            $this->db->limit($rows, $limit_from);
        }

        return $this->db->get();
    }

    public function store_user_data($person_id)
    {
        $this->db->select('employees.person_id, username, first_name, last_name, gender, phone_number, email, zip, country');
        $this->db->from('employees');
        $this->db->join('people', 'employees.person_id = people.person_id');
        $this->db->where('employees.person_id', $person_id);

        $db = $this->db->get();

        return $db->row();
    }

    /*
	Logs out a user by destorying all session data and redirect to login
	*/
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('login');
    }

    /*
    Determins if a employee is logged in
    */
    public function is_logged_in()
    {
        return ($this->session->userdata('person_id') != FALSE);
    }

    /*
    Gets information about the currently logged in employee.
    */
    public function get_logged_in_employee_info()
    {
        if($this->is_logged_in())
        {
            return $this->get_info($this->session->userdata('person_id'));
        }

        return FALSE;
    }

    /*
	Gets all information on currently logged in employee
	*/
    public function get_logged_in_employee_all_info()
    {
        if($this->is_logged_in())
        {
            return $this->session->person_data;
        }

        return FALSE;
    }

    /*
	Logs in a user vis swipe cards
	*/
    public function pin_login($pin)
    {
        $query = $this->db->get_where('employees', array('pin' => sha1($pin)));

        if($query->num_rows() == 1)
        {
            $this->session->set_userdata('person_id', $query->row()->person_id);
            $this->session->set_userdata('person_data', $this->store_user_data($query->row()->person_id));
            return TRUE;
        }

        return FALSE;
    }

    /*
	Attempts to login employee and set session. Returns boolean based on outcome.
	*/
    public function pasword_login($username, $password)
    {
        $query = $this->db->get_where('employees', array('username' => $username, 'deleted' => 0), 1);

        if($query->num_rows() == 1)
        {
            $row = $query->row();

            // compare passwords
            if (password_verify($password, $row->password))
            {
                $this->session->set_userdata('person_id', $query->row()->person_id);
                $this->session->set_userdata('person_data', $this->store_user_data($query->row()->person_id));
                return TRUE;
            }

        }

        return FALSE;
    }
}