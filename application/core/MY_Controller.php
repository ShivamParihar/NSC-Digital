<?php

class MY_controller extends CI_Controller{

	public function __construct(){

		parent::__construct();
		if( ! $this->session->userdata('unique_id') )
			return redirect('logincontroller');
	}
}