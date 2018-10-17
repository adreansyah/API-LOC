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
class InsertPurchaseReceive extends REST_Controller {

    function __construct($config = 'rest') {
      parent::__construct($config);
      $this->load->model('query_builder');
    }

	  public function index_post() {
      $table = 'purchase_receive';
      $data  = array(
        'purchase_receive_date'  => $this->input->post('purchase_receive_date',TRUE),
        'purchase_detail_id'     => $this->input->post('purchase_detail_id',TRUE),
        'quantity_receive'       => $this->input->post('quantity_receive',TRUE),
        'created_date'           => $this->input->post('created_date',TRUE),
        'created_by'             => $this->input->post('created_by',TRUE)
      );
      $this->query_builder->insert_data($table,$data);
  	}
}
