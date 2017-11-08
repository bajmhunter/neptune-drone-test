<?php

class Config extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('backup');
    }

    public function index()
    {
        $data['title'] = "Config";
        $data['database'] = $this->backup->getDatabaseBackups();
        $data['notification']= $this->notifications();
        $this->load->view('config/manage', $data);
    }

    public function save_info()
	{
		$batch_save_data = array(
			'company' => $this->input->post('company'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'fax' => $this->input->post('fax'),
			'website' => $this->input->post('website'),
			'vat_number' => $this->input->post('vat_number')
		);

		$result = $this->Appconfig->batch_save($batch_save_data);
		$success = $result ? TRUE : FALSE;
		$message = $this->lang->line('config_saved_' . ($success ? '' : 'un') . 'successfully');

		echo json_encode(array(
			'success' => $success,
			'message' => $message
		));
	}

	public function downloadFile($filename) {
		$name = str_replace('~', '.', $filename);

		$this->load->helper('download');
		$file = file_get_contents('../backups/'.$name);
		force_download($name, $file);

	}

	public function sqlbackup() {
		$result = $this->backup->sqlBackup();
		$success = $result['result'] ? TRUE : FALSE;
		$message = $this->lang->line('config_sql_dump_' . ($success ? '' : 'un') . 'successfully');

		echo json_encode(array(
			'success' => $success,
			'message' => $message,
			'file' => $result['file']
		));
	}

	public function deletefile($filename)
	{
		$result = $this->backup->deletebackup($filename);
		$success = $result ? TRUE : FALSE;
		$message = $this->lang->line('config_sql_delete_' . ($success ? '' : 'un') . 'successfully');

		echo json_encode(array(
			'success' => $success,
			'message' => $message
		));
	}

	public function notifications()
	{
		$setting = explode('-', $this->config->item('notify_position'));

		return array('horizontal' => $setting[2], 'vertical' =>$setting[1]);
	}

	public function save_notifications()
	{
		$notify_position = "toast-" . $this->input->post('notify_vertical_position') . "-" . $this->input->post('notify_horizontal_position');
		$batch_save_data = array(
			'notify_progress' => $this->input->post('notify_progress'),
			'notify_timeout' => $this->input->post('notify_timeout'),
			'notify_position' => $notify_position
		);

		$result = $this->Appconfig->batch_save($batch_save_data);
		$success = $result ? TRUE : FALSE;
		$message = $this->lang->line('config_saved_' . ($success ? '' : 'un') . 'successfully');

		echo json_encode(array(
			'success' => $success,
			'message' => $message
		));
	}
}