<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendar Home Page</title>
	<!--link the bootstrap css file-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
	<link rel="icon" type="image/png" href="<?php echo base_url("assets/images/calendar-icon.png"); ?>"/>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home"><span class="glyphicon glyphicon-home"></span> Calendar</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('login')){ ?>
				<li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
				<li><a href="<?php echo base_url(); ?>index.php/home/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>index.php/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/signup"><span class="glyphicon glyphicon-user"></span> Signup</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<h3>Developers</h3>
			<p><span class="glyphicon glyphicon-education"></span> Alevizopoulos Aggelos</p>
			<p><span class="glyphicon glyphicon-education"></span> Kasnakis Athanasios</p>
			<p><span class="glyphicon glyphicon-education"></span> Tzimtzimis Eleytherios</p>
			<p><span class="glyphicon glyphicon-education"></span> Velonis Georgios</p>
		</div>
		<div class="col-md-9 text-center">
			<h2>Welcome!!!</h2>
			<p><img src="<?php echo base_url("assets/images/calendar.jpg"); ?>"/></p>
			<h4 id="date_time_resolution"></h4>
		</div>
	</div>
</div>
	<script>
		var txt="";
		txt+=Date();
		txt+="&nbsp;&nbsp; -&nbsp;&nbsp; Screen resolution: "+screen.width+"X"+screen.height;
		document.getElementById("date_time_resolution").innerHTML = txt;
	</script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>
