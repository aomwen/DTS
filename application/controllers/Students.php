<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		$this->load->model('students_model','Students');
	}
	
	public function index()
	{	
		$header_data['title'] = "Students: View Student List";
		
		$students = array();
		
		$condition = array('sex'=>'F','course'=>'BSIT');
		
		$rs = $this->Students->read($condition);

		foreach($rs as $r){
			$info = array(
						'idno' => $r['idno'],
						'lastname' => $r['lastname'],
						'firstname' => $r['firstname'],
						'middlename' => $r['middlename'],
						'course' => $r['course'],
						'sex' => $r['sex']					
						);
			$students[] = $info;
		}
		
		$data['students'] = $students;
		
		$this->load->view('include/header',$header_data);
		$this->load->view('students/view_students',$data);
		$this->load->view('include/footer');
	}
	
	public function add_student(){
		
		$data = array();
		
		if( $_SERVER['REQUEST_METHOD']=='POST'){ 
			//form was submitted
			// Array ( [idno] => [lname] => [fname] => [mname] => [course] => BSIT ) 
			
			$validate = array (
				array('field'=>'idno','label'=>'ID No','rules'=>'trim|required|min_length[2]'),
				array('field'=>'lastname','label'=>'Apelyido','rules'=>'trim|required|min_length[2]'),
				array('field'=>'firstname','label'=>'Given Name','rules'=>'trim|required|min_length[2]'),
				//array('field'=>'email','label'=>'Email Address','rules'=>'trim|required|is_unique[students.email]|valid_email|min_length[10]'),
			);

			$this->form_validation->set_rules($validate);
			
			if ($this->form_validation->run()===FALSE){
			
				$data['errors'] = validation_errors();
				
			}else{
				// check for duplicate
				
				// save the record
				$record = array(
								'idno'=>$_POST['idno'],
								'lname'=>$_POST['lastname'],
								'fname'=>$_POST['firstname'],
								'mname'=>$_POST['middlename'],
								'sex'=>$_POST['sex'],
								'course'=>$_POST['course'],
							);
				
				$last_id = $this->Students->create($record);
				
				$data['saved']=TRUE;				
			}
			
		}
		
		$header_data['title'] = "Students: New Student";		

		
		$this->load->view('include/header',$header_data);		
		$this->load->view('students/new_student',$data);
		$this->load->view('include/footer');
				
	}	
	
	public function profile($id){
		// echo "Display student profile with ID=$id";
		
		//call the model
		$student = $this->Students->read(array('idno'=>$id));
		
		if( count($student)>0 ){
			//find the student record
			//load the view
			$header_data['title'] = "Students: View Student Profile";
			$data['student'] = $student;
			
			$this->load->view('include/header',$header_data);		
			$this->load->view('students/profile',$data);
			$this->load->view('include/footer');		
		}		
		else{
			redirect('students','refresh');
		}
	}
}
