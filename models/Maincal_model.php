<?php
class Maincal_model extends CI_Model{
		function __constract(){
        parent::__constract();
		$this->load->model('user_model');
    }    
	
	function add_calendar_data($date,$data){
	$user_id=$this->user_model->get_user_id_from_username($_SESSION['username']);
		if($this->db->select('date')->from('events')
		->where('date',$date)->where('uid',$user_id)->count_all_results()){
			$this->db->where('date',$date)->where('uid',$user_id)
			->update('events',array(
			'uid'=>$user_id,
			'date' => $date,
			'data' => $data));}
		else{	
			$this->db->insert('events',array(
			'uid'=>$user_id,
			'date' => $date,
			'data' => $data));
			}
			
	}
	
	function delete_calendar_data($date,$data){
	$user_id=$this->user_model->get_user_id_from_username($_SESSION['username']);
		if($this->db->select('date')->from('events')
		->where('date',$date)->where('uid',$user_id)->count_all_results()){
			$this->db->where('date',$date)->where('uid',$user_id)->
			delete('events');
			}	
	}
	
    function get_calendar_data($year,$month){
		$cal_data=array();
		$users=$this->user_model->get_users_id_from_gid($_SESSION['user_id']);
		foreach ($users->result() as $urow){
       $array1 = array('uid=' =>$urow->id, 'uid!=' =>$_SESSION['user_id'], 'public' =>true);
	   $array2 = array('uid=' =>$urow->id);
		
	   $query=$this->db->select('date,time,data','public')->from('events')->like('date',"$year-$month",'after')
			   ->where($array1)->or_where($array2)->where( 'uid=',$_SESSION['user_id'])->like('date',"$year-$month",'after')->order_by('time','ASC')
               ->get();
       
          foreach($query->result() as $row){
		   $temp_day=substr($row->date,8,2);
		   if(substr($temp_day, 0, 1) == 0) {
                $temp_day = substr($temp_day, 1, 1);
            }
            
			if(isset($cal_data[$temp_day])){
				$cal_data[$temp_day]=$cal_data[$temp_day]."<div class='grammi'>".$urow->username."|".$row->time."|".$row->data."</div>";
				//echo $cal_data[$temp_day];
			}
			else{
				$cal_data[$temp_day]="<div class='grammi'>".$urow->username."|".$row->time."|".$row->data."</div>";
			
       		}
		   
       }
       }
	 
       return $cal_data;
    }
    function generate($year,$month){
	$conf = array(
            'start_day'=> 'monday',
            'show_next_prev'=>true,
            'next_prev_url'=> base_url().'index.php/maincal/display',
			);
		$conf['template']='{table_open}<table class="table table-responsive">{/table_open}
        {heading_row_start}<tr class="header">{/heading_row_start}
        {heading_previous_cell}<th><a href="{previous_url}"><i class="glyphicon glyphicon-arrow-left"></i></a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}"><i class="glyphicon glyphicon-arrow-right"></i></a></th>{/heading_next_cell}
        {heading_row_end}</tr>{/heading_row_end}
        {week_row_start}<tr class="header">{/week_row_start}
        {week_day_cell}<td style="text-align: center;width:14%;">{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}
        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td class="day">{/cal_cell_start}
        {cal_cell_start_today}<td class="day">{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
        {cal_cell_content}
		   <div class="day_num">{day}</div>
		   <div class="stoixeia">{content}</div>
		{/cal_cell_content}
        {cal_cell_content_today}
		   <div class="day_num">{day}</div>
		   <div class="stoixeia">{content}</div>
		 {/cal_cell_content_today}
        {cal_cell_no_content}
		<div class="day_num">{day}</div>
		{/cal_cell_no_content}
        {cal_cell_no_content_today}
		<div class="highlight">
        <div class="day_num">{day}</div>
		{/cal_cell_no_content_today}
        {cal_cell_blank}&nbsp;{/cal_cell_blank}
        {cal_cell_other}{day}{/cal_cel_other}
        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}
        {table_close}</table>{/table_close}';
				
        $this->load->library('calendar', $conf);
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        	$cal_data=$this->get_calendar_data($year,$month);
        	return $this->calendar->generate($year,$month,$cal_data);
        	}
        	else {
        		return $this->calendar->generate($year,$month);
        	}
		
    }
}

