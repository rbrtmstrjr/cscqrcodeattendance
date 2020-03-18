<?php

class Attendance_model extends CI_Model 
{
	
	function get_attendance()
	{
		$this->db->select('*');
		$this->db->from('students_attendance');
		$this->db->join('students_data', 'students_data.school_id = students_attendance.student_id');
		$this->db->join('csc_events', 'csc_events.event_date = students_attendance.attendance_date');
		$this->db->where('morning_in_time OR morning_out_time OR afternoon_in_time OR afternoon_out_time OR evening_in_time OR evening_out_time != ', date("H:i:s", mktime(0, 0, 0)));
		return $query = $this->db->get();
	}

	function get_fines($id)
	{
		$now = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('students_attendance');
		$this->db->join('students_data', 'students_data.school_id = students_attendance.student_id');
		$this->db->join('csc_events', 'csc_events.event_date = students_attendance.attendance_date');
		$this->db->join('payment', 'payment.payment_date = csc_events.event_date');
		$this->db->where('payment_id', $id);
		$this->db->where('payment_date', $now);
		$this->db->where('event_date', $now);
		$this->db->where('school_id', $id);
		$this->db->order_by('event_date', 'DESC');
		return $query = $this->db->get();
	}

	function get_student($id)
	{
		$this->db->where('school_id', $id);
		$query = $this->db->get('students_data');
		return $query->row_array();
	}

	function get_data($id)
	{
		$now = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('students_attendance');
		$this->db->join('students_data', 'students_data.school_id = students_attendance.student_id');
		$this->db->join('csc_events', 'csc_events.event_date = students_attendance.attendance_date');
		$this->db->join('payment', 'payment.payment_date = csc_events.event_date');
		$this->db->where('payment_id', $id);
		$this->db->where('school_id', $id);
		$this->db->order_by('event_date', 'DESC');
		return $query = $this->db->get();
	}
}