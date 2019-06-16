<?php

class Logincontroller extends CI_Controller{
    
    //function to display the login page
	public function index(){
	    
	    $this->load->view('page_login');
	}
	
	//function to validate the login
	public function admin_login(){
		
		//validation test
		$this->form_validation->set_rules('contact_no','Mobile number','trim|required|integer|exact_length[10]');
		$this->form_validation->set_rules('password','Password','trim|required');
		
		//set validation error 
		$this->form_validation->set_error_delimiters('<span class="err"><small>','</small></span>');
		
		if( $this->form_validation->run() == TRUE){
			//if input is valid
			
			//take input in variables
			$contact_no = $this->input->post('contact_no');
			$password  = $this->input->post('password');
			
			//check input variables in database table
			$q = $this->db->where(['contact_number'=>$contact_no,'password'=>$password])
						->get('userinfo');

			//if user is valid
			if( $q->num_rows()>0 ){
				//take all attributes from database
				$unique_id = $q->row('unique_id');
				$role = $q->row('role');
				$name = $q->row('name');
				$contact_number  = $q->row('contact_number');
				$email = $q->row('email');
				$password  = $q->row('password');
				$city = $q->row('city');
				$state  =	$q->row('state');
				$address = $q->row('address');
				$school_name = $q->row('school_name');
				$father_name = $q->row('father_name');
				$enroll_no = $q->row('enroll_no');
				$class1 = $q->row('class1');
				$fee_salary = $q->row('fee_salary');
				$paid_fee = $q->row('paid_fee');
				$profile_img_path = $q->row('profile_img_path');
				$sign_img_path = $q->row('sign_img_path');
				$parent_sign_path = $q->row('parent_sign_path');
				$mother_name = $q->row('mother_name');
				$dob = $q->row('dob');
				$parent_id = $q->row('parent_id');
				$gender = $q->row('gender');
				$aadhar_no = $q->row('aadhar_no');
				$admission_date = $q->row('admission_date');
				$section = $q->row('section');
				$father_mob_no = $q->row('father_mob_no');
				$father_occupation = $q->row('father_occupation');
				$mother_occupation = $q->row('mother_occupation');
				$pincode = $q->row('pincode');
				
                //set all attributes in session  variable
				$this->session->set_userdata('role',$role);
				$this->session->set_userdata('name',$name);
				$this->session->set_userdata('contact_number',$contact_number);
				$this->session->set_userdata('email',$email);
				$this->session->set_userdata('password',$password);
				$this->session->set_userdata('city',$city);
				$this->session->set_userdata('state',$state);
				$this->session->set_userdata('unique_id',$unique_id);
				$this->session->set_userdata('address',$address);
				$this->session->set_userdata('school_name',$school_name);
				$this->session->set_userdata('father_name',$father_name);
				$this->session->set_userdata('enroll_no',$enroll_no);
				$this->session->set_userdata('class1',$class1);
				$this->session->set_userdata('fee_salary',$fee_salary);
				$this->session->set_userdata('section',$section);
                $this->session->set_userdata('paid_fee',$paid_fee);
                $this->session->set_userdata('profile_img_path',$profile_img_path);
                $this->session->set_userdata('mother_name',$mother_name);
				$this->session->set_userdata('dob',$dob);
				$this->session->set_userdata('parent_id',$parent_id);
				$this->session->set_userdata('sign_img_path',$sign_img_path);
				$this->session->set_userdata('aadhar_no',$aadhar_no);
				$this->session->set_userdata('admission_date',$admission_date);
				$this->session->set_userdata('parent_sign_path',$parent_sign_path);
				$this->session->set_userdata('gender',$gender);
                $this->session->set_userdata('mother_occupation',$mother_occupation);
                $this->session->set_userdata('father_mob_no',$father_mob_no);
                $this->session->set_userdata('father_occupation',$father_occupation);
                $this->session->set_userdata('pincode',$pincode);
                
                //redirect to corresponding user profile
				if($role == 1)
					return redirect('Superadmin');
				elseif ($role == 2) 
					return redirect('Admin');					
				elseif ($role == 3) 
					return redirect('Dm');					
				elseif ($role == 4) 
					return redirect('Subdm');					
				elseif ($role == 5) 
					return redirect('School');					
				elseif ($role == 6) 
					return redirect('Operator');					
				elseif ($role == 7) 
					return redirect('Accountant');					
				elseif ($role == 8) 
					return redirect('Student');		
				else		
					return redirect('Logincontroller');
			}
			else{
				//login details invalid
				$this->session->set_flashdata('login_failed','Invalid Mobile No./Password');
				return redirect('Logincontroller');
			}
		}
		else{
			//if validation fails
			$this->load->view('page_login');
			
		}
	}
	
	//function to logout from profile
	public function logout(){
	    $this->session->unset_userdata('unique_id');
	    $this->session->unset_userdata('role');
	    return redirect('Logincontroller');
	}
	
	
	
}