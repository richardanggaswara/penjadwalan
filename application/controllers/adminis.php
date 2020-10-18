<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Adminis extends CI_Controller{

	function __construct()
	{
		parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper(array('form','url'));
			$this->load->database();
			$this->load->model('Admin');
		}
	function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['name'] = $session_data['name'];
		    $data['view']        = 'admin_view';
		    $data['url_json']  = site_url('adminis/json_Admin');
		    $data['url_form']    = site_url('adminis');
		    $data['title']      = 'Data Admin';
		    $data['title_form']  = 'Form Data Admin';
			$this->load->view('admin', $data);
		}
		else{
			redirect('verifylogin','refresh');
		}
		 
		 }
		  
		 function json_Admin(){	 
			  $page   = $this->input->post('page');
			  $rp   = $this->input->post('rp');
			  $sortname  = $this->input->post('sortname');
			  $sortorder  = $this->input->post('sortorder');
			  if (!$sortname) $sortname  = 'no_ajar';
			  if (!$sortorder) $sortorder = 'asc';
			   
			  $sort = "ORDER BY $sortname $sortorder";  		   
			  if (!$page) $page = 1;  
			  if (!$rp) $rp = 10;  	   
			  $start = (($page-1) * $rp);
			  $limit = "LIMIT $start, $rp";  		   
			  $query = $this->input->post('query');  
			  $qtype = $this->input->post('qtype');  	   
			  $where = "where ajar_table.guru_id=guru_table.guru_id and ajar_table.mapel_id=mapel_table.mapel_id";
			  if ($query) $where .= " WHERE $qtype LIKE '%$query%'";     
			  $result = $this->Admin->getpenjadwalan($where, $sort, $limit);
			  $total  = $this->Admin->countpenjadwalan($where); 
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
			   $json .= "id:'".$row->ajar_id."',";
			   $json .= "cell:["; 
			   $json .= "'".addslashes($row->guru_nama)."',";
			   $json .= "'".addslashes($row->ajar_id)."',";			   
			   $json .= "'".addslashes($row->mapel)."',";
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
			  $data['view']    = 'admin_form';
			  $data['action']  = site_url('adminis/create');
			  $this->load->view('admin_form', $data);
		 }
		  
		 function create(){ 
			  $data   = array(
			  'guru_id'=>$this->input->post('guru_id'),
					'mapel_id'=>$this->input->post('mapel_id'),
				);
				$guru_id = $this->input->post('guru_id');
				$mapel_id = $this->input->post('mapel_id');
				$kode = $this->db->query("select kode_mapel from mapel_table where mapel_id=".$mapel_id);
				$row = $kode->row();
				$kode_mapel = $row->kode_mapel;
				$data['ajar_id']= $guru_id.$kode_mapel;
			  $this->Admin->addpenjadwalan($data);
			  $this->reload(); 
		 }
		  
		 function edit($no_ajar){ 
			  $Admin = $this->Admin->getpenjadwalanBypenjadwalanid($no_ajar)->row();
			  $data['action']  = site_url("adminis/update/$$no_ajar");
			  $data['ajar_id'] = $Admin->ajar_id;
			  $data['guru_id']  = $Admin->guru_id;
			  $data['kode_mapel'] = $Admin->kode_mapel;
			  $this->load->view('admin_form', $data);
		 }
		 
		 function update($no_ajar){ 
			    $data   = array(
			  'guru_id' => trim($this->input->post('guru_id')),
			  'kode_mapel' => trim($this->input->post('kode_mapel')),
			  'mapel' => trim($this->input->post('mapel')));
		  $this->Admin->editpenjadwalan($no_ajar, $data);
		  $this->reload();
		 }
		  
		 function delete($ajar_id){ 
		  $this->Admin->deletepenjadwalan($ajar_id);
		 }
		  
		 function reload(){ 
		  echo '<script type="text/javascript">parent.$("#table").flexReload();</script>';
		  echo '<script type="text/javascript">parent.$.fn.colorbox.close();</script>';
		 }
		 function insert(){
			$data_desc= array();
			$this->form_validation->set_rules('guru_id', '', '');
			$this->form_validation->set_rules('mapel_id', '', '');
			$this->form_validation->set_rules('ajar_id', '', 'callback_existing');
			if ($this->form_validation->run())
			{
				$data = array(
					'guru_id'=>$this->input->post('guru_id'),
					'mapel_id'=>$this->input->post('mapel_id'),
				);
				$guru_id = $this->input->post('guru_id');
				$mapel_id = $this->input->post('mapel_id');
				$kode = $this->db->query("select kode_mapel from mapel_table where mapel_id=".$mapel_id);
				$row = $kode->row();
				$kode_mapel = $row->kode_mapel;
				$data['ajar_id']= $guru_id.$kode_mapel;
				$result = $this->Admin->add($data);
				if ($result) redirect(site_url('adminis'), 'refresh');
					}
				$this->load->view('admin', $data_desc);
	}	
		function existing(){
		$mapel_id = $this->input->post('mapel_id');
		$guru_id = $this->input->post('guru_id');
		 if ($this->Admin->execute($mapel_id, $guru_id)) {
		 $this->form_validation->set_message('existing', 'Deskripsi Ajar yang diinput sama ! Tekan menu samping Deskripsi Jadwal untuk mereload kembali data');
		   return FALSE;
		  }else	  {
		  return TRUE;}
}
		function logout(){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('clienthome','refresh');
		}
}
?>