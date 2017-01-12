<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backusers extends CI_Controller{

 function __construct() {
  parent::__construct();
  $this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->model('backusers_model');
		
	}
 
 public function adminusers(){
 $data = new stdClass();
 $this->load->helper('form');
 $this->load->library('form_validation');
 $this->load->library('table');
$tsearch=  $this->input->post('tsearch');
//if(strlen($tsearch)>0){
  $query = $this->backusers_model->getGroup($tsearch);
$this->table->set_heading('id','Username','email','group id','is Confirmed','is Admin' );  

	foreach($query as $row){
		$this->table->add_row('<div id="fuid">'.$row->id."</div>",'<div id="uname">'.$row->username.'</div>','<div id="uemail">'.$row->email.'</div>','<div id="ugid">'.$row->gid.'</div>','<div id="uisconf">'.$row->is_confirmed.'</div>','<div id="uisadm">'.$row->is_admin.'</div>');
	}


$template = array(
        'table_open'            => '<table class="table table-bordered">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr class="line">',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr class="line">',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);
	$this->table->set_template($template);	
	$data->apot=$this->table->generate();
//}
if ($this->input->post('btn_update')){
	$user_id=$this->input->post('uid');
	$username=$this->input->post('username');
	$email=$this->input->post('email');
	$ugid=$this->input->post('guid'); 
	$isconf=$this->input->post('isconfirmed');
	$isadm=$this->input->post('isadmin');
	
	$this->user_model->user_update_all($user_id,$username,$email,$ugid,$isconf,$isadm);
}
if ($this->input->post('btn_delete')){
		$duid=$this->input->post('uid');
		$this->user_model->delete_user($duid);
	}
			$this->load->view('cal_header');
			$this->load->view('user/register/backusers',$data);
			$this->load->view('footer');
  
  
 
 }
 }
?>