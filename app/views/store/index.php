<?php $this->load->view('templates/header.php'); ?>
	
	<div class="container">

	<?php foreach ($xmls as $xml): ?>
		<?php echo $xml->id; ?> / 
		<?php echo $xml->xml_name; ?>
		<a href="<?php echo base_url('download/view_xml/'.$xml->xml_name); ?>" title="" target='_blank'>Ver Xml</a>
		- <a href="<?php echo base_url('download/view_pdf/'.$xml->xml_name); ?>" title="" target='_blank'>Ver pdf</a>
		- <a href="<?php echo base_url('download/download_xml/'.$xml->xml_name); ?>" title="" target='_blank'>Descargar Xml</a>
		- <a href="<?php echo base_url('download/download_pdf/'.$xml->xml_name); ?>" title="" target='_blank'>Descargar pdf</a>
		<br>
	<?php endforeach ?>

	<?php echo $this->pagination->create_links();	 ?>

	</div>
</body>
</html>

<?php $this->load->view('templates/footer.php'); ?>
