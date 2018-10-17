<?php defined('BASEPATH') OR exit('No direct script access allowed');
	$data = $this->session->userdata('status');	
	// $keep = $this->session->set_flashdata('key',$data);
	// $var = $this->session->keep_flashdata($keep);
	echo json_encode($this->session->userdata());
?>