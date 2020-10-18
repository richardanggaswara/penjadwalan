<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class AdminAjar extends CI_Controller{

	function __construct()
	{
		parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper(array('form','url'));
			$this->load->database();
			$this->load->model('Ajar');
		}
	function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['name'];
			$data['view']        = 'adminajar_view';
			$data['url_json']  = site_url('adminajar/json_Ajar');
			$data['url_form']    = site_url('adminajar');
			$data['title']      = 'Data Kapasitas Ajar';
			$data['title_form']  = 'Form Data Kapasitas Ajar';
			$this->load->view('adminajar', $data);
		}
		else{
			redirect('verifylogin','refresh');
		}
		 
		 }
		  
		 function json_Ajar(){	 
			  $page   = $this->input->post('page');
			  $rp   = $this->input->post('rp');
			  $sortname  = $this->input->post('sortname');
			  $sortorder  = $this->input->post('sortorder');
			  if (!$sortname) $sortname  = 'jadwal_id';
			  if (!$sortorder) $sortorder = 'asc';
			   
			  $sort = "ORDER BY $sortname $sortorder";  		   
			  if (!$page) $page = 1;  
			  if (!$rp) $rp = 30;  	   
			  $start = (($page-1) * $rp);
			  $limit = "LIMIT $start, $rp";  		   
			  $query = $this->input->post('query');  
			  $qtype = $this->input->post('qtype');  	   
			  $where = "where jadwal_table.guru_id = guru_table.guru_id and jadwal_table.no = ruang_table.no and jadwal_table.guru_id = ajar_table.guru_id";
			  if ($query) $where .= " WHERE $qtype LIKE '%$query%'";     
			  $result = $this->Ajar->getkapasitasajar($where, $sort, $limit);
			  $total  = $this->Ajar->countkapasitasajar($where); 
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
			   $json .= "id:'".$row->jadwal_id."',";
			   $json .= "cell:["; 
			   $json .= "'".addslashes($row->guru_nik)."',";
			   $json .= "'".addslashes($row->guru_nama)."',";
			   $json .= "'".addslashes($row->ajar_id)."',";
			   $json .= "'".addslashes($row->NamaRuang)."',";
			   $json .= "'".addslashes($row->kapasitas)." Jam',";
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
			  $data['view']    = 'adminajar_form';
			  $data['action']  = site_url('adminajar/create');
			  $this->load->view('adminajar_form', $data);
		 }
		    
		 function delete($idSlotJadwalKegiatan){ 
		  $this->Jadwal->deletekapasitasajar($idSlotJadwalKegiatan);
		 }
		  
	
		 function insert(){
			$data_jadwal= array();
			$this->form_validation->set_rules('idSlotJadwalKegiatan', '', '');
			$this->form_validation->set_rules('hari', 'Hari', 'callback_existing');
			$this->form_validation->set_rules('jam', 'Jam', '');
			$this->form_validation->set_rules('no_ajar', 'Kode Ajar', '');
			$this->form_validation->set_rules('no', 'Ruang', '');
			if ($this->form_validation->run())
			{
		  $data   = array( 'idSlotJadwalKegiatan' => trim($this->input->post('idSlotJadwalKegiatan')),
			  'hari' => trim($this->input->post('hari')),
			  'jam' => trim($this->input->post('jam')),
			  'no_ajar' => trim($this->input->post('no_ajar')),
			  'no' => trim($this->input->post('no')));
				$result = $this->Jadwal->add($data);
				if ($result) redirect(site_url('adminajar'), 'refresh');
					}
				$this->load->view('adminajar', $data_jadwal);
	}	
	function existing($str = '', $params = ''){
		$hari = $this->input->post('hari');
		$jam = $this->input->post('jam');
		 if ($this->Jadwal->execute($hari, $jam)) {
		 $this->form_validation->set_message('existing', 'Jadwal yang anda masukkan bentrok dengan jadwal lain! Tekan menu samping Data Jadwal untuk mereload kembali data!');
		   return FALSE;
		  }else	  {
		  return TRUE;}
		 }
	function reload(){ 
		  echo '<script type="text/javascript">parent.$("#table").flexReload();</script>';
		  echo '<script type="text/javascript">parent.$.fn.colorbox.close();</script>';
		 }
	function logout(){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('clienthome','refresh');
		}  
  }

?>