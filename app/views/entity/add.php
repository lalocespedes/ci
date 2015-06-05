<?php $this->load->view('templates/header'); ?>
<form action="save" method="post" autocomplete="off">
	<div>
		<label for="rfc"> Nombre Fiscal:</label>
		<?php echo form_input('name'); ?>
		<?php echo form_error('name'); ?>
	</div>
	<div>
		<label for="rfc"> RFC:</label>
		<?php echo form_input('rfc'); ?>
		<?php echo form_error('rfc'); ?>
	</div>
	<input type='submit'>
</form>