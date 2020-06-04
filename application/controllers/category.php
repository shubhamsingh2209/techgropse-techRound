<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . 'models\category\category.php';
// require APPPATH . 'libraries\REST_Controller.php';
class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	function getcategory(){
		$this->load->model('Service/GetService');
		$Responsedata=$this->GetService->getCategoryDetails();
		echo json_encode($Responsedata);
	}
}
