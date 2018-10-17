<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: http://localhost:3000');
header("Access-Control-Allow-Methods: POST,GET");
class Welcome extends CI_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->model('query_builder');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index()
	{
			redirect(site_url(array("welcome_message")));			
	}
}
