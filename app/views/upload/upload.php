<?php $this->load->view('templates/header.php'); ?>

	<br>
	<br>
	<form action="/upload/up" method="post" enctype="multipart/form-data">
    	Select image to upload:
    	<input type="file" name="userfile" id="userfile">
    	<input type="submit" value="Upload xml" name="submit">
	</form>
	<br>
</body>
</html>


<?php $this->load->view('templates/footer.php'); ?>
