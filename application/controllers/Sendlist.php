<?php

class Sendlist extends MY_Controller{
	
	//default function (never called)
	public function index(){
		
		return redirect('logincontroller');
	}
    
    //function to check user is superadmin or not
	public function __construct(){
	    
	    parent::__construct();
		if( $this->session->userdata('role') == 8){
		        return redirect('logincontroller/logout');
		}
	}
    //function to provide list (called from super-admin, admin , dm and subdm)
	public function getList(){
    
        $userrole = $this->input->post('userrole');
		$city = $this->input->post('city');
		$state = $this->input->post('state');
		
	    $role = $this->session->userdata('role');
		
	    if( $role == 1){
		    $q = $this->db
						->from('userinfo')
						->where('role !=', 1)
						->like('role', $userrole)
						->like('city', $city)
						->like('state', $state)
						->get();
		
		    $result = $q->result();
		    $this->load->view('list_superadmin',['dblist'=>$result]);
	    }
	    else if($role == 2){
	        $q = $this->db
						->from('userinfo')
						->where('role', 3)
						->like('city', $city)
						->like('state', $state)
						->get();
		
		    $result = $q->result();
		    $this->load->view('list_admin',['dblist'=>$result]);
	    }
	    else if($role == 3){
		    $q = $this->db
						->from('userinfo')
						->where('role', 4)
						->like('city', $city)
						->like('state', $state)
						->get();
		
		    $result = $q->result();
            $this->load->view('list_dm',['dblist'=>$result]);
        }
        else if($role == 4){
		    $q = $this->db
						->from('userinfo')
						->where('role', 5)
						->like('city', $city)
						->like('state', $state)
						->get();
		
		    $result = $q->result();
		    $this->load->view('list_subdm',['dblist'=>$result]);
		}
	}
	
	//function to get list of opeartor, accountant of particular school(called from school)
	public function getList1(){
    
        $userrole = $this->input->post('userrole');
		$school_name = $this->session->userdata('school_name');
		
		//if dropdown contain ALL user (both operator and accountant)
		if($userrole==1){
		    $q = $this->db
						->from('userinfo')
						->where('role', 6)
						->where('school_name',$school_name)
						->or_where('role', 7)
						->where('school_name',$school_name)
						->get();
		}
		//if dropdown contain particular user(operator or accountant)
	    else{
	    	$q = $this->db
						->from('userinfo')
						->where('school_name',$school_name)
						->where('role', $userrole)
						->get();
	    }			
		
		$result = $q->result();
		$this->load->view('list_school',['dblist'=>$result]);
	}
	
	//called by operator or accountant for specific class and section
	public function getListClass(){
    
        $class1 = $this->input->post('class1');
        $section = $this->input->post('section');
		
		$school_name = $this->session->userdata('school_name');
		
	    $q = $this->db
						->from('userinfo')
						->where('role', 8)
						->where('school_name',$school_name)
						->like('class1', $class1)
						->like('section', $section)
						->get();
		
		$result = $q->result();
		$role = $this->session->userdata('role');
		
	    if( $role == 6){
		    $this->load->view('list_operator',['dblist'=>$result]);
	    }
	    else if($role == 7){
	        $this->load->view('list_accountant',['dblist'=>$result]);
	    }
	}
	
	//called from take_attendence for specific class and section
	public function getListTakeAttendence(){
	    
	    $class1 = $this->input->post('class1');
        $section = $this->input->post('section');
		
		$school_name = $this->session->userdata('school_name');
		
	    $q = $this->db
						->from('userinfo')
						->where('role', 8)
						->where('school_name',$school_name)
						->like('class1', $class1)
						->like('section', $section)
						->get();
		
		$result = $q->result();
		
	    $this->load->view('take_attendence',['dblist'=>$result]);
	    
	}
	
	//called from view_attendence for specific class and section
	public function getListViewAttendence(){
	    
	    $class1 = $this->input->post('class1');
        $section = $this->input->post('section');
        $date1 = $this->input->post('date1');
        
        
		$school_name = $this->session->userdata('school_name');
		
	    $q = $this->db->select('*')
	                ->from('attendence_record')
		            ->join('userinfo','userinfo.unique_id = attendence_record.student_id','innner')
		            ->where('role', 8)
		            ->like('class1', $class1)
		            ->like('section', $section)
		            ->like('date',$date1)
		            ->get();
						
	    $result = $q->result();
	    /*echo '<pre>';
		print_r($result);
		exit;*/
	    $this->load->view('view_attendence',['dblist'=>$result]);
	    
	}
}
