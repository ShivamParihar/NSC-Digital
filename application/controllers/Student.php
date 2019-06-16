<?php

class Student extends MY_Controller{
	
	//function to get school details of student and display student profile
	public function index(){
	    
	    $school_name = $this->session->userdata('school_name');
		$q = $this->db->like('school_name',$school_name)
						->get('userinfo');

			
		if( $q->num_rows()>0 ){
			//login valid
			$contact_number  = $q->row('contact_number');
			$email = $q->row('email');
			$city = $q->row('city');
			$state  =	$q->row('state');
			$address = $q->row('address');
			$profile_img_path = $q->row('profile_img_path');
			
			$this->session->set_userdata('contact_number3',$contact_number);
			$this->session->set_userdata('email3',$email);
			$this->session->set_userdata('city3',$city);
			$this->session->set_userdata('state3',$state);
			$this->session->set_userdata('address3',$address);
			$this->session->set_userdata('profile_img_path3',$profile_img_path);
			
		}
		
		$this->load->view('student_profile');
	}
	
	//function to check user is student or not
	public function __construct(){
	    
	    parent::__construct();
		if( $this->session->userdata('role') != 8){
		        return redirect('logincontroller');
		}
	}
	
	//function to load marksheet page
	public function viewMarksheet(){
		
		$this->load->view('view_marksheet');
	}
	
	
    //function to load Admit card
	public function viewAdmitcard(){
		
		$this->load->view('view_admitcard');
	}
	
}
