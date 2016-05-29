<?php $this->load->view('templates/header'); ?>
<a href="<?php echo base_url('entity/add'); ?>" title="">Agregar Empresa</a>
<br>
<h2>Listado de entidades</h2>

<?php if ($entitys): ?>

	<?php foreach ($entitys as $key => $entity): ?>
	
	<?php echo $entity->entity_rfc; ?> - <?php echo $entity->entity_name; ?> - <a href="<?php echo base_url('entity/show/'.$entity->id); ?>" title="">Show</a> <br>

<?php endforeach ?>

<?php else: ?>

	<h4>No hay empresas registradas</h4>

<?php endif ?>


<?php $this->load->view('templates/footer.php'); ?>
