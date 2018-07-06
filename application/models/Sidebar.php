<?php
class Sidebar extends CI_Model 
{
	public function generate(){
		$returnData = ['recent'] = $this->recent_checkins();
	}
	

	public function recent_checkins(){
		//select all with status 2 (on bench)
		//check all that are on the bench

		
	}
}
?>