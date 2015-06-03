<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function index()
	{
		echo "Dashboard";
	}

	public function pdf()
	{
		$mpdf = new mPDF();
		$mpdf->WriteHTML('<p>Hallo World</p>');
		$mpdf->Output();
		exit;
	}

	public function parser()
	{
		$file = '/home/ci/xml/234.xml';

		$cfdi = new lalocespedes\CfdiMx\Parser($file);

		var_dump($cfdi->jsonSerialize());

	}
}

/* End of file Dashboard.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/controllers/Dashboard.php */