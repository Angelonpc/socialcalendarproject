<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincal extends CI_Controller {
   public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		
		$this->load->model('user_model');
		
		$this->load->model("menu_model", "menu");
		$items = $this->menu->all();
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
		
			
	}
	public function display($year=null,$month=null){
       
		 if(!$year){
			$year=date('Y');
		 }
		 if(!$month){
			$month=date('m');
		 }
		 
		 // load form helper and validation library
		 $this->load->helper('form');
		 $this->load->library('form_validation');
		 
		 // set validation rules
		 $this->form_validation->set_rules('eventdate','required');
		 $this->form_validation->set_rules('eventtime','required');
		 $this->form_validation->set_rules('eventdata','required');
		 
		 
            $this->load->model('event_model');
            $this->load->model('Maincal_model');
            if ($this->form_validation->run() === true) {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            	$uid	=$_SESSION['user_id'];
            	$date 	= $this->input->post('eventdate');
            	$time   = $this->input->post('eventtime');
            	$descr	= $this->input->post('eventdescr');
            	$public	=$this->input->post('eventpublic');
            	if($public){
            		$temppublic=1;
            	}
            	else{
            	$temppublic=0;
            	}
            	
            	if($this->input->post('adddelete')){
            	$this->event_model->create_event($uid,$date,$time,$descr,$temppublic);
            	unset($uid);
            	unset($date);
            	unset($time);
            	unset($desc);
            	unset($public);
            	
            	}
            	else {
            		$this->event_model->delete_event($uid,$date,$time);
            		unset($uid);
            		unset($date);
            		unset($time);
            		unset($desc);
            		unset($public);
            		 
            	}
            }
            }
            	
            
           
            $data['calendar']=$this->Maincal_model->generate($year,$month);
            $this->load->view('cal_header');
			$this->load->view('Maincal',$data);       
			$this->load->view('footer');
			

  }
}
