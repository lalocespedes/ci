<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function __construct() {
    	parent::__construct();

    	if (!$this->ion_auth->logged_in()) {

       		redirect('auth/login', 'refresh');
    	} 
	}

}