<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
Class ClientClass1 extends CI_Controller {
function __construct()
    {
		parent::__construct();
		$this->load->model('Jadwal');	
	}
	public function index(){
		$data['dropdownhari'] = $this->Jadwal->getdrophari();
		$data['dropdownkelas'] = $this->Jadwal->getdropkelasvii();
		if($this->input->post('no') and $this->input->post('hari_id')){
            $no = $this->input->post('no');
			$hari_id = $this->input->post('hari_id');
			$data['displaybyjam'] = $this->Jadwal->getslotforkelas($hari_id,$no);
			$data['displayajar'] = $this->Jadwal->getajarguru();
        }else{
			$firstkelas = $this->Jadwal->getfirstkelasvii();
			$firsthari = $this->Jadwal->getfirsthari();
			$hari_id = $firsthari['hari_id'];
			$no = $firstkelas['no'];
			$data['displaybyjam'] = $this->Jadwal->getslotforkelas($hari_id,$no);
			$data['displayajar'] = $this->Jadwal->getajarguru();
		}
		
		$this->load->view('homeclass1_1',$data);
	}
}
?>