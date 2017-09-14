<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boot extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		$this->load->model('students_model','Students');
	}
	
	public function index(){	
	
		// echo "Bootstrap controller";
		
		$data['title'] = "Bootstrap Intro";
		$data['contents'] = "Display bootstrap contents";

		$students = array();
		
		$condition = array('sex'=>'F','course'=>'BSIT');
		
		$rs = $this->Students->read($condition);

		foreach($rs as $r){
			$info = array(
						'idno' => $r['idno'],
						'lastname' => $r['lname'],
						'firstname' => $r['fname'],
						'middlename' => $r['mname'],
						'course' => $r['course'],
						'sex' => $r['sex']					
						);
			$students[] = $info;
		}
		
		$data['students'] = $students;
		
		$this->load->view('include/header', $data);
		$this->load->view('students/list_students', $data);
		$this->load->view('include/footer');
		
	}
	
}
