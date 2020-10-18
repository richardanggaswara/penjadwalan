<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Adminguru extends CI_Controller{

	function __construct()
	{
		parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper(array('form','url'));
			$this->load->database();
			$this->load->model('Guru');
		}
	function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['name'];
			$data['view']        = 'adminguru_view';
			$data['url_json']  = site_url('adminguru/json_Guru');
			$data['url_form']    = site_url('adminguru');
			$data['title']      = 'Data Guru';
			$data['title_form']  = 'Form Data Guru';
			$this->load->view('adminguru', $data);
		}
		else{
			redirect('verifylogin','refresh');
		}
		 
		 }
		  
		 function json_Guru(){	 
			  $page   = $this->input->post('page');
			  $rp   = $this->input->post('rp');
			  $sortname  = $this->input->post('sortname');
			  $sortorder  = $this->input->post('sortorder');
			  if (!$sortname) $sortname  = 'guru_id';
			  if (!$sortorder) $sortorder = 'asc';
			   
			  $sort = "ORDER BY $sortname $sortorder";  		   
			  if (!$page) $page = 1;  
			  if (!$rp) $rp = 10;  	   
			  $start = (($page-1) * $rp);
			  $limit = "LIMIT $start, $rp";  		   
			  $query = $this->input->post('query');  
			  $qtype = $this->input->post('qtype');  	   
			  $where = "";
			  if ($query) $where .= " WHERE $qtype LIKE '%$query%'";     
			  $result = $this->Guru->getpenjadwalan($where, $sort, $limit);
			  $total  = $this->Guru->countpenjadwalan($where); 
			  $json  = "";    
			  $json .= "{\n";
			  $json .= "page: $page,\n";
			  $json .= "total: $total,\n";
			  $json .= "rows: [";
			  $rc = false;
			  $i = $start;
		  foreach ($result->result() as $row) {
			   $i++;
			   if($i <= 9) $i = '0'.$i;
			   if ($rc) $json .= ",";
			   $json .= "\n{";
			   $json .= "id:'".$row->guru_id."',";
			   $json .= "cell:["; 
			   $json .= "'".addslashes($row->guru_nik)."',";
			   $json .= "'".addslashes($row->guru_nama)."',";
			   $json .= "'".addslashes($row->guru_alamat)."',";
			   $json .= "'".addslashes($row->guru_status)."',";
			   $json .= "'".addslashes($row->guru_nohp)."',";
			   $json .= "'".addslashes($row->guru_jabatan)."',";
			   $json .= "'".addslashes($row->guru_jabatan_detail)."',";
			   $json .= "]}";
			   $rc = true;  
		  }
			  $json .= "\n]}";
			  header("Expires: Wed, 01 Jan 2020 00:00:00 GMT" ); 
			  header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT"); 
			  header("Cache-Control: no-cache, must-revalidate" ); 
			  header("Pragma: no-cache" );
			  header("Content-type: text/x-json");
			  echo $json;
		 }
		  
		 function add(){  
			  $data['view']    = 'adminguru_form';
			  $data['action']  = site_url('adminguru/create');
			  $this->load->view('adminguru_form', $data);
		 }
		  
		 function create(){ 
			  $data   = array(
			  'guru_nama' => trim($this->input->post('guru_nama')),
			  'guru_alamat' => trim($this->input->post('guru_alamat')),
			  'guru_status' => trim($this->input->post('guru_status')),
			  'guru_nohp' => trim($this->input->post('guru_nohp')),
			  'guru_jabatan' => trim($this->input->post('guru_jabatan')));
			  $this->Guru->addpenjadwalan($data);
			  $this->reload(); 
		 }
		  
		 function edit($guru_id){ 
			  $Guru = $this->Guru->getpenjadwalanBypenjadwalanid($guru_id)->row();
			  $data['action']  = site_url("adminguru/update/$guru_id");
			  $data['guru_nama']  = $Guru->guru_nama;
			  $data['guru_alamat'] = $Guru->guru_alamat;
			  $data['guru_status'] = $Guru->guru_status;
			  $data['guru_nohp'] = $Guru->guru_nohp;
			  $data['guru_jabatan'] = $Guru->guru_jabatan;
			  $this->load->view('adminguru_form', $data);
		 }
		 
		 function update($guru_id){ 
			    $data   = array(
				'guru_nama' => trim($this->input->post('guru_nama')),
				'guru_alamat' => trim($this->input->post('guru_alamat')),
				'guru_status' => trim($this->input->post('guru_status')),
				'guru_nohp' => trim($this->input->post('guru_nohp')),
				'guru_jabatan' => trim($this->input->post('guru_jabatan')));
		  $this->Guru->editpenjadwalan($guru_id, $data);
		  $this->reload();
		 }
		  
		 function delete($guru_id){ 
		  $this->Guru->deletepenjadwalan($guru_id);
		 }
		  
		 function reload(){ 
		  echo '<script type="text/javascript">parent.$("#table").flexReload();</script>';
		  echo '<script type="text/javascript">parent.$.fn.colorbox.close();</script>';
		 }
		 function insert(){
			$data_jadwal= array();
			$this->form_validation->set_rules('guru_nik', '', 'callback_existing');
			$this->form_validation->set_rules('guru_nama', '', 'callback_existing');
			$this->form_validation->set_rules('guru_alamat', '', '');
			$this->form_validation->set_rules('guru_status', '', '');
			$this->form_validation->set_rules('guru_nohp', '', 'trim|max_length[16]|numeric');
			$this->form_validation->set_rules('guru_jabatan', '', '');
			if ($this->form_validation->run())
			{
				$data = array(
					'guru_nama' => $this->input->post('guru_nik'),
					'guru_nama' => $this->input->post('guru_nama'),
					'guru_alamat' => $this->input->post('guru_alamat'),
					'guru_status' => $this->input->post('guru_status'),
					'guru_nohp' => $this->input->post('guru_nohp'),
					'guru_jabatan' => $this->input->post('guru_jabatan'),
				);
				$result = $this->Guru->add($data);
				if ($result) redirect(site_url('adminguru'), 'refresh');
					}
				$this->load->view('adminguru', $data_jadwal);
	}
	function logout(){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('clienthome','refresh');
		}
	function existing(){
	    $guru_nik = $this->input->post('guru_nik');
		$guru_nama = $this->input->post('guru_nama');
		 if ($this->Guru->execute($guru_nama) and $this->Guru->execute($guru_nik)) {
		 $this->form_validation->set_message('existing', 'Nama Guru yang diinput sama ! Tekan menu samping Data Guru untuk mereload kembali data');
		   return FALSE;
		  }else	  {
		  return TRUE;}	
    }
}
?>