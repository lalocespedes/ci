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

				if ($_FILES['userfile']['type'] !== 'text/xml')
				{
					$this->session->set_flashdata('fail', 'No es un xml');
					redirect('upload');
				}

				$filename = $_FILES['userfile']['name'];
				$xml = $_FILES['userfile']['tmp_name'];

				libxml_use_internal_errors(TRUE);
				$dom = new DOMDocument('1.0', 'utf-8');
				$dom->load($xml);
				$errors = libxml_get_errors();
     
				if($errors){

					$this->session->set_flashdata('fail', 'Xml no valido');
					redirect('upload');
				}

				//parsear el xml
				$parser = new lalocespedes\CfdiMx\Parser($xml);
				$cfdi = $parser->jsonSerialize();

				$sat = new lalocespedes\CfdiMx\Sat($xml);
        		$result = $sat->valida_cfdi($cfdi['Comprobante']['@atributos']['total'], $cfdi['Comprobante']['Emisor']['@atributos']['rfc'], $cfdi['Comprobante']['Receptor']['@atributos']['rfc'], $cfdi['Comprobante']['Complemento']['TimbreFiscalDigital']['@atributos']['UUID']);

        		if($result === 'N') {
					
					$this->session->set_flashdata('fail', 'Error: xml no registrado en el SAT, si el documento tiene menos de 72 hrs favor de intentarlo mas tarde');
					redirect('store');

				}

				$this->load->model('upload/mdl_upload');

				$validate_rfc = $this->mdl_upload->validation_rfc($cfdi);

				if(!$validate_rfc) {
					
					$this->session->set_flashdata('fail', 'El documento no corresponde para ningun rfc registrado, el rfc en el xml es '. $cfdi['Comprobante']['Receptor']['@atributos']['rfc']);
					redirect('store');

				}

				$xml_uuid = $cfdi['Comprobante']['Complemento']['TimbreFiscalDigital']['@atributos']['UUID'];

				$validate_uuid = $this->mdl_upload->validation_uuid($xml_uuid);

				if($validate_uuid) {

					$this->session->set_flashdata('error', 'Docuemto previamente ya capturado');
					redirect('store');

				}
				
				//validar los campos del xml

				//validar extrutura del cfdi32

				//subir el xml al folder
				
				$filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

				$this->store($filename);

				$this->save($filename, $xml_uuid);

				$this->session->set_flashdata('success', 'Documento guardado.');
				redirect('store');
		
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
			$this->session->set_flashdata('fail', $this->upload->display_errors());
			redirect('upload');
		}

	}

	public function save($filename, $xml_uuid)
	{
		$data = [
			'xml_name'  => $filename,
			'xml_uuid'	=> $xml_uuid
		];

		$this->db->insert('sdm_xml', $data);
	}

}

/* End of file Upload.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/controllers/Upload.php */