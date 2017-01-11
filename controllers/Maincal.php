<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maincal extends CI_Controller {
   public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));

		$this->load->helper(array('url'));
		$this->load->library('email');
		
		$this->load->model('user_model');
		
		$config_email['protocol'] = 'sendmail';
		$config_email['mailpath'] = '/usr/sbin/sendmail';
		$config_email['charset'] = 'utf-8';
		$config_email['wordwrap'] = TRUE;
		$this->email->initialize($config_email);
							
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
			$this->load->model('User_model');
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
				if ($this->input->post('btn_add')){
					if($this->event_model->event_exist($uid,$date,$time)){
						$this->event_model->update_event($uid,$date,$time,$descr,$temppublic); 	
					}
					else{
						$this->event_model->create_event($uid,$date,$time,$descr,$temppublic);
						$temp=$this->user_model->get_users_mails($_SESSION['user_id']);
						if($temppublic==1){
						foreach($temp->result() as $row){
							
							$this->email->from($row->email, 'webCal');
							$this->email->to($row->email);
							$this->email->subject($descr);
							$this->email->message($descr." ημερομηνία: ".$date." ώρα: ".$time);

							$this->email->send();
						}
						}
						else{
						$row=$this->user_model->get_user($uid);
						$this->email->from($row->email, 'webCal');
							$this->email->to($row->email);
							$this->email->subject($descr);
							$this->email->message($descr." ημερομηνία: ".$date." ώρα: ".$time);

							$this->email->send();
						}
					}
				} else if ($this->input->post('btn_delete')){
					$this->event_model->delete_event($uid,$date,$time); 	
				}
            	
            }
			else{
				redirect('user/login');
			}
            }
						       
            $data['calendar']=$this->Maincal_model->generate($year,$month);
            $this->load->view('cal_header');
			$this->load->view('Maincal',$data);       
			$this->load->view('footer');
			

  }
}
