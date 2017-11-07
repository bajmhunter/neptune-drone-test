<?PHP

class Backup extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');
		$this->load->helper('file');
	}

	public function getDatabaseBackups(){
		$dir = directory_map('../backups', 1);


		$loop = 0;
		if(sizeof($dir) != ''){
			$return['backups'] = true;
			foreach($dir as $file){
				$details = get_file_info('../backups/' . $file, array('date', 'size'));
				$return['databases'][$loop]['date'] = date('d/m/Y', $details['date']); 
				$return['databases'][$loop]['time'] = date('H:i:s', $details['date']); 
				$return['databases'][$loop]['size'] = $this->human_filesize($details['size']);
				$return['databases'][$loop]['filename'] = $file;
				$return['databases'][$loop]['postFile'] = str_replace('.', '~', $file);
				$loop++;
			}
		}else{
			$return['backups'] = false;
		}

		return $return;
	}

	function human_filesize($bytes, $decimals = 2) {
    	$size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    	$factor = floor((strlen($bytes) - 1) / 3);
    	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
	}

	function sqlBackup()
	{
		$prefs = array(
        'format'        => 'txt',                       // gzip, zip, txt
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n"                         // Newline character used in backup file
		);
		$this->load->dbutil($prefs);

		$backup = $this->dbutil->backup();
		
		$name = date('Ymd_His') . '.gz';
		write_file('../backups/' . $name, $backup);

		$details = get_file_info('../backups/' . $name, array('date', 'size'));
		
		return array('result' => 'true',
					'file' => array(
						'date' => date('d/m/Y', $details['date']),
						'time' => date('H:i:s', $details['date']),
						'size' => $this->human_filesize($details['size']),
						'filename' => $name,
						'postFile' => str_replace('.', '~', $name)
						)
					);
	}

	function deletebackup($filename)
	{
		$filename = str_replace('~', '.', $filename);
		return unlink("../backups/" . $filename);
	}
}