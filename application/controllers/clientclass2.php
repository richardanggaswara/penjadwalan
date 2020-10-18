<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
Class ClientClass2 extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->model('Jadwal');	
	}
	public function index(){
		$data['dropdownhari'] = $this->Jadwal->getdrophari();
		$data['dropdownkelas'] = $this->Jadwal->getdropkelasviii();
		if($this->input->post('no') and $this->input->post('hari_id')){
            $no = $this->input->post('no');
			$hari_id = $this->input->post('hari_id');
			$data['displaybyjam'] = $this->Jadwal->getslotforkelas($hari_id,$no);
			$data['displayajar'] = $this->Jadwal->getajarguru();
        }else{
			$firstkelas = $this->Jadwal->getfirstkelasviii();
			$firsthari = $this->Jadwal->getfirsthari();
			$hari_id = $firsthari['hari_id'];
			$no = $firstkelas['no'];
			$data['displaybyjam'] = $this->Jadwal->getslotforkelas($hari_id,$no);
			$data['displayajar'] = $this->Jadwal->getajarguru();
		}
		
		$this->load->view('homeclass1_2',$data);
	}
}
?>