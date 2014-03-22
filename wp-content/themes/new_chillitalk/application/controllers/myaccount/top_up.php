<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Top_up extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
	}
	
	public function index() {
	
	
	    $this->lang->load('myaccount/topup');
		
		$data = array('title' => 'Add Credit Card',
					  'isi'   => 'top_up/topup_now'
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function voucher() {
		
		header("HTTP/1.1 200 OK");
		
		
		$valid = $this->form_validation;
		
		$voucher 		  = $this->input->post('code_voucher');
		
		$valid->set_rules('code_voucher','Code Voucher','required');
		
		if($valid->run()) {
			
			$uri_voucher = 'http://sws.vectone.com/api/CTPVoucherTopup';
		
		
			$params_voucher = array('Website' => $this->session->userdata('app_code_web'), 
							'Country' => $this->session->userdata('country_code2_web'),
							'AccountId' => $this->session->userdata('account_id'),
							'Pincode' => $voucher
							);
			$this->rest->format('application/json');
		  
			$result_voucher = $this->rest->post($uri_voucher, $params_voucher);
			
			print_r($result_voucher);
			if($result_voucher->ErrCode == 0) {
				$this->session->set_flashdata('voucher_success','Top up by voucher success');
				$this->session->set_userdata('current_balance',$result_voucher->BalanceAfter);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/voucher/');
			}else{
				$this->session->set_flashdata('voucher_failed',$result_voucher->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/voucher/');
			}
		
		
		}
		
		$data = array('title' => 'Add Credit Card',
					  'isi'   => 'top_up/e-voucher'
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function add_creditcard() {
		
		header("HTTP/1.1 200 OK");
		
		$valid = $this->form_validation;
		
		$valid->set_rules('first_name','First Name', 'required');
		$valid->set_rules('last_name','Last Name', 'required');
		$valid->set_rules('auto_recharge','Auto Recharge', 'required');
		$valid->set_rules('credit_card_number','Credit card number', 'required|numeric|min_length[5]');
		$valid->set_rules('month','Exp Month', 'required|numeric|exact_length[2]');
		$valid->set_rules('cvv','CVV', 'required');
		$valid->set_rules('billing_phone','Billing Phone No', 'required|numeric|min_length[4]');
		$valid->set_rules('country','Country', 'required');
		$valid->set_rules('address','Address', 'required');
		$valid->set_rules('zip','ZIP', 'required');
		
		$amount = $this->input->post('amount');
		$auto_recharge = $this->input->post('auto_recharge');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$credit_card_number = $this->input->post('credit_card_number');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$cvv = $this->input->post('cvv');
		$billing_phone = $this->input->post('billing_phone');
		$country = $this->input->post('country');
		$city = $this->input->post('city');
		$address = $this->input->post('address');
		$zip = $this->input->post('zip');
		$state = $this->input->post('state');
		
		if($valid->run()) {
			
			$uri_card = 'http://sws.vectone.com/api/CTACCTopupStep1';
		  
		  	$params_card = array('siteCode' => $this->session->userdata('site_code_web'), 
							'appCode' => $this->session->userdata('app_code_web'),
							'accountId' => $this->session->userdata('account_id'),
							'ccNo' => $credit_card_number,
							'cvv' => $cvv,
							'expDate' => $year.$month,
							'firstName' => $first_name,
							'lastName' => $last_name,
							'streetName' => $address,
							'city' => $city,
							'postCode' => $zip,
							'country' => $country,
							'email'   => $this->session->userdata('email'),
							'amount'  => $amount,
							'autoTopup' => $auto_recharge,
							'bypass3DS' => false,
							'state' => $state
							);
							
			
		  	$this->rest->format('application/json');
		  
		 	$result_card = $this->rest->post($uri_card, $params_card);
			
			//print_r($result);
			
			if($result_card->errCode == '0' || $result_card->reasonCode == 475) {
			
					
				$this->session->set_userdata('success_credit_card','success');
				$this->session->set_userdata('ccno_card', $credit_card_number);
				$this->session->set_userdata('cvv_card', $cvv);
				$this->session->set_userdata('exp_date_card', $year.$month);
				$this->session->set_userdata('first_card', $first_name);
				$this->session->set_userdata('last_card', $last_name);
				$this->session->set_userdata('street_card', $address);
				$this->session->set_userdata('city_card', $city);
				$this->session->set_userdata('post_code_card', $zip);
				$this->session->set_userdata('country_card', $country);
				$this->session->set_userdata('auto_topup_card', $auto_recharge);
				$this->session->set_userdata('amount_card',$amount);
				$this->session->set_userdata('acs_url_card',$result_card->acsURL);
				$this->session->set_userdata('pareq_card',$result_card->paReq);
				$this->session->set_userdata('ref_code_card',$result_card->merchantRefCode);
				
				//redirect(base_url().'/myaccount/top_up/form3ds/');
				$this->session->set_userdata('success_credit_card','success_credit_card');
				$this->session->set_userdata('prev_bal_card', $this->session->userdata('balance'));
				$this->session->set_userdata('current_balance', $result_process_card->afterBal);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/success');
			}else{
				
				$this->session->set_userdata('failed_credit_card','failed');
				
				$this->session->set_userdata('ref_code_card',$result_card->merchantRefCode);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/failed');
			}
			
		}
		
		$uri_amount = 'http://sws.vectone.com/api/CTPCCTopupAvlCredit?country='.$this->session->userdata('country_code_web');
		$this->rest->format('application/json');
		  
		$amount = $this->rest->get($uri_amount);

	    $this->lang->load('myaccount/add');
		$data = array('title' => 'Add Credit Card',
					  'isi'   => 'top_up/add',
					  'amount' => $amount
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
		
	public function form3ds() {
		$data = array('title' => 'Add Credit Card',
					  'isi'   => 'top_up/form3ds'
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function process_credit_card() {
				
		$uri_process_card = 'http://sws.vectone.com/api/CTACCTopupStep2';

	  	$params_process_card = array("siteCode" => $this->session->userdata('site_code_web'),
							"appCode" => $this->session->userdata('app_code_web'),
							"accountId" => $this->session->userdata('account_id'),
							"merchantRefCode" => $this->session->userdata('ref_code_card'),
							"ccNo" => $this->session->userdata('ccno_card'),
							"cvv" => $this->session->userdata('cvv_card'),
							"expDate" => $this->session->userdata('exp_date_card'),
							"firstName" => $this->session->userdata('first_card'),
							"lastName" => $this->session->userdata('last_card'),
							"streetName" => $this->session->userdata('street_card'),
							"city" => $this->session->userdata('city_card'),
							"postCode" => $this->session->userdata('post_code_card'),
							"country" => $this->session->userdata('country_card'),
							"email" => $this->session->userdata('email'),
							"amount" => $this->session->userdata('amount_card'),
							"autoTopup" => $this->session->userdata('auto_topup_card'),
							"paRes" => $_POST['PaRes']
							);
							
		$this->rest->format('application/json');
	  
		$result_process_card = $this->rest->post($uri_process_card, $params_process_card);
		
		if($result_process_card->errCode == '0') {
			$this->session->set_userdata('success_credit_card','success_credit_card');
			$this->session->set_userdata('prev_bal_card', $this->session->userdata('balance'));
			$this->session->set_userdata('current_balance', $result_process_card->afterBal);
			
			redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/success');
		}else{
			$this->session->set_userdata('failed_credit_card','failed');
			redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/failed');
		}
			
				
		$data = array('title' => 'Add Credit Card',
					  'isi'   => 'top_up/process_credit_card'
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}	
	
	public function success() {
		if($this->session->userdata('success_credit_card') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up');
		}
		
		$data = array('title' => 'Add Credit Card');
		
		$this->load->view('myaccount/top_up/success',$data);
		
		
	}
	
	public function failed() {
		if($this->session->userdata('failed_credit_card') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up');
		}
		
		$data = array('title' => 'Add Credit Card',
					 
					  );
		
		$this->load->view('myaccount/top_up/failed',$data);
		
		
	}
	
	// ---------------------------------------------  For SIGN UP  --------------------------------------
	
	public function add_creditcard_alone() {
		
		header("HTTP/1.1 200 OK");
		
		$valid = $this->form_validation;
		
		$valid->set_rules('first_name','First Name', 'required');
		$valid->set_rules('last_name','Last Name', 'required');
		$valid->set_rules('auto_recharge','Auto Recharge', 'required');
		$valid->set_rules('credit_card_number','Credit card number', 'required|numeric|min_length[5]');
		$valid->set_rules('month','Exp Month', 'required|numeric|exact_length[2]');
		$valid->set_rules('cvv','CVV', 'required');
		$valid->set_rules('billing_phone','Billing Phone No', 'required|numeric|min_length[4]');
		$valid->set_rules('country','Country', 'required');
		$valid->set_rules('address','Address', 'required');
		$valid->set_rules('zip','ZIP', 'required');
		
		$amount = $this->input->post('amount');
		$auto_recharge = $this->input->post('auto_recharge');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$credit_card_number = $this->input->post('credit_card_number');
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$cvv = $this->input->post('cvv');
		$billing_phone = $this->input->post('billing_phone');
		$country = $this->input->post('country');
		$city = $this->input->post('city');
		$address = $this->input->post('address');
		$zip = $this->input->post('zip');
		$state = $this->input->post('state');
		
		if($valid->run()) {
			
			$uri_card1 = 'http://sws.vectone.com/api/CTACCTopupStep1';
		  
		  	$params_card1 = array('siteCode' => $this->session->userdata('site_code_web'), 
							'appCode' => $this->session->userdata('app_code_web'),
							'accountId' => $this->session->userdata('account_id'),
							'ccNo' => $credit_card_number,
							'cvv' => $cvv,
							'expDate' => $year.$month,
							'firstName' => $first_name,
							'lastName' => $last_name,
							'streetName' => $address,
							'city' => $city,
							'postCode' => $zip,
							'country' => $country,
							'email'   => $this->session->userdata('email'),
							'amount'  => $amount,
							'autoTopup' => $auto_recharge,
							'bypass3DS' => false,
							'state' => $state
							);
							
			
		  	$this->rest->format('application/json');
		  
		 	$result_card1 = $this->rest->post($uri_card1, $params_card1);
			
			//print_r($result);
			
			if($result_card1->errCode == '0' || $result_card1->reasonCode == 475) {
			
					
				$this->session->set_userdata('success_credit_card_alone','success');
				$this->session->set_userdata('ccno_card1', $credit_card_number);
				$this->session->set_userdata('cvv_card1', $cvv);
				$this->session->set_userdata('exp_date_card1', $year.$month);
				$this->session->set_userdata('first_card1', $first_name);
				$this->session->set_userdata('last_card1', $last_name);
				$this->session->set_userdata('street_card1', $address);
				$this->session->set_userdata('city_card1', $city);
				$this->session->set_userdata('post_code_card1', $zip);
				$this->session->set_userdata('country_card1', $country);
				$this->session->set_userdata('auto_topup_card1', $auto_recharge);
				$this->session->set_userdata('amount',$amount);
				$this->session->set_userdata('acs_url_card1',$result_card1->acsURL);
				$this->session->set_userdata('pareq_card1',$result_card1->paReq);
				$this->session->set_userdata('ref_code_card1',$result_card1->merchantRefCode);
				
				//redirect(base_url().'/myaccount/top_up/form3ds_alone/');
				$this->session->set_userdata('success_credit_card_alone','success_credit_card');
				$this->session->set_userdata('prev_bal_card1', $this->session->userdata('balance'));
				
				redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/success_alone');
			}else{
				
				$this->session->set_userdata('failed_credit_card_alone','failed');
				
				$this->session->set_userdata('ref_code_card1',$result_card1->merchantRefCode);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/failed_alone');
			}
			
		}
		
		$uri_amount = 'http://sws.vectone.com/api/CTPCCTopupAvlCredit?country='.$this->session->userdata('country_code_web');
		$this->rest->format('application/json');
		  
		$amount = $this->rest->get($uri_amount);

	    $this->lang->load('myaccount/add');
		$data = array('title' => 'Add Credit Card',
					  'amount' => $amount,
					  'isi' => 'top_up/add_credit'
					  );
		
		$this->load->view('myaccount/template/wrapper_full',$data);
	}
	
	public function form3ds_alone() {
		$data = array('title' => 'Add Credit Card',
					  'isi'   => 'top_up/form3ds_alone'
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function process_credit_card_alone() {
				
		$uri_prcocess_card1 = 'http://sws.vectone.com/api/CTACCTopupStep2';

	  	$params_prcocess_card1 = array("siteCode" => $this->session->userdata('site_code_web'),
							"appCode" => $this->session->userdata('app_code_web'),
							"accountId" => $this->session->userdata('account_id'),
							"merchantRefCode" => $this->session->userdata('ref_code_card1'),
							"ccNo" => $this->session->userdata('ccno_card1'),
							"cvv" => $this->session->userdata('cvv_card1'),
							"expDate" => $this->session->userdata('exp_date_card1'),
							"firstName" => $this->session->userdata('first_card1'),
							"lastName" => $this->session->userdata('last_card1'),
							"streetName" => $this->session->userdata('street_card1'),
							"city" => $this->session->userdata('city_card1'),
							"postCode" => $this->session->userdata('post_code_card1'),
							"country" => $this->session->userdata('country_card1'),
							"email" => $this->session->userdata('email'),
							"amount" => $this->session->userdata('amount'),
							"autoTopup" => $this->session->userdata('auto_topup_card1'),
							"paRes" => $_POST['PaRes']
							);
							
		$this->rest->format('application/json');
	  
		$result_prcocess_card1 = $this->rest->post($uri_prcocess_card1, $params_prcocess_card1);
		
		if($result_prcocess_card1->errCode == '0') {
			$this->session->set_userdata('success_credit_card_alone','success_credit_card');
			$this->session->set_userdata('prev_bal_card1', $this->session->userdata('balance'));
			
			redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/success_alone');
		}else{
			$this->session->set_userdata('failed_credit_card_alone','failed');
			redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up/failed_alone');
		}
			
				
		$data = array('title' => 'Add Credit Card',
					  'isi'   => 'top_up/process_credit_card_alone'
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function success_alone() {
		if($this->session->userdata('success_credit_card_alone') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up');
		}
		
		$data = array('title' => 'Add Credit Card');
		
		$this->load->view('myaccount/top_up/success_alone',$data);
		
		
	}
	
	public function failed_alone() {
		if($this->session->userdata('failed_credit_card_alone') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/top_up');
		}
		
		$data = array('title' => 'Add Credit Card',
					 
					  );
		
		$this->load->view('myaccount/top_up/failed_alone',$data);
		
		
	}
	
	
}