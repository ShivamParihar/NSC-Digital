<?php

class Operator extends MY_Controller{
	
	//function to load operator profile
	public function index(){
		
		$this->session->set_userdata('session1',2018);
		$this->load->view('operator_profile');
	}
	
	//function to check user is operator or not
	public function __construct(){
	    
	    parent::__construct();
		if( $this->session->userdata('role') != 6){
		        return redirect('logincontroller');
		}
	}
    
    //function to display add student page
	public function addStudent(){
		
		$this->load->view('add_student');
	}
    
    //function to display student list
	public function list1(){
        $school_name = $this->session->userdata('school_name');
		$q = $this->db
						->from('userinfo')
						->where('role', 8)
						->where('school_name',$school_name)
						->get();

		//print_r($q);

		$result = $q->result();

		$this->load->view('list_operator',['dblist'=>$result]);
	}

	//function to validate and add student
	public function student_register(){
        
        // $this->load->library('upload');
        // $config['upload_path']          =  base_url('uploads/');
        // $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['file_name']            = 'shivam';
		
		//validate form values
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('enroll_no','Enrollment Number','trim|required');
		$this->form_validation->set_rules('father_name','Name','trim|required');		
		$this->form_validation->set_rules('class1','Class','trim|required|integer');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[8]');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('city','City','trim|required|alpha');
		$this->form_validation->set_rules('state','State','trim|required');
		$this->form_validation->set_rules('contact_number','Contact Number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('dob','Date of birth','trim|required');
		$this->form_validation->set_rules('aadhar_no','Aadhar number','trim|required|integer|exact_length[12]');
		$this->form_validation->set_rules('gender','Gender','trim|required|alpha');
		$this->form_validation->set_rules('mother_name','Name' ,'trim|required');
		$this->form_validation->set_rules('father_occupation','Occupation','trim');
		$this->form_validation->set_rules('mother_occupation','Occupation','trim');
		$this->form_validation->set_rules('father_mob_no','Mobile Number','trim');
		$this->form_validation->set_rules('admission_date','Admission date','trim');
		$this->form_validation->set_rules('section','Section','trim|alpha');
		$this->form_validation->set_rules('fee_salary','Fee','trim|integer');
		$this->form_validation->set_rules('paid_fee','Fee','trim|integer');
		$this->form_validation->set_rules('pincode','Pincode' ,'trim|required|integer|exact_length[6]');
		
		//set error messages
		$this->form_validation->set_error_delimiters('<span class="err"><small>','</small></span>');
        
        //check input is valid or not
		if( $this->form_validation->run() == TRUE){
			//if validation is successful
			
			//upload profile image
			if(!empty($_FILES['profile_img_path']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '100000000000000000000';
                $config['file_name'] = $_FILES['profile_img_path']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                $profile_img_path= "";
                if($this->upload->do_upload('profile_img_path')){
                    $uploadData = $this->upload->data();
                    $profile_img_path = $uploadData['file_name'];
                }else{
                    $profile_img_path = '';
                }
            }
            else{
                $profile_img_path = '';
            }
            
            //upload student signature
            if(!empty($_FILES['sign_img_path']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '100000000000000000000';
                $config['file_name'] = $_FILES['sign_img_path']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                $sign_img_path = "";
                if($this->upload->do_upload('sign_img_path')){
                    $uploadData = $this->upload->data();
                    $sign_img_path = $uploadData['file_name'];
                }else{
                    $sign_img_path = '';
                }
            }
            else{
                $sign_img_path = '';
            }
            
            //upload father's signature
            if(!empty($_FILES['parent_sign_img']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '100000000000000000000';
                $config['file_name'] = $_FILES['parent_sign_img']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                $parent_sign_img= "";
                if($this->upload->do_upload('parent_sign_img')){
                    $uploadData = $this->upload->data();
                    $parent_sign_img = $uploadData['file_name'];
                }else{
                    $parent_sign_img = '';
                }
            }
            else{
                $parent_sign_img = '';
            }
            
            
            $school_name = $this->session->userdata('school_name');
		    $parent_id = $this->session->userdata('unique_id');
			$role = 8;
			//take input data from post method
			$name = $this->input->post('name');
			$enroll_no = $this->input->post('enroll_no');
			$father_name = $this->input->post('father_name');
			$class1 = $this->input->post('class1');
			$contact_number  = $this->input->post('contact_number');			
			$email = $this->input->post('email');
			$address = $this->input->post('address');
			$password  = $this->input->post('password');			
			$city = $this->input->post('city');
			$state  = $this->input->post('state');
			$mother_name = $this->input->post('mother_name');
			$mother_occupation = $this->input->post('mother_occupation');
			$father_occupation = $this->input->post('father_occupation');
			$dob = $this->input->post('dob');
			$aadhar_no = $this->input->post('aadhar_no');
			$gender = $this->input->post('gender');
			$father_mob_no = $this->input->post('father_mob_no');
			$admission_date = $this->input->post('admission_date');
			$section = $this->input->post('section');
			$fee_salary = $this->input->post('fee_salary');
			$paid_fee = $this->input->post('paid_fee');
			$pincode = $this->input->post('pincode');
			
			//check user already registered from Contact NO.
		    $q = $this->db->where('contact_number',$contact_number)
						->get('userinfo');
			if( $q->num_rows()>0 ){
			    //return to register page
			    $this->session->set_flashdata('register_success','Mobile number already registered');
				return redirect('Operator/addStudent');
			}
			//generate auto password
			if($password == ''){
			    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $password = substr( str_shuffle( $chars ), 0 , 10 );
			}
            
			//get last unique_id
			$this->db->select('unique_id');
			$this->db->select_max('unique_id'); 
			$unique_id = $this->db->get('userinfo')->row()->unique_id;
			$unique_id++;

			//create query
			 $data = array('unique_id'=>$unique_id,
			 'role'=>$role,
			 'name'=>$name,
			 'contact_number'=>$contact_number,
			 'email'=>$email,
			 'password'=>$password,
			 'city'=>$city,
			 'state'=>$state,
			 'address'=>$address,
			 'school_name'=>$school_name,
			 'father_name'=>$father_name,
			 'enroll_no'=>$enroll_no,
			 'parent_id'=> $parent_id,
			 'class1'=>$class1,
			 'profile_img_path'=>$profile_img_path,
			 'sign_img_path'=>$sign_img_path,
			 'parent_sign_img'=>$parent_sign_img,
			 'fee_salary'=>$fee_salary,
			 'dob'=>$dob,
			 'aadhar_no'=>$aadhar_no,
			 'gender'=>$gender,
			 'father_mob_no'=>$father_mob_no,
			 'paid_fee'=>$paid_fee,
			 'father_occupation'=>$father_occupation,
			 'mother_name'=>$mother_name,
			 'mother_occupation'=>$mother_occupation,
			 'admission_date'=>$admission_date,
			 'section'=>$section,
			 'pincode'=>$pincode
			);
        
			//insert value in database
    		$row_affected = $this->db->insert('userinfo',$data);
    		
    		if($row_affected > 0){
    		    
    		    //send message
                //Your authentication key
                $authKey = "262419ASDsqppi5c62c19a";
                //Multiple mobiles numbers separated by comma
                $mobileNumber = $contact_number;
                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "NSCDIG";
                //Your message to send, Add URL encoding here.
                $message = urlencode("NSC Digital\nRegistration Successful (Student)\n\nMobile No. : ".$contact_number."\nPassword : ".$password);
                //$message = urlencode("NSC Digital");
                //Prepare you post parameters
                $postData = array(
                    'authkey' => $authKey,
                    'mobiles' => $mobileNumber,
                    'message' => $message,
                    'sender'  => $senderId,
                    //'route' => $route
                );
                //API URL
                $url="http://api.msg91.com/api/sendhttp.php";
                // init the resource
                $ch = curl_init($url);
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));
                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                
                //get response
                $output = curl_exec($ch);
                //Print error if any
                if(curl_errno($ch))
                {
                    //echo 'error:' . curl_error($ch);
                }
                curl_close($ch);
                
                //send mail if id given
                if($email !=''){
                    $from_email = "nscdigital@ihisaab.co.in";
                    $to_email = $email;
                    //Load email library
                    $this->load->library('email');
                    
                    $config = array();
                    $config['protocol'] = 'smtp';
                    $config['smtp_host'] = 'mail.ihisaab.co.in';
                    $config['smtp_user'] = 'nscdigital@ihisaab.co.in';
                    $config['smtp_pass'] = 'nscdigital@123';
                    $config['smtp_port'] = 587;
                    $config['mailtype'] = 'html';
                    $config['charset'] = 'iso-8859-1';
                    $this->email->initialize($config);
                    
                    $this->email->set_newline("\r\n");
            
                    $this->email->from($from_email, 'NSC Digital');
                    $this->email->to($to_email);
                    $this->email->subject('Login Details - NSC Digital');
                    $message = '<p style="color: #000;">Congratulations!! You have successfully registered an account on NSC Digital as Student.</p>';
                    $message .='<h4 style="color: #000;">Your login details : </h4>';
                    $message .= 'Contact number : '.$contact_number;
                    $message .= '<br/>Password : '.$password.'<br/><br/>';
                    $message .= '<a href="ihisaab.co.in/DSC/index.php/LoginController" style="background-color: orange;border: none;
                                  color: white;
                                  padding: 5px 8px;
                                  text-align: center;
                                  text-decoration: none;
                                  display: inline-block;
                                  font-size: 16px;
                                  margin: 4px 2px;
                                  cursor: pointer;">Click to login</a>';
                    $this->email->message($message);
                    //Send mail
                    $this->email->send();
                }
                
                
      		    $this->session->set_flashdata('register_success','Register Successful');
    		}
    		else{
    		    $this->session->set_flashdata('register_success','Database problem : Try after some time');
    		}
    		return redirect('Operator/addStudent');
		}
		else{
			//if validation fails with errors
			$this->load->view('add_student');
			
		}
	}
	
	//function to display take attendence page with student list
	public function attendencePage(){
	    $school_name = $this->session->userdata('school_name');
		$q = $this->db
						->from('userinfo')
						->where('role', 8)
						->where('school_name',$school_name)
						->get();

		$result = $q->result();

		$this->load->view('take_attendence',['dblist'=>$result]);

	}
	
	//function to store attendence in database
	public function storeAttendence(){
	    $date = date("Y-m-d");
	    $record = $this->input->post();
	    foreach($record as $student_id => $attendence){
	        
	        $data = array('student_id'=>$student_id,
			 'attendence'=>$attendence
			);
			
			//insert value in database
    		$this->db->insert('attendence_record',$data);
	    }
	    
	    $this->session->set_flashdata('attendence_success','Attendence Successful Saved');
		return redirect('Operator/attendencePage');
	}
	
	//function to display view attendence page (first redirect to sendlist controller from where it get list of students)
	public function attendenceView(){
	    return redirect('Sendlist/getListViewAttendence');

	}
	
	//function to display TC page
	public function tc(){
	    
	    $this->load->view('tc');
	}
    
    //function to display input marks page
    public function inputMarks($unique_id1){
        
        $q = $this->db->where('unique_id',$unique_id1)
                     ->get('userinfo');
        
        $this->session->set_userdata('unique_id1',$unique_id1);
	    if( $q->num_rows()>0 ){
				//login valid
				$name1 = $q->row('name');
				$enroll_no1 = $q->row('enroll_no');
				$class11 = $q->row('class1');
				$section1 = $q->row('section');
				$contact_number1 = $q->row('contact_number');
				
				$this->session->set_userdata('name1',$name1);
				$this->session->set_userdata('enroll_no1',$enroll_no1);
				$this->session->set_userdata('class11',$class11);
				$this->session->set_userdata('section1',$section1);
				$this->session->set_userdata('contact_number1',$contact_number1);
	    }
	    $session1 = $this->session->userdata('session1');
	    
        $q = $this->db->where('student_id',$unique_id1)
                        ->where('session1',$session1)
		            ->get('marks_table');
		            
		$result = $q->result();

        $this->load->view('input_marks',['dblist'=>$result]);
    }
    
    //function to store marks in database
    public function setMarks(){
        
        $unique_id1 = $this->session->userdata('unique_id1');
        $session1 = $this->session->userdata('session1');
        $contact_number1 = $this->session->userdata('contact_number1');
        $this->form_validation->set_rules('marks','Marks','trim|numeric|required');
		$this->form_validation->set_rules('total_marks','Marks','trim|numeric|required');
        
		$this->form_validation->set_error_delimiters('<span class="err"><small>','</small></span>');
        
        //check input is valid or not
		if( $this->form_validation->run() == TRUE){
			//if validation is successful
		    
		    //take input value through post
		    $marks = $this->input->post('marks');
		    $total_marks = $this->input->post('total_marks');
			$subject = $this->input->post('subject');	
		    
		    //find is it a first marks 
		    $row = $this->db->where('student_id',$unique_id1)
		                ->where('session1',$session1)
		                ->count_all_results('marks_table');
		    
		    //create query
		    $data = array('student_id'=>$unique_id1,
		    	 'subject'=>$subject,
			     'marks'=>$marks,
			    'total_marks'=>$total_marks,
			    'session1'=>$session1
	    	);	 
	    	
		    //insert value in database
    		$row_affected = $this->db->insert('marks_table',$data);
    		
    		if($row_affected > 0 && $row<1){
    		    
    		    //send message
                //Your authentication key
                $authKey = "262419ASDsqppi5c62c19a";
                //Multiple mobiles numbers separated by comma
                $mobileNumber = $contact_number1;
                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "NSCDIG";
                //Your message to send, Add URL encoding here.
                $message = urlencode("NSC Digital\n".$this->session->userdata('school_name')."\n\nDear  ".$this->session->userdata('name1')." ,\nYour Marksheet is generated");
                //$message = urlencode("NSC Digital");
                //Prepare you post parameters
                $postData = array(
                    'authkey' => $authKey,
                    'mobiles' => $mobileNumber,
                    'message' => $message,
                    'sender'  => $senderId,
                    //'route' => $route
                );
                //API URL
                $url="http://api.msg91.com/api/sendhttp.php";
                // init the resource
                $ch = curl_init($url);
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));
                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                
                //get response
                $output = curl_exec($ch);
                //Print error if any
                if(curl_errno($ch))
                {
                    //echo 'error:' . curl_error($ch);
                }
                curl_close($ch);
      		    $this->session->set_flashdata('register_success','Register Successful');
    		}
    		else{
    		    $this->session->set_flashdata('register_success','Database problem : Try after some time');
    		}
		    
		    
		    
		    
		
	    	$this->db->set('marksheet_status', 'Generated');
            $this->db->where('unique_id',$unique_id1);
            $this->db->update('userinfo');
            
		}
		$q = $this->db->where('student_id',$unique_id1)
		                ->where('session1',$session1)
		            ->get('marks_table');
		            
		    $result = $q->result();
		
		$this->load->view('input_marks',['dblist'=>$result]);
    }
    
