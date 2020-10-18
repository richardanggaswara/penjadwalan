<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class VerifyLogin extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin','',TRUE);
	}
	function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|callback_check_database');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('gurulog');
		}
			else
		{
			redirect('adminis','refresh');
		}
	}
	function check_database($password)
	{
		$name=$this->input->post('name');
		$result=$this->Admin->login($name,$password);
		$result2=$this->Admin->login2($name,$password);
		if($result->num_rows()>0 and $result2->num_rows()==0)
		{
			$sess_array =array();
			foreach($result->result() as $row)
			{
			$sess_array = array('id'=>$row->id,'name'=>$row->name);
			$this->session->set_userdata('logged_in',$sess_array);
			}
			return TRUE;
		}
		else if($result2->num_rows()>0 and $result->num_rows()==0)
		{
			foreach($result2->result() as $row)
			$guru_id = $row->guru_id;
			$guru_nik = $row->guru_nik;
			$guru_nama = $row->guru_nama;
			$guru_alamat = $row->guru_alamat;
			$guru_nohp = $row->guru_nohp;
			$guru_jabatan = $row->guru_jabatan;
			$guru_kodemapel = $row->ajar_id;
			$guru_mapel = $row->mapel;
			$guru_statuskuota = $row->kapasitas_total;
			$guru_jabatan_detail = $row->guru_jabatan_detail;
			$guru_status = $row->guru_status;
			{
			$sess_array = array('guru_nama'=>$guru_nama,'guru_id'=>$guru_id,'guru_nik'=>$guru_nik,'guru_alamat'=>$guru_alamat,'guru_nohp'=>$guru_nohp,'guru_jabatan'=>$guru_jabatan,'guru_jabatan_detail'=>$guru_jabatan_detail,'guru_status'=>$guru_status, 'ajar_id'=>$guru_kodemapel, 'mapel'=>$guru_mapel, 'kapasitas_total'=>$guru_statuskuota,'login' => TRUE);
			$this->session->set_userdata($sess_array);
			redirect ('gurudashboard/inputbykelas');
			}	
		}
			else
		{
			$this->form_validation->set_message('check_database','Salah memasukkan Username atau Password');
			return false;
		}
	}
}
?>