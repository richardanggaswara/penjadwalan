<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class AdminRuang extends CI_Controller{

	function __construct()
	{
		parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper(array('form','url'));
			$this->load->database();
			$this->load->model('Ruang');
		}
	function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['name'];
			$data['view']        = 'adminruang_view';
			$data['url_json']  = site_url('adminruang/json_Ruang');
			$data['url_form']    = site_url('adminRuang');
			$data['title']      = 'Data Ruang';
			$data['title_form']  = 'Form Data Ruang';
			$this->load->view('adminruang', $data);
		}
		else{
			redirect('verifylogin','refresh');
		}
		 
		 }
		  
		 function json_Ruang(){	 
			  $page   = $this->input->post('page');
			  $rp   = $this->input->post('rp');
			  $sortname  = $this->input->post('sortname');
			  $sortorder  = $this->input->post('sortorder');
			  if (!$sortname) $sortname  = 'idRuang';
			  if (!$sortorder) $sortorder = 'asc';
			   
			  $sort = "ORDER BY $sortname $sortorder";  		   
			  if (!$page) $page = 1;  
			  if (!$rp) $rp = 30;  	   
			  $start = (($page-1) * $rp);
			  $limit = "LIMIT $start, $rp";  		   
			  $query = $this->input->post('query');  
			  $qtype = $this->input->post('qtype');  	   
			  $where = "where guru_table.guru_id = ruang_table.guru_id";
			  if ($query) $where .= " WHERE $qtype LIKE '%$query%'";     
			  $result = $this->Ruang->getruang($where, $sort, $limit);
			  $total  = $this->Ruang->countruang($where); 
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
			   $json .= "id:'".$row->idRuang."',";
			   $json .= "cell:["; 
			   $json .= "'".addslashes($row->idRuang)."',";
			   $json .= "'".addslashes($row->NamaRuang)."',";
			   $json .= "'".addslashes($row->TipeRuang)."',";
			   $json .= "'".addslashes($row->KapasitasRuang)."',";
			   $json .= "'".addslashes($row->guru_nama)."',";
			   $json .= "'".addslashes($row->DeskripsiRuang)."',";
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
			  $data['view']    = 'adminruang_form';
			  $data['action']  = site_url('adminruang/create');
			  $this->load->view('adminruang_form', $data);
		 }
		  
		 function create(){ 
			$this->form_validation->set_rules('idRuang', 'Ruang', '');
			$this->form_validation->set_rules('NamaRuang', 'Nama Ruangan', '');
			$this->form_validation->set_rules('TipeRuang', 'Tipe Ruangan', '');
			$this->form_validation->set_rules('KapasitasRuang', 'Kapasitas Ruangan', 'numeric');
			$this->form_validation->set_rules('guru_id', 'Nama Wali Kelas', 'callback_existing');
			$this->form_validation->set_rules('DeskripsiRuang', 'Deskripsi Ruangan', '');
			if ($this->form_validation->run())
			{
			  $data   = array( 'idRuang' => trim($this->input->post('idRuang')),
			  'TipeRuang' => trim($this->input->post('TipeRuang')),
			  'KapasitasRuang' => trim($this->input->post('KapasitasRuang')),
			  'guru_id' => trim($this->input->post('guru_id')),
			  'DeskripsiRuang' => trim($this->input->post('DeskripsiRuang')));
			  	  $idRuang = $this->input->post('idRuang');
				$TipeRuang = $this->input->post('TipeRuang');
				$DeskripsiRuang = $this->input->post('DeskripsiRuang');
				$data['NamaRuang']= $TipeRuang.' '.$idRuang.', '.$DeskripsiRuang;
			  $this->Ruang->addruang($data);}
			  $this->reload(); 
		 }
		  
		  
		 function delete($idRuang){ 
		  $this->Ruang->deleteruang($idRuang);
		 }
		  
	
		 function insert(){
			$data_ruang= array();
			$this->form_validation->set_rules('idRuang', 'Ruang', '');
			$this->form_validation->set_rules('NamaRuang', 'Nama Ruangan', '');
			$this->form_validation->set_rules('TipeRuang', 'Tipe Ruangan', '');
			$this->form_validation->set_rules('KapasitasRuang', 'Kapasitas Ruangan', '');
			$this->form_validation->set_rules('guru_id', 'Nama Wali Kelas', 'callback_existing');
			$this->form_validation->set_rules('DeskripsiRuang', 'Deskripsi Ruangan', '');
			if ($this->form_validation->run())
			{
				  $data   = array( 'idRuang' => trim($this->input->post('idRuang')),
					  'TipeRuang' => trim($this->input->post('TipeRuang')),
					  'KapasitasRuang' => trim($this->input->post('KapasitasRuang')),
					  'guru_id' => trim($this->input->post('guru_id')),
					  'DeskripsiRuang' => trim($this->input->post('DeskripsiRuang')));
					  $idRuang = $this->input->post('idRuang');
				$TipeRuang = $this->input->post('TipeRuang');
				$DeskripsiRuang = $this->input->post('DeskripsiRuang');
				$data['NamaRuang']= $TipeRuang.' '.$idRuang.', '.$DeskripsiRuang;
				$result = $this->Ruang->add($data);
				if ($result) redirect(site_url('adminruang'), 'refresh');
					}
				$this->load->view('adminruang', $data_ruang);
	}	
	function existing($str = '', $params = ''){
		$idRuang = $this->input->post('idRuang');
		$guru_id = $this->input->post('guru_id');
		 if ($this->Ruang->execute($idRuang, $guru_id)) {
		 $this->form_validation->set_message('existing', 'Ruang atau wali kelas yang anda masukkan telah terkoordinasi, mohon masukkan data yang lain! Tekan menu samping Data Ruang untuk mereload kembali data!');
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