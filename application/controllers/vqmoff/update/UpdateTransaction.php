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
class UpdateTransaction extends REST_Controller {

    function __construct($config = 'rest') {
      parent::__construct($config);
      $this->load->model('query_builder');
    }

	  public function index_post() {
      $table = 'transaction';
      $where = array('transaction_code' => $this->input->post('transaction_code',TRUE));
      $set   = array(
        'transaction_type'    => $this->input->post('transaction_type',TRUE),
        'transaction_status'  => $this->input->post('transaction_status',TRUE),
        'created_date'        => $this->input->post('created_date',TRUE),
        'created_by'          => $this->input->post('created_by',TRUE),
      );
      $this->query_builder->update_data($table,$set,$where);
  	}
}
