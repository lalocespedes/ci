Revisar info a subir

<form action="/store/xml" method="post" enctype="multipart/form-data">
	
	<input type="hidden" name='userfile' id='userfile' value='<?php echo $xml; ?>'>
	<input type="hidden" name='filename' id='filename' value='<?php echo $filename; ?>'>

	<input type='submit' value='Guardar xml'>

</form>