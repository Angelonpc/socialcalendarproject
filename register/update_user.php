<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
			<div class="page-header">
				<h1>Change Password</h1>
			</div>
			<?= form_open() ?>
			<table class="table">
			<tr>
			<td>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username"  value="<?php if(isset($username)){ echo $username;}?>">
					<p class="help-block">At least 4 characters, letters or numbers only</p>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php if(isset($email)){ echo $email;}?>">
					<p class="help-block">A valid email address</p>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="email">Group</label>
					<input type="text" class="form-control" id="guid" name="guid" placeholder="Enter your group" value="<?php if(isset($gid)){ echo $gid;}?>">
					<p class="help-block">Enter your group for share events</p>
				</div>
			</td>
				
			</tr>
			<tr>
			<td>
				<div class="form-group">
					<label for="oldpassword">old Password</label>
					<input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Enter a password">
					<p class="help-block">At least 6 characters</p>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
					<p class="help-block">At least 6 characters</p>
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<p class="help-block">Must match your password</p>
				</div>
			</td>
			<td>
				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Register">
					<button name="cancel" type="reset" class="btn btn-info">Cancel</button>
				</div>
				</td>
			
				</tr>
				</table>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->