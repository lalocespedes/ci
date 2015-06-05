<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_upload extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function validation_rfc($cfdi)
	{
		$xml_rfc = $cfdi['Comprobante']['Receptor']['@atributos']['rfc'];

		$this->db->where('entity_rfc', $xml_rfc);
		$count = $this->db->count_all_results('sdm_entity');

		return $count;
	}

	public function validation_uuid($xml_uuid)
	{
		$this->db->where('xml_uuid', $xml_uuid);
		$count = $this->db->count_all_results('sdm_xml');

		return $count;
	}

}

/* End of file mdl_upload.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/models/upload/mdl_upload.php */