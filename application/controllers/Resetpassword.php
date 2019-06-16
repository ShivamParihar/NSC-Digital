<?php

class Resetpassword extends CI_Controller{

	public function index(){
	    $this->load->view('page_forgetpassword');
	}
	
	public function sendSMS(){
	       
	     //validation test
		$this->form_validation->set_rules('contact_no','Mobile number','trim|required|integer|exact_length[10]');
		
		//set validation error 
		$this->form_validation->set_error_delimiters('<span class="err"><small>','</small></span>');
		
		if( $this->form_validation->run() == TRUE){
			//if input is valid
			
			//take input in variables
			$contact_no = $this->input->post('contact_no');
			
			//check input variables in database table
			$q = $this->db->where('contact_number',$contact_no)
						->get('userinfo');

			//if user is valid
			if( $q->num_rows()>0 ){
				
                //generate auto password
			    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $password = substr( str_shuffle( $chars ), 0 , 10 );
				
				//update in database
				$this->db->set('password', $password);
                $this->db->where('contact_number',$contact_no);
                $this->db->update('userinfo');
                
                //send sms with new password
                //Your authentication key
                $authKey = "262419ASDsqppi5c62c19a";
                //Multiple mobiles numbers separated by comma
                $mobileNumber = $contact_no;
                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "NSCDIG";
                //Your message to send, Add URL encoding here.
                $message = urlencode("NSC Digital\nPassword reset successful\n\nMobile No. : ".$contact_no."\nPassword : ".$password);
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
      		    $this->session->set_flashdata('login_failed','SMS send with new password');
            
				
				return redirect('Logincontroller');
			}
			else{
				//login details invalid
				$this->session->set_flashdata('login_failed','Invalid Mobile No.');
				return redirect('Resetpassword');
			}
		}
		else{
			//if validation fails
			return redirect('Resetpassword');
			
		}
	}
	
}
