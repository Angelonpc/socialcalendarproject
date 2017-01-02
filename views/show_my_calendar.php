<!DOCTYPE html>
<html lang="el">
<head>
	<title>My Calendar</title>
	<meta charset="utf-8">
	<style type="text/css">
		.calendar{
			font-family:Arial;
			font-size:14px;
		}
		
		table.calendar{
			border-collapse:collapse;
			margin:auto;
		}
		
		.hf{
			font-size:22px;
		}
				
		.calendar .wday td{
			text-align:center;
			padding:10px;
			font-weight:bold;
			font-size:17px;
		}
		
		.calendar .days td{
			width:95px;
			height:95px;
			padding:4px;
			border:1px solid #999;
			vertical-align:top;
			background-color:#ccffff;
		}
		
		.calendar .days td:hover{
			background-color:#fff;
		}
		
		.calendar .highlight{
			font-weight:bold;
			color:navy;
		}
		
		a:link, a:visited {
			background-color: #f44336;
			color: white;
			padding: 5px 25px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
		}


		a:hover, a:active {
			background-color: red;
		}
	</style>
</head>

<body>
	<?php echo $calendar; ?>
	<!-- Εδώ μπαίνει ο κώδικας Jquery Ajax για τα events -->
</body>
</html>