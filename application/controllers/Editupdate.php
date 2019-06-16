<?php

class Editupdate extends MY_Controller{
	
	//default function
	public function index(){
		
		return redirect('Logincontroller');
	}
	
	//if user is student redirect to login controller
	public function __construct(){
	    
	    parent::__construct();
		if( $this->session->userdata('role') == 8){
		        return redirect('logincontroller/logout');
		}
	}

    //function to update profile from user profile(itself's)
	public function updateFromProfile(){
	    
	    //get old data from session variable
	    $role = $this->session->userdata('role');
		$name = $this->session->userdata('name');
		$contact_number  = $this->session->userdata('contact_number');
		$email = $this->session->userdata('email');
		$password  = $this->session->userdata('password');
		$city = $this->session->userdata('city');
		$state  =	$this->session->userdata('state');
		$unique_id = $this->session->userdata('unique_id');
		$address = $this->session->userdata('address');
		$school_name = $this->session->userdata('school_name');
		$father_name = $this->session->userdata('father_name');
		$enroll_no = $this->session->userdata('enroll_no');
		$class1 = $this->session->userdata('class1');
		$fee_salary = $this->session->userdata('fee_salary');
		$paid_fee = $this->session->userdata('paid_fee');
		$profile_img_path = $this->session->userdata('profile_img_path');
		$sign_img_path = $this->session->userdata('sign_img_path');
		$parent_sign_img = $this->session->userdata('parent_sign_img');
		$mother_name = $this->session->userdata('mother_name');
		$dob = $this->session->userdata('dob');
		$gender = $this->session->userdata('gender');
		$aadhar_no = $this->session->userdata('aadhar_no');
		$admission_date = $this->session->userdata('admission_date');
		$section = $this->session->userdata('section');
		$father_occupation = $this->session->userdata('father_occupation');
		$mother_occupation = $this->session->userdata('mother_occupation');
		$father_mob_no = $this->session->userdata('father_mob_no');
		$pincode = $this->session->userdata('pincode');
		
		//validate form values
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('enroll_no','Enrollment Number','trim');
		$this->form_validation->set_rules('father_name','Name','trim');		
		$this->form_validation->set_rules('class1','Class','trim|integer');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('city','City','trim|required|alpha');
		$this->form_validation->set_rules('state','State','trim|required');
		$this->form_validation->set_rules('contact_number','Contact Number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('dob','Date of birth','trim');
		$this->form_validation->set_rules('aadhar_no','Aadhar number','trim|integer|exact_length[12]');
		$this->form_validation->set_rules('gender','Gender','trim|alpha');
		$this->form_validation->set_rules('mother_name','Name' ,'trim');
		$this->form_validation->set_rules('father_occupation','Occupation','trim');
		$this->form_validation->set_rules('mother_occupation','Occupation','trim');
		$this->form_validation->set_rules('father_mob_no','Mobile Number','trim');
		$this->form_validation->set_rules('admission_date','Admission date','trim');
		$this->form_validation->set_rules('section','Section','trim|alpha');
		$this->form_validation->set_rules('fee_salary','Fee','trim|integer');
		$this->form_validation->set_rules('paid_fee','Fee','trim|integer');
		$this->form_validation->set_rules('pincode','Pincode','trim|integer|exact_length[6]|required');
		
		//set error messages
		$this->form_validation->set_error_delimiters('<span class="err"><small>','</small></span>');

		//check input is valid or not
		if( $this->form_validation->run() == TRUE){
		    
		    //if validation is successful
		    
		    //take input values through post method
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
		                    ->where('unique_id !=',$unique_id)
						    ->get('userinfo');
						    
						    
			if( $q->num_rows()>0 ){
			    //return to register page
			    $this->session->set_flashdata('update_query','Mobile number already registered');
				
				if($role == 1)
			    	return redirect('Superadmin');
    			else if($role == 2)
	    			return redirect('Admin');
		    	else if($role == 3)
			    	return redirect('Dm');
			    else if($role == 4)
				    return redirect('Subdm');
			    else if($role == 5)
				    return redirect('School');
    			else if($role == 6)
	    			return redirect('Operator');
		    	else if($role == 7)
			    	return redirect('Accountant');
			    else if($role == 8)
				    return redirect('Student');
			}
		    
			//update new data in database
			$this->db->set('name', $name);
            $this->db->set('enroll_no', $enroll_no);
            $this->db->set('father_name', $father_name);
            $this->db->set('school_name', $school_name);
            $this->db->set('class1', $class1);
            $this->db->set('contact_number', $contact_number);
            $this->db->set('email', $email);
            $this->db->set('address', $address);
            $this->db->set('password', $password);
            $this->db->set('city', $city);
            $this->db->set('state', $state);
            $this->db->set('mother_name', $mother_name);
            $this->db->set('dob', $dob);
            $this->db->set('aadhar_no', $aadhar_no);
            $this->db->set('admission_date', $admission_date);
            $this->db->set('gender', $gender);
            $this->db->set('fee_salary', $fee_salary);
            $this->db->set('paid_fee', $paid_fee);
            $this->db->set('section', $section);
            $this->db->set('father_mob_no', $father_mob_no);
            $this->db->set('father_occupation', $father_occupation);
            $this->db->set('mother_occupation', $mother_occupation);
            $this->db->set('enroll_no', $enroll_no);
            $this->db->set('pincode', $pincode);
            $this->db->where('unique_id',$unique_id);
            $this->db->update('userinfo');
            
            //set new data to session
            	$this->session->set_userdata('name',$name);
				$this->session->set_userdata('contact_number',$contact_number);
				$this->session->set_userdata('email',$email);
				$this->session->set_userdata('password',$password);
				$this->session->set_userdata('city',$city);
				$this->session->set_userdata('state',$state);
				$this->session->set_userdata('address',$address);
				$this->session->set_userdata('school_name',$school_name);
				$this->session->set_userdata('father_name',$father_name);
				$this->session->set_userdata('enroll_no',$enroll_no);
				$this->session->set_userdata('class1',$class1);
				$this->session->set_userdata('fee_salary',$fee_salary);
				$this->session->set_userdata('section',$section);
                $this->session->set_userdata('paid_fee',$paid_fee);
                $this->session->set_userdata('mother_name',$mother_name);
				$this->session->set_userdata('dob',$dob);
				$this->session->set_userdata('aadhar_no',$aadhar_no);
				$this->session->set_userdata('admission_date',$admission_date);
				$this->session->set_userdata('gender',$gender);
                $this->session->set_userdata('mother_occupation',$mother_occupation);
                $this->session->set_userdata('father_mob_no',$father_mob_no);
                $this->session->set_userdata('father_occupation',$father_occupation);
                $this->session->set_userdata('pincode',$pincode);
        
			//redirect to success
			$this->session->set_flashdata('update_query','Successfully Updated');
			
		}
			//if validation fails with errors
			if($role == 1)
				return redirect('Superadmin');
			else if($role == 2)
				return redirect('Admin');
			else if($role == 3)
				return redirect('Dm');
			else if($role == 4)
				return redirect('Subdm');
			else if($role == 5)
				return redirect('School');
			else if($role == 6)
				return redirect('Operator');
			else if($role == 7)
				return redirect('Accountant');
			else if($role == 8)
				return redirect('Student');
			
	}
	
	//function to delete profile
	public function deleteFromList($unique_id){
	    
	   /*
	   //delete profile pic of user
	    $this->db->where('unique_id',$unique_id);
			$this->db->select('image_path'); 
			$q = $this->db->get('userinfo')->row()->image_path;
	    unlink($q);
       */
	    
	    
	    $this->db->where('unique_id', $unique_id)
                ->delete('userinfo');
                
        $role = $this->session->userdata('role');
        
        //set flash data
        $this->session->set_flashdata('update_query','Deleted Successfully');
				
		//redirect to corresponding list        
        if($role == 1)
				return redirect('Superadmin/list1');
			else if($role == 2)
				return redirect('Admin/list1');
			else if($role == 3)
				return redirect('Dm/list1');
			else if($role == 4)
				return redirect('Subdm/list1');
			else if($role == 5)
				return redirect('School/list1');
			else if($role == 6)
				return redirect('Operator/list1');
			
			
	}
	
	//function to get other's profile data and display on modify page 
	public function modifyFromList($unique_id1){
	    
	    //take all old values from database from corresponding to that user
        $q = $this->db->where('unique_id',$unique_id1)
                     ->get('userinfo');
        
        //check user in is database or not
	    if( $q->num_rows()>0 ){
				//if user exist save all values to variable
				$role1 = $q->row('role');
				$name1 = $q->row('name');
				$contact_number1  = $q->row('contact_number');
				$email1 = $q->row('email');
				$password1  = $q->row('password');
				$city1 = $q->row('city');
				$state1  =	$q->row('state');
				$address1 = $q->row('address');
				$school_name1 = $q->row('school_name');
				$father_name1 = $q->row('father_name');
				$enroll_no1 = $q->row('enroll_no');
				$class11 = $q->row('class1');
				$fee_salary1 = $q->row('fee_salary');
				$paid_fee1 = $q->row('paid_fee');
				$profile_img_path1 = $q->row('profile_img_path');
				$sign_img_path1 = $q->row('sign_img_path');
				$parent_sign_path1 = $q->row('parent_sign_path');
				$mother_name1 = $q->row('mother_name');
				$dob1 = $q->row('dob');
				$parent_id1 = $q->row('parent_id');
				$gender1 = $q->row('gender');
				$aadhar_no1 = $q->row('aadhar_no');
				$admission_date1 = $q->row('admission_date');
				$section1 = $q->row('section');
				$father_mob_no1 = $q->row('father_mob_no');
				$father_occupation1 = $q->row('father_occupation');
				$mother_occupation1 = $q->row('mother_occupation');
				$pincode1 = $q->row('pincode');
				
				//set all values in session variables 
				$this->session->set_userdata('role1',$role1);
				$this->session->set_userdata('name1',$name1);
				$this->session->set_userdata('contact_number1',$contact_number1);
				$this->session->set_userdata('email1',$email1);
				$this->session->set_userdata('password1',$password1);
				$this->session->set_userdata('city1',$city1);
				$this->session->set_userdata('state1',$state1);
				$this->session->set_userdata('unique_id1',$unique_id1);
				$this->session->set_userdata('address1',$address1);
				$this->session->set_userdata('school_name1',$school_name1);
				$this->session->set_userdata('father_name1',$father_name1);
				$this->session->set_userdata('enroll_no1',$enroll_no1);
				$this->session->set_userdata('class11',$class11);
				$this->session->set_userdata('fee_salary1',$fee_salary1);
				$this->session->set_userdata('section1',$section1);
                $this->session->set_userdata('paid_fee1',$paid_fee1);
                $this->session->set_userdata('profile_img_path1',$profile_img_path1);
                $this->session->set_userdata('mother_name1',$mother_name1);
				$this->session->set_userdata('dob1',$dob1);
				$this->session->set_userdata('parent_id1',$parent_id1);
				$this->session->set_userdata('sign_img_path1',$sign_img_path1);
				$this->session->set_userdata('aadhar_no1',$aadhar_no1);
				$this->session->set_userdata('admission_date1',$admission_date1);
				$this->session->set_userdata('parent_sign_path1',$parent_sign_path1);
				$this->session->set_userdata('gender1',$gender1);
                $this->session->set_userdata('mother_occupation1',$mother_occupation1);
                $this->session->set_userdata('father_mob_no1',$father_mob_no1);
                $this->session->set_userdata('father_occupation1',$father_occupation1);
                $this->session->set_userdata('pincode1',$pincode1);
                //call modify page
                $this->load->view('modify');
	    }	    
	    else{
	        
	        //if user not found redirect to corresponding user list (exception case)
	        $role = $this->session->userdata('role');
	        
	        if($role == 1)
				return redirect('Superadmin/list1');
			else if($role == 2)
				return redirect('Admin/list1');
			else if($role == 3)
				return redirect('Dm/list1');
			else if($role == 4)
				return redirect('Subdm/list1');
			else if($role == 5)
				return redirect('School/list1');
			else if($role == 6)
				return redirect('Operator/list1');
			else if($role == 7)
				return redirect('Accountant/list1');
			
	    }   
	    
	}
	
	//function to update other's profile data from modify page
	public function updateProfile(){
	    
	    //get old data from session
	    $role = $this->session->userdata('role1');
		$name = $this->session->userdata('name1');
		$contact_number  = $this->session->userdata('contact_number1');
		$email = $this->session->userdata('email1');
		$password  = $this->session->userdata('password1');
		$city = $this->session->userdata('city1');
		$state  =	$this->session->userdata('state1');
		$unique_id = $this->session->userdata('unique_id1');
		$address = $this->session->userdata('address1');
		$school_name = $this->session->userdata('school_name1');
		$father_name = $this->session->userdata('father_name1');
		$enroll_no = $this->session->userdata('enroll_no1');
		$class1 = $this->session->userdata('class11');
		$fee_salary = $this->session->userdata('fee_salary1');
		$paid_fee = $this->session->userdata('paid_fee1');
		$profile_img_path = $this->session->userdata('profile_img_path1');
		$sign_img_path = $this->session->userdata('sign_img_path1');
		$parent_sign_img = $this->session->userdata('parent_sign_img1');
		$mother_name = $this->session->userdata('mother_name1');
		$dob = $this->session->userdata('dob1');
		$gender = $this->session->userdata('gender1');
		$aadhar_no = $this->session->userdata('aadhar_no1');
		$admission_date = $this->session->userdata('admission_date1');
		$section = $this->session->userdata('section1');
		$father_occupation = $this->session->userdata('father_occupation1');
		$mother_occupation = $this->session->userdata('mother_occupation1');
		$father_mob_no = $this->session->userdata('father_mob_no1');
		$pincode = $this->session->userdata('pincode1');
		
		//validate new form values
		$this->form_validation->set_rules('name1','Name','trim|required');
		$this->form_validation->set_rules('enroll_no1','Enrollment Number','trim');
		$this->form_validation->set_rules('father_name1','Name','trim');		
		$this->form_validation->set_rules('class11','Class','trim|integer');
		$this->form_validation->set_rules('email1','Email','trim|valid_email');
		$this->form_validation->set_rules('password1','Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('address1','Address','trim|required');
		$this->form_validation->set_rules('city1','City','trim|required|alpha');
		$this->form_validation->set_rules('state1','State','trim|required');
		$this->form_validation->set_rules('contact_number1','Contact Number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('dob1','Date of birth','trim');
		$this->form_validation->set_rules('aadhar_no1','Aadhar number','trim|integer|exact_length[12]');
		$this->form_validation->set_rules('gender1','Gender','trim|alpha');
		$this->form_validation->set_rules('mother_name1','Name' ,'trim');
		$this->form_validation->set_rules('father_occupation1','Occupation','trim');
		$this->form_validation->set_rules('mother_occupation1','Occupation','trim');
		$this->form_validation->set_rules('father_mob_no1','Mobile Number','trim');
		$this->form_validation->set_rules('admission_date1','Admission date','trim');
		$this->form_validation->set_rules('section1','Section','trim|alpha');
		$this->form_validation->set_rules('fee_salary1','Fee','trim|integer');
		$this->form_validation->set_rules('paid_fee1','Fee','trim|integer');
		$this->form_validation->set_rules('pincode1','Pincode','trim|integer|required|exact_length[6]');
		//set error messages
		$this->form_validation->set_error_delimiters('<span class="err"><small>','</small></span>');

		//check input is valid or not
		if( $this->form_validation->run() == TRUE){
			//if validation is successful get input values through post method
			$name = $this->input->post('name1');
			$enroll_no = $this->input->post('enroll_no1');
			$father_name = $this->input->post('father_name1');
			$class1 = $this->input->post('class11');
			$contact_number  = $this->input->post('contact_number1');			
			$email = $this->input->post('email1');
			$address = $this->input->post('address1');
			$password  = $this->input->post('password1');			
			$city = $this->input->post('city1');
			$school_name = $this->input->post('school_name1');
			$state  = $this->input->post('state1');
			$mother_name = $this->input->post('mother_name1');
			$mother_occupation = $this->input->post('mother_occupation1');
			$father_occupation = $this->input->post('father_occupation1');
			$dob = $this->input->post('dob1');
			$aadhar_no = $this->input->post('aadhar_no1');
			$gender = $this->input->post('gender1');
			$father_mob_no = $this->input->post('father_mob_no1');
			$admission_date = $this->input->post('admission_date1');
			$section = $this->input->post('section1');
			$fee_salary = $this->input->post('fee_salary1');
			$paid_fee = $this->input->post('paid_fee1');
			$pincode = $this->input->post('pincode1');
			
		    //check user already registered from Contact NO.
		    $q = $this->db->where('contact_number',$contact_number)
		                    ->where('unique_id !=',$unique_id)
						    ->get('userinfo');
						    
		    //check if registered
			if( $q->num_rows()>0 ){
			    //return to register page if registered
			    $this->session->set_flashdata('register_success','Mobile number already registered');
				
			    $this->load->view('modify');
			}
			else{
			//set new data to database
			$this->db->set('name', $name);
            $this->db->set('enroll_no', $enroll_no);
            $this->db->set('father_name', $father_name);
            $this->db->set('school_name', $school_name);
            $this->db->set('class1', $class1);
            $this->db->set('contact_number', $contact_number);
            $this->db->set('email', $email);
            $this->db->set('address', $address);
            $this->db->set('password', $password);
            $this->db->set('city', $city);
            $this->db->set('state', $state);
            $this->db->set('mother_name', $mother_name);
            $this->db->set('dob', $dob);
            $this->db->set('aadhar_no', $aadhar_no);
            $this->db->set('admission_date', $admission_date);
            $this->db->set('gender', $gender);
            $this->db->set('fee_salary', $fee_salary);
            $this->db->set('paid_fee', $paid_fee);
            $this->db->set('section', $section);
            $this->db->set('father_mob_no', $father_mob_no);
            $this->db->set('father_occupation', $father_occupation);
            $this->db->set('mother_occupation', $mother_occupation);
            $this->db->set('enroll_no', $enroll_no);
            $this->db->set('pincode', $pincode);
            $this->db->where('unique_id',$unique_id);
            $this->db->update('userinfo');
            
			
			$role = $this->session->userdata('role');
			
		    //set flash data
			$this->session->set_flashdata('update_query','Successfully Updated');
			//call the modifyFromList function which will call modify page with updated data 
			return redirect('Editupdate/modifyFromList/'.$unique_id);
			
			}
		}
		else{
			//if validation fails with errors
			$this->load->view('modify');
		}
	}
	
	//function to change profile photo from user profile
	public function updateProfilePhoto(){
	    
	    //check if profile photo is uploaded
	    if(!empty($_FILES['profile_img_path']['name'])){
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '100000000000000000000';
            $config['file_name'] = $_FILES['profile_img_path']['name'];
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
                
            $profile_img_path = "";
            if($this->upload->do_upload('profile_img_path')){
                $uploadData = $this->upload->data();
                $profile_img_path = $uploadData['file_name'];
            }
            else{
                $profile_img_path = '';
            }
        }
        else{
            $profile_img_path = $this->input->post('profile_img_path');
        }
        if($profile_img_path == ''){
            $profile_img_path = "";
        }
        
        //set new image path in database
        $unique_id = $this->session->userdata('unique_id');
        $role = $this->session->userdata('role');
        $this->session->set_userdata('profile_img_path',$profile_img_path);

        //set new image path in database
        $this->db->set('profile_img_path', $profile_img_path);
        $this->db->where('unique_id',$unique_id);
        $this->db->update('userinfo');
        
        
        //redirect to corresponding profile    
	    if($role == 1)
			return redirect('Superadmin');
		else if($role == 2)
			return redirect('Admin');
		else if($role == 3)
			return redirect('Dm');
		else if($role == 4)
			return redirect('Subdm');
		else if($role == 5)
			return redirect('School');
		else if($role == 6)
			return redirect('Operator');
		else if($role == 7)
			return redirect('Accountant');
		
	}
}
