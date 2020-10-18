<?php
class ruang extends CI_Model
{
	function __construct()
    {
		parent::__construct();
		$this->load->database();
		
	}
	public function add($data)
	{		
		$result = $this->db->insert('ruang', $data); 
		return $result;
	}
	 var $table = 'ruang_table';
	function getruang($where = '', $sort = '', $limit = ''){
		return $this->db->query("select * from ".$this->table.", guru_table $where $sort $limit");
	}
 function getruangByruangid($no){
  return $this->db->get_where($this->table, array('no' => $no));
 }
  
 function countruang($where){
  return $this->getruang($where)->num_rows();
 }
 
 function addruang($data){
  $this->db->insert($this->table,$data); 
 }
  
 function editruang($no, $data){
  $this->db->where('no',$no);
  $this->db->update($this->table, $data);
 }
  
 function deleteruang($no){
  $this->db->delete($this->table, array('no' => $no));
 }
  function execute($idRuang,$guru_id){
    $query = $this->db->query("SELECT * FROM ruang_table WHERE idRuang = '$idRuang' or guru_id = '$guru_id'");
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
 }
}
?>