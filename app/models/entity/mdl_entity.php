<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_entity extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function validation()
	{

		$this->form_validation->set_message('required', 'Requerido');
		$this->form_validation->set_error_delimiters('', '');

		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('rfc', 'RFC', 'required');

	}

}

/* End of file mdl_entity.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/models/entity/mdl_entity.php */