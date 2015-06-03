<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('store/mdl_store');
	}

	public function index()
	{
		$xmls = $this->db->get('sdm_xml')->result();

		$this->load->view('store/index', [
			'xmls' => $xmls
		]);
	}

}

/* End of file storage.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/controllers/storage/storage.php */