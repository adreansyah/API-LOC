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
class QuerySetApiVendor extends REST_Controller {

    function __construct($config = 'rest') {
      parent::__construct($config);
		  $this->load->model('query_builder');
    }

	  public function index_get() {
        $data = $this->query_builder->Query_Vendor();
        $this->set_response($data, REST_Controller::HTTP_OK);
  	}
}
