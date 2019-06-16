<?php
class Excel_import_model extends CI_Model
{
	
	function insert($data)
	{
		$this->db->insert_batch('marks_table', $data);
	}
}
