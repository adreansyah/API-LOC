<?php
require APPPATH . '/libraries/REST_Controller.php';
// header('Access-Control-Allow-Origin: http://localhost:3000');
// header('Access-Control-Allow-Origin: http://localhost:8081');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST,GET");
//session_start();
/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class UpdatePurchaseOrder extends REST_Controller {

    function __construct($config = 'rest') {
      parent::__construct($config);
      $this->load->model('query_builder');
    }

	  public function index_post() {    
      $table = 'purchase_order';
      $where = array('purchase_code'=>$this->input->post('purchase_code',TRUE));
      $set   = array(
        'vendor_id'           => $this->input->post('vendor_id',TRUE),
        'purchase_date'       => $this->input->post('purchase_date',TRUE),
        'remark'              => $this->input->post('remark',TRUE),
        'created_date'        => $this->input->post('created_date',TRUE),
        'created_by'          => $this->input->post('created_by',TRUE),
      );
      $this->query_builder->update_data($table,$set,$where);
  	}
}
