<?php
	class My_calendar_model extends CI_Model{
		var $conf;
		
		// Δημιουργία μεθόδου κατασκευαστή
		public function __construct()
        {
            // Κλήση του κατασκευαστή CI_Model
            parent::__construct();	
			
			
			$this->conf = array('start_day'=>'monday', // Ημέρα έναρξης ημερολογίου
							'show_next_prev'=>true, // Δυνατότητα μετακίνησης σε προηγούμενο/επόμενο μήνα
							'day_type'=>'long',		// Εμφάνιση ημέρας ολογράφως
						    'next_prev_url'=>'http://localhost/login/index.php/my_calendar/display'); // Καθορίζει τη διαδρομή της κλάσης display του κατασκευαστή
			// base_url() . 'my_calendar/display'); - εναλλακτικά για αντικατάσταση του παραπάνω url ρυθμίζουμε application/config/autoload.php $autoload['helper'] = array('url');	
							
			// Αντιγραφή από https://codeigniter.com/user_guide/libraries/calendar.html (Creating a Calendar Template)
			$this->conf['template']='
				{table_open}<table border="0" cellpadding="2" cellspacing="2" class="calendar">{/table_open}

				{heading_row_start}<tr class="hf">{/heading_row_start}

				{heading_previous_cell}<th><a href="{previous_url}">&#9756;</a></th>{/heading_previous_cell}
				{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
				{heading_next_cell}<th><a href="{next_url}">&#9758;</a></th>{/heading_next_cell}

				{heading_row_end}</tr>{/heading_row_end}

				{week_row_start}<tr class="wday">{/week_row_start}
				{week_day_cell}<td>{week_day}</td>{/week_day_cell}
				{week_row_end}</tr>{/week_row_end}

				{cal_row_start}<tr class="days">{/cal_row_start}
				{cal_cell_start}<td class="day">{/cal_cell_start}
				
				{cal_cell_start_today}<td>{/cal_cell_start_today}
				{cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

				{cal_cell_content}
					<div class="day_num">{day}</div>
					<div class="content">{content}</div>
				{/cal_cell_content}
				
				{cal_cell_content_today}
					<div class="day_num highlight">{day}</div>
					<div class="content">{content}</div>
				{/cal_cell_content_today}

				{cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
				{cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

				{cal_cell_blank}&nbsp;{/cal_cell_blank}

				{cal_cell_other}{day}{/cal_cel_other}

				{cal_cell_end}</td>{/cal_cell_end}
				{cal_cell_end_today}</td>{/cal_cell_end_today}
				{cal_cell_end_other}</td>{/cal_cell_end_other}
				{cal_row_end}</tr>{/cal_row_end}

				{table_close}</table>{/table_close}
			';
		}
		
		// Λήψη δεδομένων από τη βάση
		function get_calendar_data($year, $month){
			$query=$this->db->select('date, data')->from('calendar')->like('date',"$year-$month",'after')->get();
			
			$cal_data=array();
			
			foreach ($query->result() as $row){
				$cal_data[substr($row->date,8,2)]=$row->data; // Καθορισμός της μορφής της ημερομηνίας
			}
			
			return $cal_data;
		}
		
		
		// Εισαγωγή δεδομένων από το browser
		function add_calendar_data($date, $data){
			if($this->db->select('date')->from('calendar')->where('date',$date)->count_all_results()){
				$this->db->where('date', $date)->update('calendar',array('date'=>$date,'data'=>$data));
			}
			else{
				$this->db->insert('calendar',array('date'=>$date,'data'=>$data));
			}
		}
		
		function generate($year, $month){
			$this->load->library('calendar',$this->conf); // Φόρτωση της calendar class
			
			$cal_data=$this->get_calendar_data($year, $month);
			
			return $this->calendar->generate($year, $month, $cal_data); // Κλήση της μεθόδου generate για τη δημιουργία του calendar
		}
	}
?>