<?php

class Students_model extends CI_Model
{
	
	function fetch_data($slug = FALSE)
	{
		if($slug === FALSE){
			$query = $this->db->get('students_data');
			return $query->result_array();
		}
		$this->db->where('school_id', $slug);
		$query = $this->db->get('students_data');
		return $query->row_array();
	}

	function get_program()
	{
		$query = $this->db->get('students_courses');
		return $query->result_array();
	}

	function get_major()
	{
		$query = $this->db->get('students_major');
		return $query->result_array();
	}

	function register_student($post_image)
	{
		$config = array(
			'school_id' => $this->input->post('id_num'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'course' => $this->input->post('course'),
			'major' => $this->input->post('major'),
			'year' => $this->input->post('year'),
			'address' => $this->input->post('address'),
			'section' => $this->input->post('section'),
			'students_contact' => $this->input->post('contact'),
			'boarding_house' => $this->input->post('boarding_house'),
			'student_image' => $post_image
			);
		$data = array(
			'system_date' => date('Y-m-d H:i:s'),
			'admin' => $this->session->userdata('username'),
			'action' => "added"." <b>".$this->input->post('first_name')." ".$this->input->post('last_name')."</b>"." as a new Registered Students."
		);
		$this->db->insert('system_log', $data);
		return $this->db->insert('students_data', $config);
	}

	function add_program()
	{
		$data = array(
			'course' => $this->input->post('course')
		);
		$config = array(
			'system_date' => date('Y-m-d H:i:s'),
			'admin' => $this->session->userdata('username'),
			'action' => "added"." <b>".$this->input->post('course')."</b>"." as a new Programme."
		);
		$this->db->insert('system_log', $config);
		$this->db->insert('students_courses', $data);
	}

	function add_major()
	{
		$data = array(
			'major' => $this->input->post('major')
		);
		$config = array(
			'system_date' => date('Y-m-d H:i:s'),
			'admin' => $this->session->userdata('username'),
			'action' => "added"." <b>".$this->input->post('major')."</b>"." as a new Major."
		);
		$this->db->insert('system_log', $config);
		$this->db->insert('students_major', $data);
	}

}