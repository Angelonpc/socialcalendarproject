<?php defined('BASEPATH') OR exit('No direct script access allowed');


$config['start_day']='monday';
$config['show_next_prev']=TRUE;
$config['next_prev_url']=base_url().'index.php/maincal/display';
$config['template']='{table_open}<table class="table">{/table_open}
        {heading_row_start}<tr>{/heading_row_start}
        {heading_previous_cell}<th><a href="{previous_url}"><i class="icon-hand-left"></i></a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}"><i class="icon-hand-right"></i></a></th>{/heading_next_cell}
        {heading_row_end}</tr>{/heading_row_end}
        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}
        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td class="day">{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
        {cal_cell_content}
		   <div class="day_num">{day}</div>
		   <div class="stoixeia"><i class="icon-play"></i>{content}</div>
		{/cal_cell_content}
        {cal_cell_content_today}
		<div class="day_num">{day}</div>
		   <div>{content}</div>
			{/cal_cell_content_today}
        {cal_cell_no_content}
		<div class="day_num">{day}</div>
		{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}
        {cal_cell_blank}&nbsp;{/cal_cell_blank}
        {cal_cell_other}{day}{/cal_cel_other}
        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}
        {table_close}</table>{/table_close}';
