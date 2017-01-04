<main id="site-content" role="main">
<script>
$(document).ready(function(){
	var today = new Date();
//	$(".social").append('<div class="fb-share-button" data-href="" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='+'http://sakis.kasnakis/webCal/index.php/maincal/display'+'kid_directed_site=true>Κοινοποιήστε</a></div>');
    $(".day_num").click(function(event){
            	
    	var dd=$(this).html();
  
    	if (dd < 10) {
            dd = "0" + dd;
        }
        var mm = today.getMonth()+1; 
        if (mm < 10) {
            mm = "0" + mm;
        }

        var calmm=window.location.href;
        if($.isNumeric(calmm.substr(calmm.length-2))){
			mm=calmm.substr(calmm.length-2);
            }
        
        var yyyy = today.getFullYear();
        
        strtoday = yyyy+'-'+mm+'-'+dd;      
      $("#eventdate").val(strtoday);
      var hh=today.getHours();
      	if(hh<10){
				hh='0'+hh;
          	}
      	var min=today.getMinutes();
      	if(min<10){
				min='0'+min;
          	}
      	var sec=today.getSeconds();
      	if(sec<10){
			sec='0'+sec;
      	}
  	
      var time =hh+":"+min+":"+sec;
      $("#eventtime").val(time);
      
      
        
    });

    $(".grammi").click(function(event){
		var str=$(this).text();
		$("#eventtime").val(str.split('|')[1]);
		var dd=$(this).parent().parent().find('.day_num').html();
    	if (dd < 10) {
            dd = "0" + dd;
        }
        var mm = today.getMonth()+1; 
        if (mm < 10) {
            mm = "0" + mm;
        }
        var calmm=window.location.href;
        if($.isNumeric(calmm.substr(calmm.length-2))){
			mm=calmm.substr(calmm.length-2);
            }
        
        var yyyy = today.getFullYear();
        
        strtoday = yyyy+'-'+mm+'-'+dd;      
        $("#eventdate").val(strtoday);  
        $("#eventdescr").val(str.split('|')[2]);
        });
});
</script>
<script type="text/javascript">
$(function() {
    $("#eventdate").datepicker({
    	  dateFormat: "yy-mm-dd"
        });
    $("#eventtime").timepicker({ 'timeFormat': 'H:i:s' });
});
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/el_GR/sdk.js#xfbml=1&version=v2.8&appId=127368064430519";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <div class="container">
        <div class="row">
        <?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="col-md-12">
			<?= form_open() ?>
        <table class=table>
        	<tr>
        		<td>
        		<div class="form-group">
					<label for="date">Date</label>
					<input type="date" class="form-control" id="eventdate" name="eventdate" placeholder="Event date">
				</div>
				</td>
				<td>
				<div class="form-group">
					<label for="time">Time</label>
					<input type="time" class="form-control" id="eventtime" name="eventtime" placeholder="Event Time">
				</div>
				</td>
				<td>
				<div class="form-group">
					<label for="eventdescr">Description</label>
					<input type="text" class="form-control" id="eventdescr" name="eventdescr" placeholder="Event Description">
				</div>
				</td>
				<td>
				<div class="form-group">
					<label for="public">Public</label>
					<input type="checkbox" class="form-control" id="eventpublic" name="eventpublic" placeholder="Is Public;">
				</div>
				</td>
				<td>
				<div class="form-group">
					<label for="adddelete">Add/Delete</label>
					<input type="checkbox" class="form-control" id="adddelete" name="adddelete" placeholder="Diagrafi;">
				</div>
				</td>
				<td>
					<div class="form-group">
					<input type="submit" class="btn btn-default" id="add_delete" value="Add/Delete">
				</div>
				</td> 
			</tr>
			
        </table>
        </form>    
<script>
// Only works after `FB.init` is called
function myFacebookLogin() {
  FB.login(function(){
  // Note: The call will only work if you accept the permission request
  FB.api('/me/feed', 'post', {message:'test'});
}, {scope: 'publish_actions'});
}
</script>
		
		<?php 
		echo $_SESSION['username'];
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			echo $calendar; 
		}
		else 
		{
			echo 'no login';
		}
		?>
		<div class="social"><button onclick="myFacebookLogin()">Share to Facebook</button></div>	
		
        </div>
        </div>
      </main>