<?php

class Accountant extends MY_Controller{
	
	//function to load accountant profile
	public function index(){
	    
		$this->load->view('accountant_profile');
	}

    //function to display list of students
	public function list1(){
        $school_name = $this->session->userdata('school_name');
		    
		$q = $this->db
						->from('userinfo')
						->where('role', 8)
						->where('school_name',$school_name)
						->get();

		//print_r($q);

		$result = $q->result();

		$this->load->view('list_accountant',['dblist'=>$result]);
	}
	
	//function to check user is accountant or not
	public function __construct(){
	    
	    parent::__construct();
		if( $this->session->userdata('role') != 7){
		        return redirect('logincontroller');
		}
	}
}
