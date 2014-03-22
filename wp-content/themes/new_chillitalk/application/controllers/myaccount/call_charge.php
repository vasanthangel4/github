<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Call_charge extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		
		if($this->session->userdata('call_charge_select') == ''){
			$this->session->unset_userdata('topup_history_year');
			$this->session->unset_userdata('topup_history_month');
			$this->session->unset_userdata('call_history_year');
			$this->session->unset_userdata('call_history_month');
		}
		
		$arr_month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		
		// Top Up
		if($this->session->userdata('topup_history_year')){
			$topup_history_year = $this->session->userdata('topup_history_year');
		}else{
			$topup_history_year = date('Y');
		}
		if($this->session->userdata('topup_history_month')){
			$topup_history_month = $this->session->userdata('topup_history_month');
		}else{
			$topup_history_month = date('n');
		}
		
		$th_dateTo = $num = cal_days_in_month(CAL_GREGORIAN, $topup_history_month, $topup_history_year);
		$uri_topup = 'http://sws.vectone.com/api/CTPTopupHist?accId='.$this->session->userdata('account_id').'&year='.$topup_history_year.'&month='.$topup_history_month.'&dateTo='.$th_dateTo.'&dateFrom=1';
			  			
		$this->rest->format('application/json');
		  
		$top_up = $this->rest->get($uri_topup);
		
		// Generate Topup History Navigation URL
		if(intval($topup_history_month) == 1){
			$th_prev_month = 12;
			$th_prev_year = intval($topup_history_year) - 1;
			$th_next_month = 2;
			$th_next_year = intval($topup_history_year);
		}elseif(intval($topup_history_month) == 12){
			$th_prev_month = 11;
			$th_prev_year = intval($topup_history_year);
			$th_next_month = 1;
			$th_next_year = intval($topup_history_year) + 1;
		}else{
			$th_prev_month = intval($topup_history_month) - 1;
			$th_prev_year = intval($topup_history_year);
			$th_next_month = intval($topup_history_month) + 1;
			$th_next_year = intval($topup_history_year);
		}
		$th_nav_url = '<a href="'.base_url().$this->session->userdata('lang').'/myaccount/call_charge/th/'.$th_prev_year.'_'.$th_prev_month.'">< Previous month</a>';
		$th_nav_url .= '&nbsp;|&nbsp;';
		$th_nav_url .= '<strong>'.$arr_month[intval($topup_history_month)-1].'</strong>';
		$th_nav_url .= '&nbsp;|&nbsp;';
		$th_nav_url .= '<a href="'.base_url().$this->session->userdata('lang').'/myaccount/call_charge/th/'.$th_next_year.'_'.$th_next_month.'">Next month ></a>'; 
		
						
		// Call History
		if($this->session->userdata('call_history_year')){
			$call_history_year = $this->session->userdata('call_history_year');
		}else{
			$call_history_year = date('Y');
		}
		if($this->session->userdata('call_history_month')){
			$call_history_month = $this->session->userdata('call_history_month');
		}else{
			$call_history_month = date('n');
		}
		
		$ch_dateTo = $num = cal_days_in_month(CAL_GREGORIAN, $call_history_month, $call_history_year);
		$uri_call_history = 'http://sws.vectone.com/api/CTPCallHistory?accId='.$this->session->userdata('account_id').'&year='.$call_history_year.'&month='.$call_history_month.'&dateTo='.$ch_dateTo.'&dateFrom=1';
							
		$this->rest->format('application/json');
		  
		$call_history = $this->rest->get($uri_call_history);
				
		// Generate Call History Navigation URL
		if(intval($call_history_month) == 1){
			$ch_prev_month = 12;
			$ch_prev_year = intval($call_history_year) - 1;
			$ch_next_month = 2;
			$ch_next_year = intval($call_history_year);
		}elseif(intval($call_history_month) == 12){
			$ch_prev_month = 11;
			$ch_prev_year = intval($call_history_year);
			$ch_next_month = 1;
			$ch_next_year = intval($call_history_year) + 1;
		}else{
			$ch_prev_month = intval($call_history_month) - 1;
			$ch_prev_year = intval($call_history_year);
			$ch_next_month = intval($call_history_month) + 1;
			$ch_next_year = intval($call_history_year);
		}
		$ch_nav_url = '<a href="'.base_url().$this->session->userdata('lang').'/myaccount/call_charge/ch/'.$ch_prev_year.'_'.$ch_prev_month.'">< Previous month</a>';
		$ch_nav_url .= '&nbsp;|&nbsp;';
		$ch_nav_url .= '<strong>'.$arr_month[intval($call_history_month)-1].'</strong>';
		$ch_nav_url .= '&nbsp;|&nbsp;';
		$ch_nav_url .= '<a href="'.base_url().$this->session->userdata('lang').'/myaccount/call_charge/ch/'.$ch_next_year.'_'.$ch_next_month.'">Next month ></a>'; 
		
		
		// Balance
		
		$uri_balance = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
		  
		$this->rest->format('application/json');
	  
		$result_balance = $this->rest->get($uri_balance);
		
		//print_r($result_balance);
		$data = array('title' => 'Calling & Charge History',
					  'isi'   => 'call_charge/list',
					  'topup' => $top_up,
					  'th_nav_url' => $th_nav_url,
					  'call'  => $call_history,
					  'ch_nav_url' => $ch_nav_url,
					  'balance' => $result_balance
					  );
		
		$this->session->unset_userdata('call_charge_select');
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function ch() {
		if($this->uri->segment(4)){
			$arr_call_history = explode('_', $this->uri->segment(4));
			$call_history_year = $arr_call_history[0];
			$call_history_month = $arr_call_history[1];
		}else{
			$call_history_year = date('Y');
			$call_history_month = date('n');
		}
		$this->session->set_userdata('call_history_year', $call_history_year);
		$this->session->set_userdata('call_history_month', $call_history_month);
		$this->session->set_userdata('call_charge_select', '1');
		
		redirect('myaccount/call_charge');
	}
	
	public function th() {
		if($this->uri->segment(4)){
			$arr_topup_history = explode('_', $this->uri->segment(4));
			$topup_history_year = $arr_topup_history[0];
			$topup_history_month = $arr_topup_history[1];
		}else{
			$topup_history_year = date('Y');
			$topup_history_month = date('n');
		}
		$this->session->set_userdata('topup_history_year', $topup_history_year);
		$this->session->set_userdata('topup_history_month', $topup_history_month);
		$this->session->set_userdata('call_charge_select', '1');
		
		redirect($this->session->userdata('lang').'/myaccount/call_charge');
	}
}