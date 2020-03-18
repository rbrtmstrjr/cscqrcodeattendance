<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_admin extends CI_Controller {

	public function index()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['title'] = "System Admin";
		$data["fetch_data"] = $this->Admin_model->fetch_data();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/system_admin', $data);
		$this->load->view('templates/footer');
	}

	public function add_admin()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$password = md5($this->input->post('password'));
		$this->Admin_model->add_admin($password);
		$this->session->set_flashdata('add_admin', 'New admin succesfully added');
		redirect('System_admin/index');
	}

	public function edit_admin()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$edit_admin = $this->input->post('edit_admin');
		$password = $this->input->post('password');
		$this->Admin_model->edit_admin($edit_admin, $password);
		$this->session->set_flashdata('edit_admin', 'Admin succesfully edited');
		redirect('System_admin/index');
	}

	public function delete_admin($id)
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$this->Admin_model->delete_admin($id);
		$this->session->set_flashdata('delete_admin', 'Admin successfully deleted');
		redirect('System_admin/index');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		if($this->Admin_model->get_login($username, $password))
		{
			$session_data = array(
				'username' => $username,
				'logged_in' => TRUE
			);
			$this->session->set_flashdata('success', 'Welcome back '.$username.'!');
			$this->session->set_userdata($session_data);
			redirect(base_url());
		}
		else
		{
			$this->session->set_flashdata('error', 'Invalid Username and Password');
			redirect(base_url().'students/login');
		}

	}
	public function logout()
	{
		$this->session->unset_userdata(array('username', 'logged_in'));
		redirect(base_url().'students/login');
	}

	public function reset_settings()
	{
		if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'students/login');
        }
		$data['title'] = "Reset System Settings";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/system_settings');
		$this->load->view('templates/footer');
	}

	public  function update_password()
	{
		$old = md5($this->input->post('OldPassword'));
		$this->db->where('username', $this->session->userdata('username'));
		$password = $this->db->get('main_admin');
		foreach ($password->result() as $row) {
			$oldpass = $row->password;
		}
			$this->form_validation->set_rules('OldPassword', 'Old Password', 'matches['.$oldpass.']');
			$this->form_validation->set_rules('NewPassword', 'New Password', 'min_length[8]');
			$this->form_validation->set_rules('NewPasswordConfirm', 'Password Confirmation', 'min_length[8]|matches[NewPassword]');

			if ($this->form_validation->run() == FALSE)
			{
			    $hey['title'] = "Reset System Settings";
				$this->load->view('templates/header', $hey);
				$this->load->view('pages/system_settings');
				$this->load->view('templates/footer');
			}
			else
			{
			    $this->load->view('formsuccess');
			}
	}

}
