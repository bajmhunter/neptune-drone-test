<?php

class Person extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
	Determines whether the given person exists
	*/
    public function exists($person_id)
    {
        $this->db->from('people');
        $this->db->where('people.person_id', $person_id);

        return ($this->db->get()->num_rows() == 1);
    }

    /*
    Gets all people
    */
    public function get_all($limit = 10000, $offset = 0)
    {
        $this->db->from('people');
        $this->db->order_by('last_name', 'asc');
        $this->db->limit($limit);
        $this->db->offset($offset);

        return $this->db->get();
    }

    /*
    Gets total of rows
    */
    public function get_total_rows()
    {
        $this->db->from('people');
        $this->db->where('deleted', 0);

        return $this->db->count_all_results();
    }

    /*
    Gets information about a person as an array.
    */
    public function get_info($person_id)
    {
        $query = $this->db->get_where('people', array('person_id' => $person_id), 1);

        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            //create object with empty properties.
            $person_obj = new stdClass;

            foreach($this->db->list_fields('people') as $field)
            {
                $person_obj->$field = '';
            }

            return $person_obj;
        }
    }

    /*
    Get people with specific ids
    */
    public function get_multiple_info($person_ids)
    {
        $this->db->from('people');
        $this->db->where_in('person_id', $person_ids);
        $this->db->order_by('last_name', 'asc');

        return $this->db->get();
    }

    /*
    Inserts or updates a person
    */
    public function save(&$person_data, $person_id = FALSE)
    {
        if(!$person_id || !$this->exists($person_id))
        {
            if($this->db->insert('people', $person_data))
            {
                $person_data['person_id'] = $this->db->insert_id();

                return TRUE;
            }

            return FALSE;
        }

        $this->db->where('person_id', $person_id);

        return $this->db->update('people', $person_data);
    }
}