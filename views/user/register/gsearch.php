<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
$(document).ready(function(){
	
	 $(".line").click(function(event){
		$("#uid").val($(this).find("#fuid").html());
		$("#username").val($(this).find("#uname").html());
		$("#email").val($(this).find("#uemail").html());
		$("#guid").val($(this).find("#ugid").html());
		$("#isconfirmed").val($(this).find("#uisconf").html());
		$("#isadmin").val($(this).find("#uisadm").html());
        });
});

</script>
<?php 
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
?>		
<style>
	.line:hover{
		background-color:#DFFFEE;
	}		
</style>	
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
			<table><tr>
			<td>
				<div class="form-group">
					<label for="uid">id</label>
					<input type="text" class="form-control" id="uid" name="uid" placeholder="Enter a username">
					<p class="help-block">At least 4 characters</p>
				</div></td>
			<td>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
					<p class="help-block">At least 4 characters</p>
				</div></td>
				<td>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
					<p class="help-block">A valid email</p>
				</div></td>
				<td>
				<div class="form-group">
					<label for="email">Group</label>
					<input type="text" class="form-control" id="guid" name="guid" placeholder="Enter your group" >
					<p class="help-block">Enter your group</p>
				</div></td>
				<td>
				<td>
				<div class="form-group">
					<label for="isConfirmed">Is Confirmed</label>
					<input type="text" class="form-control" id="isconfirmed" name="isconfirmed" placeholder="0 or 1" >
					<p class="help-block">enter (1) if Confirmed</p>
				</div></td>
				<td>
				<div class="form-group">
					<label for="isAdmin">Is Admin</label>
					<input type="text" class="form-control" id="isadmin" name="isadmin" placeholder="0 or 1" >
					<p class="help-block">enter (1) if Administrator</p>
				</div></td>
				<td>
				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Update" name="btn_update">
					<button name="cancel" type="reset" class="btn btn-info">Cancel</button>
				</div></td>
				</tr>
			</table>
			</form>
			<?= form_open() ?>
			<table><tr><td>
			<div class="form-group">
			<label for="searchGroup">Search user</label>
					<input type="text" class="form-control" id="tsearch" name="tsearch" >
					<p class="help-block">Enter username for Search</p>
			</div>	
			</td>
			<td>		
           	<div class="form-group">
					<input type="submit" class="btn btn-info" value="Search" name="Search">
					<button name="cancel" type="reset" class="btn btn-info">Cancel</button>
				</div>
			</t></tr></table>
			</form>
			<?php 
			if (isset($apot)){
				echo $apot;
			}
			?>
	<?php		
		}
		else 
		{
			echo 'no login';
		}
		?>		
		</div>
	</div><!-- .row -->
</div><!-- .container -->