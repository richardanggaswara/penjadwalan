<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
Class ClientPrivacy extends CI_Controller {

	public function index(){
		$this->load->view('privacy');
	}
}
?>