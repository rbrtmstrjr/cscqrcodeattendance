<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_info extends CI_Controller {

	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['title'] = "System Information";
		$data["fetch_data"] = $this->Admin_model->system_info();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/system_info', $data);
		$this->load->view('templates/footer');
	}

}