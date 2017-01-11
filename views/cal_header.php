<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Social Calendar</title>
	

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/doc.min.css">
<script src="<?php echo base_url(); ?>assets/js/docs.js" defer></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.css">
<script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>
<style>
	.grammi{
	font-size:0.7em;
	}
</style>

</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '127368064430519',
      xfbml      : true,
      version    : 'v2.8'
    });
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));}
</script>

<header id="site-header">

<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/maincal/display"><span class="glyphicon glyphicon-home"></span> Calendar</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['username'])){ ?>
				<li><p class="navbar-text">Hello <?php echo $_SESSION['username']; ?></p></li>
				<li><a href="<?php echo base_url(); ?>index.php/user/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/user/user_update"><span class="glyphicon glyphicon-pencil"></span>Edit User</a></li>
				<?php if($_SESSION['is_admin']==true){ ?>
					<li><a href="<?php echo base_url(); ?>index.php/gsearch/gsearch"><span class="glyphicon glyphicon-pencil"></span>Admin Users</a></li>		
				<?php } ?>
				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>index.php/user/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="<?php echo base_url(); ?>index.php/user/register"><span class="glyphicon glyphicon-user"></span> Signup</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

</header><!-- #site-header -->		
