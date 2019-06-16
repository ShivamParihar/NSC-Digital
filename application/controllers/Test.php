<?php

class Test extends CI_Controller{
    
    //function to display the login page
	public function index(){
	    
	    $from_email = "nscdigital@ihisaab.co.in";
        $to_email = 'xavieranand23@gmail.com';
        //Load email library
        $this->load->library('email');
        
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.ihisaab.co.in';
        $config['smtp_user'] = 'nscdigital@ihisaab.co.in';
        $config['smtp_pass'] = 'nscdigital@123';
        $config['smtp_port'] = 587;
        $this->email->initialize($config);
         
        $this->email->set_newline("\r\n");


        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        //Send mail
        if($this->email->send())
            print_r("send");
            exit;
	}
	
	public function getData(){
	    

//$conn = mysqli_connect("localhost","root","test","phpsamples");

$s1 = base_url('assets/excel_reader2.php');
$s2 = base_url('assets/SpreadsheetReader.php');

require_once($s1);
require_once($s2);

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $table_id = "";
                if(isset($Row[0])) {
                    $table_id = $Row[0];
                }
                $student_id = "";
                if(isset($Row[1])) {
                    $student_id = $Row[1];
                }
                $subject = "";
                if(isset($Row[2])) {
                    $subject = $Row[2];
                }
                $marks = "";
                if(isset($Row[3])) {
                    $marks = $Row[3];
                }
                $total_marks = "";
                if(isset($Row[4])) {
                    $total_marks = $Row[4];
                }
                $session1 = "";
                if(isset($Row[5])) {
                    $session1 = $Row[5];
                }
                
                if (!empty($table_id) || !empty($student_id)) {
                    $query = "insert into tbl_info(name,description) values('".$name."','".$description."')";
                    $result = mysqli_query($conn, $query);
                    
                    $data = array('table_id'=>$table_id,
                        'student_id'=>$student_id,
		    	    'subject'=>$subject,
			        'marks'=>$marks,
			        'total_marks'=>$total_marks,
			        'session1'=>$session1
	    	    );	 
		        $result = $this->db->insert('marks_table',$data);
		
                
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}

	}
}