<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Event extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('event_model');
		
		$this->load->model("menu_model", "menu");
		$items = $this->menu->all();
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
		
	}

	public function index() {
		

		
	}
	
	public function add_event() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('eventdate','required');
		$this->form_validation->set_rules('eventtime','required');
		$this->form_validation->set_rules('eventdata','required');
	
		if ($this->form_validation->run() === false) {
			// validation not ok, send validation errors to the view
			$this->load->view('cal_header');
			$this->load->view('event/event', $data);
			$this->load->view('footer');
			echo "not ok";
		} 
		else {
			
			// set variables from the form
			if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
			$uid	=$_SESSION['user_id'];
			$date 	= $this->input->post('eventdate');
			$time   = $this->input->post('eventtime');
			$data 	= $this->input->post('eventdescr');
			$public	=$this->input->post('eventpublic');
			echo $uid;
			
			if ($this->event_model->create_event($uid,$date, $time, $data,$public)) {
				
				// event creation ok
				redirect('maincal/display');
			
			} else {
				
				// event creation failed, this should never happen
				$data->error = 'There was a problem .';
				
				// send error to the view
				$this->load->view('cal_header');
				$this->load->view('user/register/register', $data);
				$this->load->view('footer');
				
			}
			}
			
		}
		
	}
			
}