    //function to delete marks from database
    function deleteMarks($unique_id , $subject){
        
        $session1 = $this->session->userdata('session1');
        
        $this->db->where('student_id', $unique_id)
                ->where('subject',$subject)
                ->where('session1',$session1)
                ->delete('marks_table');
        
        $this->session->set_flashdata('update_query','Deleted Successfully');
        
        return redirect('Operator/inputMarks/'.$unique_id);
    }
    
    //function to change session
    function setSession(){
        
        $session1 = $this->input->post('session1');
        
        $this->session->set_userdata('session1',$session1);
        $unique_id1 = $this->session->userdata('unique_id1');
        
        
        return redirect('Operator/inputMarks/'.$unique_id1);
    }
    
    //function to get marksheet for particular student
    function getMarksheet(){
        
        //get student datails to print in marksheet
        $unique_id1 = $this->session->userdata('unique_id1');
        $session1 = $this->session->userdata('session1');
        $q = $this->db->where('unique_id',$unique_id1)
                     ->get('userinfo');
        
	    if( $q->num_rows()>0 ){
				//login valid
				$name1 = $q->row('name');
				$contact_number1  = $q->row('contact_number');
				$city1 = $q->row('city');
				$state1  =	$q->row('state');
				$address1 = $q->row('address');
				$school_name1 = $q->row('school_name');
				$father_name1 = $q->row('father_name');
				$enroll_no1 = $q->row('enroll_no');
				$class11 = $q->row('class1');
				$profile_img_path1 = $q->row('profile_img_path');
				$sign_img_path1 = $q->row('sign_img_path');
				$parent_sign_path1 = $q->row('parent_sign_path');
				$dob1 = $q->row('dob');
				$gender1 = $q->row('gender');
				$aadhar_no1 = $q->row('aadhar_no');
				$section1 = $q->row('section');
				
				$this->session->set_userdata('name1',$name1);
				$this->session->set_userdata('contact_number1',$contact_number1);
				$this->session->set_userdata('city1',$city1);
				$this->session->set_userdata('state1',$state1);
				$this->session->set_userdata('address1',$address1);
				$this->session->set_userdata('school_name1',$school_name1);
				$this->session->set_userdata('father_name1',$father_name1);
				$this->session->set_userdata('enroll_no1',$enroll_no1);
				$this->session->set_userdata('class11',$class11);
				$this->session->set_userdata('section1',$section1);
                $this->session->set_userdata('profile_img_path1',$profile_img_path1);
                $this->session->set_userdata('dob1',$dob1);
				$this->session->set_userdata('sign_img_path1',$sign_img_path1);
				$this->session->set_userdata('aadhar_no1',$aadhar_no1);
				$this->session->set_userdata('parent_sign_path1',$parent_sign_path1);
				$this->session->set_userdata('gender1',$gender1);
				
				
				//get school details to display in marksheet
				$school_name = $this->session->userdata('school_name');
	            $q = $this->db->like('school_name',$school_name)
						->get('userinfo');

			if( $q->num_rows()>0 ){
				//login valid
				$contact_number2  = $q->row('contact_number');
				$email2 = $q->row('email');
				$city2 = $q->row('city');
				$state2  =	$q->row('state');
				$address2 = $q->row('address');
				$profile_img_path2 = $q->row('profile_img_path');
				
				$this->session->set_userdata('contact_number2',$contact_number2);
				$this->session->set_userdata('email2',$email2);
				$this->session->set_userdata('city2',$city2);
				$this->session->set_userdata('state2',$state2);
				$this->session->set_userdata('address2',$address2);
				$this->session->set_userdata('profile_img_path2',$profile_img_path2);
				
			}
                
            $q = $this->db->where('student_id',$unique_id1)
		                ->where('session1',$session1)
		            ->get('marks_table');
		            
		    $result = $q->result();
		    $this->load->view('view_marksheet_operator',['dblist'=>$result]);
            
	    }
    }
    
    
	public function selectMarksheet(){
		
		$this->load->view('operator_request_marksheet');
	}
	
	public function selectAdmitcard(){
		
		$this->load->view('operator_request_admitcard');
	}
	
	public function sendSms(){
		
		$this->load->view('operator_sendsms');
	}
	
	//marksheet
	public function ViewMarksheetPortrait(){
		
		$this->load->view('view_marksheet');
	}
	
	
    //Admit card
	public function ViewAdmitcardPortrait(){
		
		$this->load->view('view_admitcard');
	}
	
}
