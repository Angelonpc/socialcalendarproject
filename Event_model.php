<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Event_model extends CI_Model {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	
	public function create_event($uid,$date, $time, $description,$public) {
		
		$data = array(
			'uid'  => $uid,
			'date' => $date,
			'time' => $time,
			'data' => $description,
			'public' => $public
		);
		
		return $this->db->insert('events', $data);
		
	}
	
	
	
	public function get_event_id_from_date_time($date,$time) {
		
		$this->db->select('eid');
		$this->db->from('events');
		$this->db->where('date', $date)->where('time',$time);

		return $this->db->get()->row('id');
		
	}
	public function get_event_from_date($date){
		
		$this->db->select('time','data');
		$this->db->from('events');
		$this->db->where('date', $date);
				
		return $this->db->get();
	}
	function delete_event($uid,$date,$time){
		
		if($this->db->select('date')->from('events')
				->where('date',$date)->where('uid',$uid)->where('time',$time)->count_all_results()){
					$this->db->where('date',$date)->where('uid',$uid)->where('time',$time)->
					delete('events');
		}
	}
	
	
}
