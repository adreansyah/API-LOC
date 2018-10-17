<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Query_builder_login extends CI_Model
{

  public function __construct()
	{
		parent::__construct();
		$this->db_adn 	 = $this->load->database('default_admin_dental', TRUE);
	}

	public function QueryLogin($table,$where)
	{
		$sql = $this->db_adn->get_where($table,$where);
		return $sql->num_rows();
	}
}
