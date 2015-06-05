<?php $this->load->view('templates/header'); ?>


<h4>Entidad</h4>




<?php echo $data->entity_name; ?><br>
<?php echo $data->entity_rfc; ?>

<br>
<a href="<?php echo base_url('entity/update/'.$data->id) ?>" title="">Editar entidad</a>