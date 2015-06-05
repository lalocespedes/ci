<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entity extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('entity/mdl_entity');

		if (!$this->ion_auth->is_admin())
		{
			$this->session->set_flashdata('message', 'Acceso denegado, consulta con tu administrador');
			redirect('dashboard');
		}
	}

	public function index()
	{
		$entitys = $this->db->get('sdm_entity')->result();

		$this->load->view('entity/index', [
			'entitys' => $entitys
		]);
	}

	public function show($id)
	{	
		if (!$id) {
			$this->session->set_flashdata('error', 'Registro no encontrado.');
			redirect('entity');
		}

		$this->db->where('id', $id);
		$entity = $this->db->get('sdm_entity')->row();

		if(!$entity) {

			$this->session->set_flashdata('error', 'Registro no encontrado.');
			redirect('entity');

		}

		$this->load->view('entity/show', [

			'data'	=> $entity
		]);
	}	

	public function add()
	{
		$this->load->view('entity/add');
	}

	public function save()
	{	

		if (!$_POST) {
			
			redirect('entity/add');
		}

		$entity_name = $this->input->post('name');
		$entity_rfc = $this->input->post('rfc');

		$this->mdl_entity->validation();

		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('entity/add');
		}
		else
		{
			$this->db->insert('sdm_entity', [

			'entity_name'	=> $entity_name,
			'entity_rfc'	=> $entity_rfc

			]);

			$this->session->set_flashdata('success', 'Datos guardados.');
			redirect('entity');
		}

	}

	public function update($id)
	{
		if (!$id) {
			$this->session->set_flashdata('error', 'Registro no encontrado.');
			redirect('entity');
		}

		$this->db->where('id', $id);
		$data = $this->db->get('sdm_entity')->row();

		if($_POST)
		{
			$entity_name = $this->input->post('name');
			$entity_rfc = $this->input->post('rfc');

			$this->mdl_entity->validation();

			if ($this->form_validation->run() == FALSE)
			{	
				$request = new stdClass();
				$request->entity_name = $entity_name;
				$request->entity_rfc = $entity_rfc;
				$request->id = $id;

				$this->load->view('entity/update', [
				 	'data' => $request
				]);

				return false;

			}
			else
			{
				$this->db->where('id', $id);
				$this->db->update('sdm_entity', [

				'entity_name'	=> $entity_name,
				'entity_rfc'	=> $entity_rfc

				]);

				$this->session->set_flashdata('success', 'Datos Actualizados.');
				redirect('entity');
			}
		}

		if(!$data) {

			$this->session->set_flashdata('error', 'Registro no encontrado.');
			redirect('entity');

		}

		$this->load->view('entity/update', [
		 	'data' => $data
		]);
	}

	// public function delete($id)
	// {
	// 	if (!$id) {
	// 		$this->session->set_flashdata('error', 'Registro no encontrado.');
	// 		redirect('entity');
	// 	}

	// 	$this->db->where('id', $id);
	// 	$this->db->delete('sdm_entity');
		
	// 	$this->session->set_flashdata('delete', 'Registro borrado.');
	// 	redirect('entity');
	// }

}

/* End of file Entity.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/controllers/Entity.php */