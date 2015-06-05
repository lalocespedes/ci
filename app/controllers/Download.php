<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends Admin_Controller {

	function __construct() {

		parent::__construct();

		//$this->output->enable_profiler(FALSE);
	}

	public function view_xml($file){

		if(!$file){
			redirect('store');
		}

		$data = file_get_contents(XML_FOLDER.'/'.$file);
		echo html_escape($data);

	}

	public function view_pdf($file, $template=null)
	{
		if(!$file){
			redirect('store');
		}

		$template = ($template) ? $template : 'default';

		$file = XML_FOLDER.'/'.$file;

		$parser = new lalocespedes\CfdiMx\Parser($file);
		$data = $parser->jsonSerialize();

		$qr = new Endroid\QrCode\QrCode();

        $qr->setText($data['Comprobante']['codigobarra']);
        $qr->setSize(140);
        $qr->setPadding(5);
        $qr = base64_encode($qr->get());

        $data['qr'] = '<img style="float: left; padding: 0 0 15px 15px; opacity: 1; background: #fff; margin: 0 0 10px 10;" src="data:image/png;base64,'.$qr.'">';

		$html = $this->load->view('store/templates/' . $template, $data, TRUE);

		$mpdf = new mPDF();
		$mpdf->WriteHTML($html);
		$mpdf->Output();

		//echo html_escape($data);
	}

}

/* End of file Download.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/controllers/Download.php */