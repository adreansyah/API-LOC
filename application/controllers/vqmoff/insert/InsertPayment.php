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
class InsertPayment extends REST_Controller {

    function __construct($config = 'rest') {
      parent::__construct($config);
      $this->load->model('query_builder');
    }

	  public function index_post() {
      $table = 'payment';
      $data  = array(
        'refrence'       => $this->input->post('refrence',TRUE),
        'payment_method' => $this->input->post('payment_method',TRUE),
        'payment_remark' => $this->input->post('payment_remark',TRUE),
        'created_date'   => $this->input->post('created_date',TRUE),
        'created_by'     => $this->input->post('created_by',TRUE)
      );
      $this->query_builder->insert_data($table,$data);
  	}
}
