<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['title'] = "CSC REPORTS AS OF"." ".date('Y-m-d');
		$data["fetch_data"] = $this->Students_model->fetch_data();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/reports', $data);
		$this->load->view('templates/footer');
	}

	

}
