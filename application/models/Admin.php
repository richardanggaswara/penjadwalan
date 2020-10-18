<?php
class admin extends CI_Model
{
	function __construct()
    {
		parent::__construct();
		$this->load->database();
		
	}
	function login2($name, $password)
	{
		$this->db->select('guru_table.guru_id, guru_table.guru_nama, guru_table.guru_nik, guru_table.guru_alamat, guru_table.guru_status, guru_table.guru_nohp, guru_table.guru_jabatan, guru_table.guru_jabatan_detail, mapel_table.mapel, ajar_table.ajar_id, ajar_table.kapasitas_total');
		$this->db->join('ajar_table','ajar_table.guru_id = guru_table.guru_id');
		$this->db->join('mapel_table','ajar_table.mapel_id = mapel_table.mapel_id');
		$this->db->where('guru_table.guru_nik',$name);
		$this->db->where('guru_table.guru_password',MD5($password));
		$query=$this->db->get('guru_table');
		return $query;
	}
	function login($name, $password)
	{
		$this->db->where('name',$name);
		$this->db->where('password',MD5($password));
		$query=$this->db->get('administrator');
		return $query;
	}
	public function add($data)
	{		
		$result = $this->db->insert('ajar_table', $data); 
		return $result;
	}
	 var $table = 'ajar_table';
	function getpenjadwalan($where = '', $sort = '', $limit = ''){
		return $this->db->query("select * from ajar_table, guru_table, mapel_table $where $sort $limit");
	}

 function getpenjadwalanBypenjadwalanid($no_ajar){
  return $this->db->get_where($this->table, array('no_ajar' => $no_ajar));
 }
  
 function countpenjadwalan($where){
  return $this->getpenjadwalan($where)->num_rows();
 }
 
 function addpenjadwalan($data){
  $this->db->insert($this->table,$data); 
 }
  
 function editpenjadwalan($no_ajar, $data){
  $this->db->where('no_ajar',$no_ajar);
  $this->db->update($this->table, $data);
 }
  
 function deletepenjadwalan($no_ajar){
  $this->db->delete($this->table, array('no_ajar' => $no_ajar));
 }
   function execute($mapel_id,$guru_id){
    $query = $this->db->query("SELECT * FROM ajar_table WHERE mapel_id='$mapel_id' and guru_id='$guru_id'");
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
 }
}
?>