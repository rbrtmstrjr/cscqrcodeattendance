<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {


	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['title'] = "CSC EVENTS AND SCHEDULE";
		$data['fetch_data'] = $this->Schedule_model->get_events();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/schedule', $data);
		$this->load->view('templates/footer');
	}

	public function add_schedule()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		date_default_timezone_set('Asia/Manila');
		$now = date('Y-m-d');
		$data = array(   
			'event_name' => $this->input->post('events_name'),
			'event_date' => $now,
			'morning_in'    => $this->input->post('morning_in'),
			'morning_in_stop' => $this->input->post('morning_in_stop'),
			'morning_out' => $this->input->post('morning_out'),
			'morning_out_stop'    => $this->input->post('morning_out_stop'),
			'afternoon_in' => $this->input->post('afternoon_in'),
			'afternoon_in_stop' => $this->input->post('afternoon_in_stop'),
			'afternoon_out' => $this->input->post('afternoon_out'),
			'afternoon_out_stop' => $this->input->post('afternoon_out_stop'),
			'evening_in' => $this->input->post('evening_in'),
			'evening_in_stop' => $this->input->post('evening_in_stop'),
			'evening_out' => $this->input->post('evening_out'),
			'evening_out_stop' => $this->input->post('evening_out_stop'),
			'morning_in_penalty' => $this->input->post('morning_in_penalty'),
			'morning_out_penalty' => $this->input->post('morning_out_penalty'),
			'afternoon_in_penalty' => $this->input->post('afternoon_in_penalty'),
			'afternoon_out_penalty' => $this->input->post('afternoon_out_penalty'),
			'evening_in_penalty' => $this->input->post('evening_in_penalty'),
			'evening_out_penalty' => $this->input->post('evening_out_penalty')
		);
		$this->Schedule_model->add_schedule($data);
		$this->session->set_flashdata('schedule', 'New events started');
		redirect('schedule/index');
	}

}
