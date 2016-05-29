<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends Admin_Controller {

	function __construct() {

		parent::__construct();

		//$this->output->enable_profiler(FALSE);
	}

	public function view_xml($file) {

		if(!$file){
			redirect('store');
		}

		$data = file_get_contents(XML_FOLDER.'/'.$file.'.xml');
		echo html_escape($data);

	}

	public function view_pdf($file, $template=null)
	{
		if(!$file){
			redirect('store');
		}

		$template = ($template) ? $template : 'default';

		$file = XML_FOLDER.'/'.$file.'.xml';

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

	}

	public function download_xml($file){

		if(!$file){
			redirect('store');
		}

		$this->load->helper('download');

		$data = file_get_contents(XML_FOLDER.'/'.$file.'.xml');

		force_download($file.'.xml', $data);

	}

	public function download_pdf($file_name, $template=null)
	{
		if(!$file_name){
			redirect('store');
		}

		$template = ($template) ? $template : 'default';

		$file = XML_FOLDER.'/'.$file_name.'.xml';

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
		$mpdf->Output($file_name.'.pdf', 'D');

	}

}

/* End of file Download.php */
/* Location: .//Users/arthaleon/Development/web/ci/app/controllers/Download.php */