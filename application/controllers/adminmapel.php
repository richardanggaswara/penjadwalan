<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class AdminMapel extends CI_Controller{

	function __construct()
	{
		parent::__construct();
			$this->load->library('form_validation');
			$this->load->helper(array('form','url'));
			$this->load->database();
			$this->load->model('Mapel');
		}
	function index(){
			$data['view']        = 'adminmapel_view';
			$data['url_json']  = site_url('adminmapel/json_Mapel');
			$data['url_form']    = site_url('adminmapel');
			$data['title']      = 'Data Mata Pelajaran';
			$data['title_form']  = 'Form Data Mata Pelajaran';
			$this->load->view('adminmapel', $data);
		}
		 function json_Mapel(){	 
			  $page   = $this->input->post('page');
			  $rp   = $this->input->post('rp');
			  $sortorder  = $this->input->post('sortorder');
			  $sortname  = 'kode_mapel';
			  if (!$sortorder) $sortorder = 'asc';
			   
			  $sort = "ORDER BY $sortname $sortorder";  		   
			  if (!$page) $page = 1;  
			  if (!$rp) $rp = 30;  	   
			  $start = (($page-1) * $rp);
			  $limit = "LIMIT $start, $rp";  		   
			  $query = $this->input->post('query');  
			  $qtype = $this->input->post('qtype');  	   
			  $where = "";
			  if ($query) $where .= " WHERE $qtype LIKE '%$query%'";     
			  $result = $this->Mapel->getpenjadwalan($where, $sort, $limit);
			  $total  = $this->Mapel->countpenjadwalan($where); 
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
			   $json .= "id:'".$row->kode_mapel."',";
			   $json .= "cell:["; 
			   $json .= "'".addslashes($row->kode_mapel)."',";
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
			  $data['view']    = 'adminmapel_form';
			  $data['action']  = site_url('adminmapel/create');
			  $this->load->view('adminmapel_form', $data);
		 }
		  
		 function create(){ 
			  $data   = array( 
			  'kode_mapel' => trim($this->input->post('kode_mapel')),
			  'mapel' => trim($this->input->post('mapel')));
			  $this->Mapel->addpenjadwalan($data);
			  $this->reload(); 
		 }
		  
		 function edit($kode_mapel){ 
			  $Mapel = $this->Mapel->getpenjadwalanBypenjadwalanid($kode_mapel)->row();
			  $data['action']  = site_url("adminmapel/update/$kode_mapel");
			  $data['kode_mapel'] = $Mapel->kode_mapel;
			  $data['mapel'] = $Mapel->mapel;
			  $this->load->view('adminmapel_form', $data);
		 }
		 
		 function update($kode_mapel){ 
			    $data   = array(
				'kode_mapel' => trim($this->input->post('kode_mapel')),
				'mapel' => trim($this->input->post('mapel')));
		  $this->Mapel->editpenjadwalan($kode_mapel, $data);
		  $this->reload();
		 }
		  
		 function delete($kode_mapel){ 
		  $this->Mapel->deletepenjadwalan($kode_mapel);
		 }
		  
		 function reload(){ 
		  echo '<script type="text/javascript">parent.$("#table").flexReload();</script>';
		  echo '<script type="text/javascript">parent.$.fn.colorbox.close();</script>';
		 }
		 function insert(){
			$data_jadwal= array();
			$this->form_validation->set_rules('kode_mapel', '', 'callback_existing');
			$this->form_validation->set_rules('mapel', '', '');
			if ($this->form_validation->run())
			{
				$data = array(
					'kode_mapel' => $this->input->post('kode_mapel'),
					'mapel' => $this->input->post('mapel'),
				);
				$result = $this->Mapel->add($data);
				if ($result) redirect(site_url('adminmapel'), 'refresh');
					}
				$this->load->view('adminmapel', $data_jadwal);
	}	
	function existing($str = '', $params = ''){
		$kode_mapel = $this->input->post('kode_mapel');
		$mapel = $this->input->post('mapel');
		 if ($this->Mapel->execute($kode_mapel, $mapel)) {
		 $this->form_validation->set_message('existing', 'Mata Pelajaran yang diinput sudah ada! Tekan menu samping Data Mata Pelajaran untuk mereload kembali data!');
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