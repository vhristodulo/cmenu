<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function index()
	{
		$this->load->library('cmenu');
		$data['cmenu'] = $this->cmenu->getCmenu();
		
		$this->load->library('parser');
		$this->parser->parse('cmenu', $data);
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
