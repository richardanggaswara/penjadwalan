<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
Class GuruDashboard extends CI_Controller {
	function __construct()
    {
		parent::__construct();
		$this->load->model('Guru');	
	}
	public function index(){
		$data['displaybyhari'] = $this->Guru->getslotforhari();
		$this->load->view('guruboardview',$data);
	}
	function booking(){
		$jam_ke = $this->uri->segment(3);
		$no = $this->uri->segment(4);
		$hari_id = $this->uri->segment(5);
        $guru_id = $this->session->userdata('guru_nik');
		$jam_id = $this->Guru->getjam($jam_ke,$hari_id);
        $user = $this->Guru->getnik($guru_id);
        $user_id = $user->guru_id;
		if ($user_id){
		$this->Guru->bookslot($jam_id,$user_id,$no);
		$this->session->set_flashdata('book','Your Booking Has Been Added');
		}
		 redirect('gurudashboard/inputbykelas','reload');
		 $this->load->view('guruboardinput');
	}
	function unbook(){
		$jam_ke = $this->uri->segment(3);
		$no = $this->uri->segment(4);
		$hari_id = $this->uri->segment(5);
        $guru_id = $this->session->userdata('guru_nik');
		$jam_id = $this->Guru->getjam($jam_ke,$hari_id);
        $user = $this->Guru->getnik($guru_id);
        $user_id = $user->guru_id;
		$this->Guru->unbookslot($jam_id,$user_id,$no);
		 redirect('gurudashboard/inputbykelas','reload');
		 $this->load->view('guruboardinput');
	}
	function inputbykelas(){
		$data['dropdownhari'] = $this->Guru->getdrophari();
		$guru_id = $this->session->userdata('guru_id');			
		$data['retrieveharibykuota']= $this->Guru->retrieveharibyjadwal($guru_id);
		if($this->input->post('no') and $this->input->post('hari_id')){
            $no = $this->input->post('no');
			$hari_id = $this->input->post('hari_id');
			$data['displaybyjam'] = $this->Guru->getslotforinput($hari_id,$no);
        }else{
			$firstkelas = $this->Guru->getkelas($guru_id);
			$firsthari = $this->Guru->gethari();
			$hari_id = $firsthari['hari_id'];
			$no = $firstkelas['no'];
			$data['displaybyjam'] = $this->Guru->getslotforinput($hari_id,$no);
		}

		$this->load->view('guruboardinput',$data);
	}
	function logout(){
			$this->session->sess_destroy();
			redirect('clienthome','refresh');
		}
}
?>