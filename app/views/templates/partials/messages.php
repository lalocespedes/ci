
<?php if ($this->session->flashdata()): ?>
	
	<?php foreach ($this->session->flashdata() as $key => $msg): ?>

		<div id="feedback" class="<?php echo $key; ?>">
			<a class="dismiss">Cerrar</a>
			<h3><?php echo $key; ?>!</h3>
	    	<p><?php echo $msg; ?></p>
		</div>

	<?php endforeach ?>

<?php endif ?>