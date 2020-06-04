<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . 'models\category\category.php';
// require APPPATH . 'libraries\REST_Controller.php';
class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	function getProduct(){
		$this->load->model('Service/GetService');
		$Responsedata['data']=$this->GetService->getProductdetails();
		echo json_encode($Responsedata);
	}
}
