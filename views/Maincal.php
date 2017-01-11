<main id="site-content" role="main">
<script>
$(document).ready(function(){
	var today = new Date();
	
	$.ajaxSetup({ cache: true });
	$.getScript('//connect.facebook.net/el_GR/sdk.js', function(){
    FB.init({
      appId: '127368064430519',
      version: 'v2.7' // or v2.1, v2.2, v2.3, ...
    }); 
  
    $('#loginbutton,#feedbutton').removeAttr('disabled');
    FB.getLoginStatus(updateStatusCallback);
  });
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
<style>
table, th, td,th {
border-style: solid;
		border-width:1px;
		border-color:#cbd0d8;
}
th {
	text-align:center;
	font-style:bold; 
}


    tr.header{
	text-align: center;width:14%;
		 background-color:#DFFFEE;
}

	td,td.day{
		 text-align: center;width:14%;
		 background-color:#DFE6E3;
		 font-weight: bold;
	}
	td.day:hover {
		background-color:#D5DEDB;
	}
	.grammi:hover{
		background-color:#ccffff;
	}
	.grammi{
		background-color:#e6ffff;
		border-style: solid;
		border-width:1px;
		border-color:#cbd0d8;
		}
</style>
<?php
	if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
?>
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
        <table class="table">
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
					<input type="submit" class="btn btn-info" id="btn_add" name="btn_add" value="Add/Update">
					<button id="facebook" onclick="myFacebookLogin()"><img src='<?php echo base_url(); ?>assets/img/facebook.jpg' height="20px" width="40px" ></button></div>
				</div>
				
					<div class="form-group">
					<input type="submit" class="btn btn-info" id="btn_delete" name="btn_delete"  value="Delete">
					<button name="cancel" type="reset" class="btn btn-info">Cancel</button>
				</div>
				</td> 
			</tr>
			
        </table>
        </form>    
		
		<?php 
			echo $calendar; 
		}
		else 
		{
			echo 'no login';
		}
		?>
				
        </div>
<script>
// Only works after `FB.init` is called
function myFacebookLogin() {
var str="Ο χρήστης <?php echo $_SESSION['username'];?> κοινοποίησε ένα συμβάν στο Social Calendar. Στις "+$("#eventdate").val()+" ώρα: "+$("#eventtime").val()+". Συμβάν: "+$("#eventdescr").val()+" http://sakis.kasnakis.gr/webCal/index.php/maincal/display";
  FB.login(function(){
  // Note: The call will only work if you accept the permission request
  
  FB.api('/me/feed', 'post', {message:str});
}, {scope: 'publish_actions'});}

</script>
		
        </div>
      </main>