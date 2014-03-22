<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Access_number extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
		$this->lang->load('myaccount/access_number');
		
		$uri = 'http://sws.vectone.com/api/CTPAccessNo?siteCode='.$this->session->userdata('site_code_web');
		  
		//$params = array('accId' => $this->session->userdata('account_id'));
		$this->rest->format('application/json');
	  
		$result = $this->rest->get($uri);
		
		$this->lang->load('myaccount/access_number');
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'access_number/list',
					  'result' => $result
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
		
	}
	
	
}