<?php
class ajar extends CI_Model
{
	function __construct()
    {
		parent::__construct();
		$this->load->database();
		
	}
	public function add($data)
	{		
		$result = $this->db->insert('mapel_table', $data); 
		return $result;
	}
	 var $table = 'jadwal_table,guru_table,ajar_table,ruang_table';
	function getkapasitasajar($where = '', $sort = '', $limit = ''){
		return $this->db->query("select * from ".$this->table." $where $sort $limit");
	}
 function getpenjadwalanBypenjadwalanid($kode_mapel){
  return $this->db->get_where($this->table, array('kode_mapel' => $kode_mapel));
 }
  
 function countkapasitasajar($where){
  return $this->getkapasitasajar($where)->num_rows();
 }
 
 function addkapasitasajar($data){
  $this->db->insert($this->table,$data); 
 }
  
 function deletekapasitasajar($kode_mapel){
  $this->db->delete($this->table, array('kode_mapel' => $kode_mapel));
 }
  function execute($kode_mapel,$mapel){
    $query = $this->db->query("SELECT * FROM mapel_table WHERE kode_mapel='$kode_mapel' or mapel='$mapel'");
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
 }
}
?>