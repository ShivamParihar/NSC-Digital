<?php

class Superadmin extends MY_Controller{
	
	//function to display super-admin profile
	public function index(){
		
		$this->load->view('superadmin_profile');
	}
	
	//function to check user is superadmin or not
	public function __construct(){
	    
	    parent::__construct();
		if( $this->session->userdata('role') != 1){
		        return redirect('logincontroller');
		}
	}
    
    //function to display add admin page
	public function addAdmin(){
		
		$this->load->view('add_admin');
	}
    
    //function to display all user  list except superadmin
	public function list1(){

		$q = $this->db
						->from('userinfo')
						->where('role !=',1)
						->get();

		$result = $q->result();
		$this->load->view('list_superadmin',['dblist'=>$result]);
	}

	//function to add student
	public function adminRegister(){
        
		//validate form values
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('father_name','Father\'s Name','trim|required');		
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[8]');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('city','City','trim|required|alpha');
		$this->form_validation->set_rules('state','State','trim|required');
		$this->form_validation->set_rules('contact_number','Contact Number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('dob','Date of birth','trim|required');
		$this->form_validation->set_rules('aadhar_no','Aadhar number','trim|required|integer|exact_length[12]');
		$this->form_validation->set_rules('gender','Gender','trim|required|alpha');
		$this->form_validation->set_rules('mother_name','Mother\'s Name' ,'trim|required');
		$this->form_validation->set_rules('pincode','Pincode' ,'trim|required|integer|exact_length[6]');
		
		//set error messages
		$this->form_validation->set_error_delimiters('<span class="err"><small>','</small></span>');

		//check input is valid or not
		if( $this->form_validation->run() == TRUE){
		    //if validation is successful
			//upload photo of operator
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
            
            //upload signature of operator
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
            
            
            //print_r($profile_img_path.' hsbdsakndjsa '.$sign_img_path);
            
			//if validation is successful
			$parent_id = $this->session->userdata('unique_id');
			$role = 2;
			$name = $this->input->post('name');
			$father_name = $this->input->post('father_name');
			$contact_number  = $this->input->post('contact_number');			
			$email = $this->input->post('email');
			$address = $this->input->post('address');
			$password  = $this->input->post('password');			
			$city = $this->input->post('city');
			$state  = $this->input->post('state');
			$mother_name = $this->input->post('mother_name');
			$dob = $this->input->post('dob');
			$aadhar_no = $this->input->post('aadhar_no');
			$gender = $this->input->post('gender');
			$pincode = $this->input->post('pincode');
			
			//generate auto password
			if($password == ''){
			    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $password = substr( str_shuffle( $chars ), 0 , 10 );
			}
			
			//check user already registered from Contact NO.
		    $q = $this->db->where('contact_number',$contact_number)
						->get('userinfo');
			if( $q->num_rows()>0 ){
			    //return to register page
			    $this->session->set_flashdata('register_success','Mobile number already registered');
				return redirect('Superadmin/addAdmin');
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
			 'father_name'=>$father_name,
			 'parent_id'=> $parent_id,
			 'profile_img_path'=>$profile_img_path,
			 'sign_img_path'=>$sign_img_path,
			 'dob'=>$dob,
			 'aadhar_no'=>$aadhar_no,
			 'gender'=>$gender,
			 'mother_name'=>$mother_name,
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
                $message = urlencode("NSC Digital\nRegistration Successful (Officer)\n\nMobile No. : ".$contact_number."\nPassword : ".$password);
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
                    $message = '<p style="color: #000;">Congratulations!! You have successfully registered an account on NSC Digital as Officer.</p>';
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
    		return redirect('Superadmin/addAdmin');
    		
		}
		else{
			//if validation fails with errors
			$this->load->view('add_admin');
			
		}
	}
}
