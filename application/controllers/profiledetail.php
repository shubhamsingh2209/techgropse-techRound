<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . 'models\category\category.php';
// require APPPATH . 'libraries\REST_Controller.php';
class ProfileDetail extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
	}
	function showDetailpage(){
		$this->load->view('profile');
	}
	function thankyou(){
		$this->load->view('thankyou.php');
	}

	function submit(){

		$error=array();
		$valid=1;
		// var_dump($_POST);exit;
		if(!(isset($_POST['firstname']) && $_POST['firstname']!='')){
			$error['name']='*Name should not be empty';
			$valid=0;	
		}
		if(!(isset($_POST['email']) && $_POST['email']!='')){
			$error['email']='*Email should not be empty';
			$valid=0;	
		}else{
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
 				 $error['email'] = "Invalid email format";
 				 $valid=0;
			}
		}
		if(!(isset($_POST['address']) && $_POST['address']!='')){
			$error['address']='*Address should not be empty';
			$valid=0;	
		}
		if(!(isset($_POST['city']) && $_POST['city']!='')){
			$error['city']='City should not be empty';
			$valid=0;	
		}
		if($_FILES["fileToUpload"]["name"]==""){
			$error['image']='Please select image';
			$valid=0;		
		}else{
			$target_dir = FCPATH."\\assets\\images\\";
			$uploadOk = 1;
		 	$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
			$target_file = $target_dir . time().'.'.$imageFileType;
			$filename=time().'.'.$imageFileType;
			
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if(!$check !== false) {
					$error['image']='Sorry, image is not valid';
					$valid=0;
				}
		    }
		    if ($_FILES["fileToUpload"]["size"] > 1000000) {
				$error['image']='Sorry, image should be less than 1MB';
				$valid=0;	
			}
			// var_dump($imageFileType);exit;
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
				$error['image']="Sorry, only JPG, JPEG, PNG image are allowed.";
				$valid=0;
			}	
		}
		if ($valid == 0) {
			$passArray=array('error'=>$error,
							 'formdata'=>$_POST
							);
			$this->load->view('profile',$passArray);	
		} else {
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			$this->load->model('Service/PostService');

			$dataSubmit=$_POST;
			$dataSubmit['profile_url']=$_SERVER['HTTP_HOST'].'/assets/images/'.$filename;
			$this->PostService->submitDetail($dataSubmit);
			header("Location: /ProfileDetail/thankyou");
			exit;	
		}
	}
}
