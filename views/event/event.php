<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
$(function() {
    $("#eventdate").datepicker({
    	  dateFormat: "yy-mm-dd"
        });
    $("#eventtime").timepicker({ 'timeFormat': 'H:i:s' });
});
</script>

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
				<h1>Event</h1>
			</div>
			<?= form_open() ?>
			<div class="form-group">
					<label for="date">Date</label>
					<input type="date" class="form-control" id="eventdate" name="eventdate" placeholder="Event date">
				</div>
				<div class="form-group">
					<label for="time">Time</label>
					<input type="time" class="form-control" id="eventtime" name="eventtime" placeholder="Event Time">
				</div>
				<div class="form-group">
					<label for="eventdescr">Description</label>
					<input type="text" class="form-control" id="eventdescr" name="eventdescr" placeholder="Event Description">
				</div>
				<div class="form-group">
					<label for="public">Public</label>
					<input type="checkbox" class="form-control" id="eventpublic" name="eventpublic" placeholder="Is Public;">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Add">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->
