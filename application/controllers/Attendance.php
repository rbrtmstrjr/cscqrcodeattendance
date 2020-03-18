<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['title'] = "Student Attendance";
		$data['fetch_data'] = $this->Attendance_model->get_attendance();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/attendance', $data);
		$this->load->view('templates/footer');
	}

}
