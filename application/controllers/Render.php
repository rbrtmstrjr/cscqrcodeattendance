<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Render extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Ciqrcode');
	}

	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['title'] = "Registered Students Information";
		$data["fetch_data"] = $this->Students_model->fetch_data();
		$data["get_data"] = $this->Students_model->get_program();
		$data["get_major"] = $this->Students_model->get_major();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/render', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['fetch_data'] = $this->Students_model->fetch_data($slug);
		if(empty($data['fetch_data']))
		{
			show_404();
		}
		$data['title'] = $data['fetch_data']['first_name'];
		$this->load->view('templates/header', $data);
		$this->load->view('pages/student_profile', $data);
		$this->load->view('templates/footer');
	}

	public function viewdata($id)
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
        $data['title'] = $id;
		$data['hey'] = $this->Attendance_model->get_student($id);
		$data['fetch_data'] = $this->Attendance_model->get_data($id);
		$this->load->view('templates/header', $data);
		$this->load->view('pages/student_fines', $data);
		$this->load->view('templates/footer');

		$meow  = $this->Attendance_model->get_fines($id);
		foreach ($meow->result() as $value) {

            if($value->morning_in_time > $value->morning_in && $value->morning_in_time < $value->morning_in_stop) 
            {
                $this->db->query('UPDATE payment SET morning_in_fines = 0 WHERE payment_id = '.$id.' AND payment_date = DATE(now())');
            }
            if ($value->morning_out_time > $value->morning_out && $value->morning_out_time < $value->morning_out_stop) 
            {
            	$this->db->query('UPDATE payment SET morning_out_fines = 0 WHERE payment_id = '.$id.' AND payment_date = DATE(now())');
            }
            if ($value->afternoon_in_time > $value->afternoon_in && $value->afternoon_in_time < $value->afternoon_in_stop) 
            {
            	$this->db->query('UPDATE payment SET afternoon_in_fines = 0 WHERE payment_id = '.$id.' AND payment_date = DATE(now())');
            }
            if ($value->afternoon_out_time > $value->afternoon_out && $value->afternoon_out_time < $value->afternoon_out_stop) 
            {
            	$this->db->query('UPDATE payment SET afternoon_out_fines = 0 WHERE payment_id = '.$id.' AND payment_date = DATE(now())');
            }
            if ($value->evening_in_time > $value->evening_in && $value->evening_in_time < $value->evening_in_stop) 
            {
            	$this->db->query('UPDATE payment SET evening_in_fines = 0 WHERE payment_id = '.$id.' AND payment_date = DATE(now())');
            }
            if ($value->evening_out_time > $value->evening_out && $value->evening_out_time < $value->evening_out_stop) 
            {
            	$this->db->query('UPDATE payment SET evening_out_fines = 0 WHERE payment_id = '.$id.' AND payment_date = DATE(now())');
            }
            else{
            	return false;
            }
            
		}
		
	}

	public function view_fines()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$this->Students_model->get_attendance();
	}

	public function Qrcode($name = 'text')
	{
		QRcode::png(
			$name,
			$outfile = false,
			$level = QR_ECLEVEL_M,
			$size = 5,
			$margin = 1
		);
	}
}
