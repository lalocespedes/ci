<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends Admin_Controller {

	public function index()
	{
		$this->load->view('/upload/upload');
	}

	public function up()
	{	

		if(!$_FILES) {

			redirect('upload');

		}
			try {

				$filename = $_FILES['userfile']['name'];

				//validar que el xml no haya sido subido previamente confrontandolo con el uuid

				//validar que el xml sea para la empresa

				//validar que el xml se encuentre el sat

				//validar los campos del xml

				//validar extrutura del cfdi32

				//subir el xml al folder
				

				$this->store($filename);

				$this->save($filename);

				die('xml guardado');

	    		//$cfdi = new lalocespedes\CfdiMx\Parser($xml);

				//var_dump($cfdi->jsonSerialize());

		
			} catch (Exception $e) {
		
				echo $e->getMessage(), "\n";
			}
	}

	public function store($filename)
	{
		$config['upload_path'] = '/home/ci/xml/';
		$config['allowed_types'] = 'xml';
		$config['max_size']	= '500';
		$config['file_name'] = $filename;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			$this->session->set_flashdata('errorxml', $this->upload->display_errors());
			redirect('upload');
		}

	}

	public function save($filename)
	{
		$data = [
			'xml_name' => $filename
		];

		$this->db->insert('sdm_xml', $data);
	}

}

/* End of file Upload.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/controllers/Upload.php */