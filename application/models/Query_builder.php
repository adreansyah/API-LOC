<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Query_builder extends CI_Model
{
	public function Query_Item()
	{
		$sql = $this->db->query("
			select a.item_code,a.item_name,a.min_stock,b.quantity_stock from item a
			inner join item_stock b on a.item_id = b.item_id
		");
		return $sql->result();
	}

	public function Query_Vendor()
	{
		$sql = $this->db->query("
			SELECT `vendor`.`vendor_code`,
				`vendor`.`vendor_name`,
				`vendor`.`npwp`,
				`vendor`.`address`,
				`vendor`.`email`,
				`vendor`.`phone_number`,
				`vendor`.`mobile_number`,
				`vendor`.`wa_number`
			FROM `vendor`
		");
		return $sql->result();
	}

	public function update_data($table,$set,$where){
		$this->db_apnof->where($where);
    	$this->db->update($table,$set);
    	return true;
	}

	public function update_data_batch($table,$set,$where){
		$this->db->update_batch($table,$set,$where);
		return true;
	}

	public function insert_data($table,$data){
		$this->db->insert($table, $data);
		return true;
	}

	public function insert_data_batch($table,$data){
		$this->db->insert_batch($table, $data);
		return true;
	}

}
