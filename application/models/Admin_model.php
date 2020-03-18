<?php

class Admin_model extends CI_Model
{
	
	function fetch_data()
	{
		$query = $this->db->get("co_admin");
		return $query;
	}

	function add_admin($password)
	{
		$config = array(

			'name' => $this->input->post('name'),
			'position' => $this->input->post('position'),
			'username' => $this->input->post('username'),
			'password' => $password
		);
		$data = array(
			'system_date' => date('Y-m-d H:i:s'),
			'admin' => $this->session->userdata('username'),
			'action' => "added <b>".$this->input->post('username')."</b> as new System Administrator"
		);
		$this->db->insert('system_log', $data);
		$this->db->insert('co_admin', $config);
	}

	function edit_admin($edit_admin, $password)
	{
		$config = array(
			'username' => $this->input->post('username'),
			'password' => md5($password)
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('co_admin', $config);

		$data = array(
			'system_date' => date('Y-m-d H:i:s'),
			'admin' => $this->session->userdata('username'),
			'action' => "edit a System Administrator to"." <b>".$this->input->post('username')."</b>"
		);
		$this->db->insert('system_log', $data);
	}

	function delete_admin($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('co_admin');
		$data = array(
			'system_date' => date('Y-m-d H:i:s'),
			'admin' => $this->session->userdata('username'),
			'action' => "remove ".$id." from System Admin"
		);
		$this->db->insert('system_log', $data);
	}

	function get_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('main_admin');

		if($query->num_rows() == 1)
			{         
			    return true;
			}
			else
			{
			    return false;
			} 
	}

	function system_info()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get("system_log");
		return $query;
	}

}