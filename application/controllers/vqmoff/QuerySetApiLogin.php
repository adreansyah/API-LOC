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
class QuerySetApiLogin extends REST_Controller {

    function __construct($config = 'rest') {
      parent::__construct($config);
		  $this->load->model('query_builder_login');
    }

	  public function index_post() {
      $table = "db_dental_hr_users";
      $where = array(
        'username'=>$this->input->post('username'),
        'password'=>$this->input->post('password')

      );
      $data = $this->query_builder_login->QueryLogin($table,$where);
      if(!empty($data)){
        print 1;
      }
      else{
        print 0;
      }    
  	}
}
