<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
Class AdminSlot extends CI_Controller {
	function __construct()
    {
		parent::__construct();
		$this->load->model('Guru');	

	}
	public function index(){
		$this->load->library('session');
		$data['dropdownhari'] = $this->Guru->getdrophari();
		$data['dropdownkelas'] = $this->Guru->getdropkelas();
		$firsthari = $this->Guru->getfirsthari();
		$hariid = $firsthari['hari_id'];
		$data['displaybyjam'] = $this->Guru->getslotforjam($hariid);
		$data['displaybyruang'] = $this->Guru->getslotforkelas();
		$data['displaybyhari'] = $this->Guru->getslotforhari();
		$this->load->view('adminslot',$data);
		
	}
	function booking(){ 
		$no = $this->uri->segment(4);
		$hari_id = $this->uri->segment(5);
		$data['jam_data'] = $this->uri->segment(3);
		$data['no'] = $no;
		$data['hari_id'] = $hari_id;
		$this->load->view('adminslot',$data);
	}
	 function updateslot(){
			$jam_id = $this->Guru->getjam($jam_ke,$hari_id);
            $user_id = $this->input->post('guru_id');
			$this->Guru->updateslot($jam_id,$user_id,$no);
		 redirect('adminslot','refresh');
		 $this->load->view('adminslot');
	}
	function unbook(){
		$jam_ke = $this->uri->segment(3);
		$no = $this->uri->segment(4);
		$hari_id = $this->uri->segment(5);
        $guru_nama = $this->session->userdata('guru_nik');
		$jam_id = $this->Guru->getjam($jam_ke,$hari_id);
        $user = $this->Guru->getnik($guru_nama);
        $user_id = $user->guru_id;
		if ($user_id){
		$this->session->set_flashdata('unbook','Your Unbooking Has Been Done');
		$this->Guru->unbookslot($jam_id,$user_id,$no);
		}
		 redirect('adminslot','refresh');
		 $this->load->view('adminslot',$data);
	}
	
	function logout(){
			$this->session->sess_destroy();
			redirect('clienthome','refresh');
		}
}

?>