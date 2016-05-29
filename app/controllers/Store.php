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

		

		$this->load->library('pagination');

		$config['base_url'] = base_url('store/index/page/');
		$config['total_rows'] = $this->db->count_all('sdm_xml');
		$config['per_page'] = 5;
		$config['num_links'] = 2;

		$this->pagination->initialize($config); 

		$xmls = $this->db->get('sdm_xml', $config['per_page'], $this->uri->segment(4))->result();

		$this->load->view('store/index', [
			'xmls' => $xmls
		]);
	}

}

/* End of file storage.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/controllers/storage/storage.php */