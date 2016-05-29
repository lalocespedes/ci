<?php $this->load->view('templates/header'); ?>

<form action="<?php echo base_url('entity/update/'.$data->id); ?>" method="post" autocomplete="off">
	<div>
		<label for="rfc"> Nombre Fiscal:</label>

			<?php echo form_input('name', $data->entity_name); ?>
			<?php echo form_error('name'); ?>
	</div>
	<div>
		<label for="rfc"> RFC:</label>
			<?php echo form_input('rfc', $data->entity_rfc); ?>
			<?php echo form_error('rfc'); ?>
	</div>
	<input type='submit'>

</form>


<?php $this->load->view('templates/footer.php'); ?>
