<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
Class ClientArticle extends CI_Controller {

	public function index(){
		$this->load->view('article');
	}
}
?>