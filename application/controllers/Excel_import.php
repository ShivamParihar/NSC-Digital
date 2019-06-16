<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}

	function index()
	{
		$this->load->view('excel_import');
	}
	
	
	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$student_id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$subject = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$marks = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$total_marks = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$session1 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$data[] = array(
						'student_id'			=>	$student_id,
						'subject'				=>	$subject,
						'marks'		            =>	$marks,
						'total_marks'			=>	$total_marks,
						'session1'              =>  $session1
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}	
	}
}

?>