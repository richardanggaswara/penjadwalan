<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
Class ClientServices extends CI_Controller {

	public function index(){
		$this->load->view('services');
	}
}
?>