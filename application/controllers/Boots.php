<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boots extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		$this->load->model('students_model','Students');
	}
	
	public function index(){	
		// echo "CI and Bootstrap";
		
		$header_data['title'] = "Star na si Van Damme Stallone";
		$data['name'] = "Jayson Cruz";
		$data['years'] = "20";
		
		$condition = array('course'=>'BSIT');
		
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
		
		$this->load->view('include/header',$header_data);
		$this->load->view('students/contents', $data);
		$this->load->view('include/footer');
		
	}	
	
	public function add_student(){
		
		$data = array();	
		
		if( $_SERVER['REQUEST_METHOD']=='POST'){ //form was submitted
			//save the new student
			//do some stuff
			// print_r($_POST);
			// Array ( [idno] => 11-111-111 [lname] => Magalpok
			// [fname] => Gorgonia [mname] => Restituto [course] => BSIT 
			// [sex] => F ) 
			
			$validate = array (
				array('field'=>'idno','label'=>'ID No','rules'=>'trim|required|min_length[2]'),
				array('field'=>'lname','label'=>'Last Name','rules'=>'trim|required|min_length[2]'),
				array('field'=>'fname','label'=>'First Name','rules'=>'trim|required|min_length[2]'),
				//array('field'=>'email','label'=>'Email Address','rules'=>'trim|required|is_unique[students.email]|valid_email|min_length[10]'),
			);

			$this->form_validation->set_rules($validate);
			
			if ($this->form_validation->run()===FALSE){
				$data['errors'] = validation_errors();
			}
			else{ //save the form
				
				//check for duplicate
				$record = array(
								'idno'=>$_POST['idno'],
								'lname'=>$_POST['lname'],
								'fname'=>$_POST['fname'],
								'mname'=>$_POST['mname'],
								'course'=>$_POST['course'],
								'sex'=>$_POST['sex'],
							);
							
				$insert_id = $this->Students->create($record);
				
				$data['saved'] = TRUE;
				
			}
			
		}
		else{ //display blank form
				
		}
		
		$header_data['title'] = "Add New Student";

			
		$this->load->view('include/header',$header_data);
		$this->load->view('students/new_student', $data);
		$this->load->view('include/footer');
			
	}

	public function modal(){
		$header_data['title'] = "Add New Student";	
		$this->load->view('include/header',$header_data);	
		$this->load->view('students/modal');
		$this->load->view('include/footer');		
	}
}
