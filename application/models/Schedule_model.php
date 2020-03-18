<?php

class Schedule_model extends CI_Model{

	function add_schedule($data)
	{
		$a = $this->input->post('morning_in_penalty');
		$b = $this->input->post('morning_out_penalty');
		$c = $this->input->post('afternoon_in_penalty');
		$d = $this->input->post('afternoon_out_penalty');
		$e = $this->input->post('evening_in_penalty');
		$f = $this->input->post('evening_out_penalty');

		$this->db->query('INSERT INTO students_attendance (student_id, attendance_date) SELECT school_id,now() FROM students_data');
		$this->db->query('INSERT INTO payment (payment_id, payment_date) SELECT school_id,now() FROM students_data');
		$this->db->query('UPDATE payment SET morning_in_fines = '.$a.', morning_out_fines = '.$b.', afternoon_in_fines = '.$c.', afternoon_out_fines = '.$d.', evening_in_fines = '.$e.', evening_out_fines = '.$f.' WHERE payment_date = DATE(now())');

		$what = array(
			'system_date' => date('Y-m-d H:i:s'),
			'admin' => $this->session->userdata('username'),
			'action' => "created new events entitled"." <b>".$this->input->post('events_name')."</b>"
		);
		$this->db->insert('system_log', $what);

		$query = $this->db->insert("csc_events", $data);
		return $query;
	}

	function get_events()
	{
		$this->db->from('csc_events');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}