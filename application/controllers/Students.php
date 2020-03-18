<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['title'] = "Dashboard";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/dashboard');
		$this->load->view('templates/footer');
	}

	public function register()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$config['upload_path']      = './assets/skin/images';
        $config['allowed_types']    = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_images.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }
        $this->Students_model->register_student($post_image);
		$this->session->set_flashdata('add_students', 'New students succesfully added');
        redirect('Render/index');
		
	}

	public function login()
	{
		$this->load->view('pages/login');
	}

	public function add_program()
	{
		$this->Students_model->add_program();
		$this->session->set_flashdata('add_course', 'New programme succesfully added');
		redirect(base_url().'render');
	}

	public function add_major()
	{
		$this->Students_model->add_major();
		$this->session->set_flashdata('add_major', 'New major succesfully added');
		redirect(base_url().'render');
	}

	public function students_payment()
	{
		$id = $this->input->post('id_num');
		$hey = $this->db->query('SELECT * FROM students_data WHERE school_id ='.$id.'');
		foreach ($hey->result() as $row) {
			$total = $row->initial_payment;
			$deduction = $row->deduction;
		}
		$a = $this->input->post('amount');
		$b = $this->input->post('deduction');
		$c = $a+$b;
		$aw = $total+$a;
		$ded = $deduction+$b;
		$d = $this->input->post('total');
		$data = array(
			'initial_payment' => $aw,
			'deduction' => $ded
		);
		if($d == $c)
		{
			$this->db->query('UPDATE students_data SET status = 1 WHERE school_id ='.$id.'');
		}

		$this->db->where('school_id', $id);
		$this->db->update('students_data', $data);
		redirect(base_url().'render/viewdata/'.$id);
	}
}
