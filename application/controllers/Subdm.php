<?php

class Subdm extends MY_Controller{
	
	//function to display sud-dm profile
	public function index(){
		
		$this->load->view('subdm_profile');
	}
	
	//function to check user is sub-dm or not
	public function __construct(){
	    
	    parent::__construct();
		if( $this->session->userdata('role') != 4){
		        return redirect('logincontroller');
		}
	}
    
    //function to display add school page
	public function addSchool(){
		
		$this->load->view('add_school');
	}

    //function to display school list
	public function list1(){

		$q = $this->db
						->from('userinfo')
						->where('role', 5)
						->get();

		//print_r($q);

		$result = $q->result();

		$this->load->view('list_subdm',['dblist'=>$result]);
	}
	
	//function to add school
	public function prinicipal_register(){
        
         $this->load->library('upload');
        // $config['upload_path']          =  base_url('uploads/');
        // $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['file_name']            = 'shivam';
		
		//validate form values
		$this->form_validation->set_rules('school_name','School Name','trim|required');
		$this->form_validation->set_rules('prinicipal_name','Prinicipal Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[8]');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('city','City','trim|required|alpha');
		$this->form_validation->set_rules('state','State','trim|required');
		$this->form_validation->set_rules('contact_number','Contact Number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('pincode','Pincode' ,'trim|required|integer|exact_length[6]');
		
		//$this->form_validation->set_rules('userfile', 'Logo', 'required');
		
		//set error messages
		$this->form_validation->set_error_delimiters('<span class="err"><small>','</small></span>');

		//check input is valid or not
		if( $this->form_validation->run() ){
			//if validation is successful
			if(!empty($_FILES['userfile']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '100000000000000000000';
                $config['file_name'] = $_FILES['userfile']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                $image= "";
                if($this->upload->do_upload('userfile')){
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }else{
                    $image = '';
                }
                }else{
                    $image = $this->input->post('oldimage');
                }
                if($image == '')
                    $image = "";
                
                
			$parent_id = $this->session->userdata('unique_id');
			$role = 5;
			$school_name = $this->input->post('school_name');
			$prinicipal_name = $this->input->post('prinicipal_name');
			$contact_number  = $this->input->post('contact_number');			
			$email = $this->input->post('email');
			$address = $this->input->post('address');
			$password  = $this->input->post('password');			
			$city = $this->input->post('city');
			$state  = $this->input->post('state');
			$pincode = $this->input->post('pincode');
			
			//check user already registered from Contact NO.
		    $q = $this->db->where('contact_number',$contact_number)
						->get('userinfo');
			if( $q->num_rows()>0 ){
			    //return to register page
			    $this->session->set_flashdata('register_success','Mobile number already registered');
				return redirect('Subdm/addSchool');
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

			//create querry
			 $data = array('unique_id'=>$unique_id,
			 'role'=>$role,
			 'name'=>$prinicipal_name,
			 'contact_number'=>$contact_number,
			 'email'=>$email,
			 'password'=>$password,
			 'city'=>$city,
			 'parent_id'=> $parent_id,
			 'state'=>$state,
			 'address'=>$address,
			 'profile_img_path'=>$image,
			 'school_name'=>$school_name,
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
                $message = urlencode("NSC Digital\nRegistration Successful (School)\n\nMobile No. : ".$contact_number."\nPassword : ".$password);
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
                    $message = '<p style="color: #000;">Congratulations!! You have successfully registered an account on NSC Digital as School.</p>';
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
    		}	return redirect('Subdm/addSchool');
		}
		else{
 			//if validation fails with errors
 			$upload_error = $this->upload->display_errors();
 			$this->load->view('add_school',compact('upload_error'));
			
 		}
	}
}
