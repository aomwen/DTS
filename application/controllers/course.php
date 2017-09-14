<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		$this->load->model('course_model','Course');
	}
	
	public function index(){	
		$data['title'] = "Students: View Courses List";
		
		$students = array();
		
		$condition = null;
		
		$rs = $this->Course->read($condition);

		foreach($rs as $r){
			$info = array(
						'course_code' => $r['course_code'],
						'course_desc' => $r['course_desc'],			
						);
			$students[] = $info;
		}
		
		$data['courses'] = $students;
		
		$this->load->view('include/header',$data);
		$this->load->view('students/view_courses',$data);
		$this->load->view('include/footer');
	}

	public function add_course(){
		
		$data = array();
		
		if( $_SERVER['REQUEST_METHOD']=='POST'){ 
			//form was submitted
			// Array ( [idno] => [lname] => [fname] => [mname] => [course] => BSIT ) 
			
			$validate = array (
				array('field'=>'course_code','label'=>'Course code','rules'=>'trim|required|min_length[2]'),
				array('field'=>'course_desc','label'=>'Course description','rules'=>'trim|required|min_length[2]'),
			);

			$this->form_validation->set_rules($validate);
			
			if ($this->form_validation->run()===FALSE){
			
				$data['errors'] = validation_errors();
				
			}else{
				// check for duplicate
				
				// save the record
				$record = array(
								'course_code'=>$_POST['course_code'],
								'course_desc'=>$_POST['course_desc'],
							);
				
				$last_id = $this->Course->create($record);
				
				$data['saved']=TRUE;				
			}
			
		}
		
		$header_data['title'] = "Courses: New Course";		

		
		$this->load->view('include/header',$header_data);		
		$this->load->view('students/new_course',$data);
		$this->load->view('include/footer');
				
	}
	
	public function read_course(){
	}

	public function update_course(){
	
	}
	
	
	public function delete_course(){
	
	}
	

}
