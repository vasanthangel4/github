<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Login_member extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		
		
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		  $this->lang->load('login_member');
		
		if($this->form_validation->run()) {
			$login    = $this->input->post('username');
		  	$password = $this->input->post('password');
		  	$uri = 'http://sws.vectone.com/api/CTPLogin';
		  
		  	$params = array('login' => $login, 'password' => $password);
		  	$this->rest->format('application/json');
		  
		 	$result = $this->rest->post($uri, $params);
		  
			
		  	if($result->ErrCode == '0') {
							 
			   $this->session->set_userdata('username', $login); 
			   $this->session->set_userdata('password', $password);
			   $this->session->set_userdata('title', $result->Title);
			   $this->session->set_userdata('balance', $result->Balance);
			   $this->session->set_userdata('cust_id', $result->CustId);
			   $this->session->set_userdata('mobile_phone', $result->MobilePhone);
			   $this->session->set_userdata('account_id', $result->AccId);
			   $this->session->set_userdata('sec_id', $result->SecId);
			   $this->session->set_userdata('id_login', uniqid(rand()));
			   
			   $uri_pd = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
			  
			   $this->rest->format('application/json');
			  
			   $result_pd = $this->rest->get($uri_pd);
			
			   if($result_pd->FirstName == '-' || $result_pd->Surname == '-' || is_numeric($result_pd->Email)) {
				   
				   $this->session->set_userdata('complete_registrtion','complete');
				   redirect(base_url().$this->session->userdata('lang').'/login_member/complete_registration');
			   }else{
				   redirect(base_url().$this->session->userdata('lang').'/myaccount/dashboard');
			   }
				   
			   
			  
			   if($this->session->userdata('bundles') != '') {
						redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/buy');
			   }else{
						redirect(base_url().$this->session->userdata('lang').'/myaccount/dashboard'); 
			   }
				   
			   if($this->session->userdata('logout_success') != '') {
				   $this->session->unset_userdata('logout_success');
			   }
		  
		  	}else{
				
			   if($this->session->userdata('logout_success') != '') {
				   $this->session->unset_userdata('logout_success');
			   }
			 
			  $this->session->set_userdata('login_failed','Sorry, Please enter username and password correctly');	
			  redirect(base_url().$this->session->userdata('lang').'/login_member');		  
		  	}
		}
		
		$data = array('title' => 'Login Member', 'content' => 'login/login');
		$this->load->view('template/wrapper', $data);
		$this->session->unset_userdata('login_failed');
		$this->session->unset_userdata('logout_success');
		if($this->session->userdata('bundles') != '') {
			$this->session->unset_userdata('bundles');
		}
	}
	
	public function complete_registration() {
		
		if($this->session->userdata('complete_registrtion') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member/');
		}
		//echo $this->session->userdata('device');
		$valid = $this->form_validation;
		
		$valid->set_rules('first_name','First Name','required');
		$valid->set_rules('last_name','Last Name','required');
		$valid->set_rules('email_address','Email address','required|valid_emails');
		
		if($valid->run()) {
			
			
			$url_reg = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
			
			$first = $this->input->post('first_name');
			$last  = $this->input->post('last_name');
			$email_address = $this->input->post('email_address');
			
			$params_reg = array("Title" => "null",
								"FirstName" => $first,
								"Surname" => $last,
								"Email" => $email_address,
								"Addr1" => "null",
								"Addr2" => "null",
								"City" => "null",
								"PostCode" => "null",
								"Country" => $this->session->userdata('country_name_web')
							   );
							
		  	$this->rest->format('application/json');
		  
		 	$result_reg = $this->rest->post($url_reg, $params_reg);
			
			//print_r($result_reg);
			if($result_reg->ErrCode == '0') {
				$this->session->set_userdata('complete_registration','success');
				
				redirect(base_url().$this->session->userdata('lang').'/myaccount/dashboard');
			}else{
				
				$this->session->set_flashdata('failed_reg', $result_reg->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/login_member/complete_registration');
			}
		}
		$data = array('title' => 'Sign Up',
					  'content'   => 'login/complete_registration'
					  );
		$this->load->view('template/wrapper', $data);
	}

}