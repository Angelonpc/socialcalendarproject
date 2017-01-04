<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="el">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:url"           content="http://sakis.kasnakis.gr/webCal" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Social Calendar" />
	<meta property="og:description"   content="Ergasia" />
	<meta property="og:image"         content="http://sakis.kasnakis.gr/webCal/ice.jpg" />
	<title>Social Calendar</title>
	
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-submenu.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/doc.min.css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap-submenu.min.js" defer></script>
<script src="<?php echo base_url(); ?>assets/js/docs.js" defer></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.css">
<script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.js"></script>
<style>
	.grammi{
	font-size:0.5em;
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
   }(document, 'script', 'facebook-jssdk'));
</script>

<header id="site-header">
	<div class="container">
		<div class="jumbotron">
        <h1>Social Calendar</h1>
		</div>
		<div class="row">
			<?php echo $this->multi_menu->render(array(
				'nav_tag_open'        => '<ul class="nav nav-pills">',            
				'parentl1_tag_open'   => '<li class="dropdown">',
				'parentl1_anchor'     => '<a tabindex="0" data-toggle="dropdown" href="%s">%s<span class="caret"></span></a>',
				'parent_tag_open'     => '<li class="dropdown-submenu">',
				'parent_anchor'       => '<a href="%s" data-toggle="dropdown">%s</a>',
				'children_tag_open'   => '<ul class="dropdown-menu">',
				'item_active'         => 'Item-01'
				)); ?>
			
		</div>
	</div>
</header><!-- #site-header -->		
