<?php
class jadwal extends CI_Model
{
	function __construct()
    {
		parent::__construct();
		$this->load->database();
		
	}
	public function add($data)
	{		
		$result = $this->db->insert('slotjadwalkegiatan', $data); 
		return $result;
	}
	 var $table = 'jam_table';
	function getpenjadwalan($where = '', $sort = '', $limit = ''){
		return $this->db->query("select * from ".$this->table.", hari_table $where $sort $limit");
	}
 function getpenjadwalanBypenjadwalanid($idSlotJadwalKegiatan){
  return $this->db->get_where($this->table, array('idSlotJadwalKegiatan' => $idSlotJadwalKegiatan));
 }
  function getslotforkelas($hari_id,$no){
        $data = array();
        $this->db->select('*');
		$this->db->where('jam_table.hari_id',$hari_id);
		$this->db->where('ruang_table.no',$no);
        $Q = $this->db->get('jam_table,ruang_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }
		function getdrophari(){
		$data = array();
		$this->db->select('*');
		$hari = $this->db->get('hari_table');
		if ($hari->num_rows() > 0){
			foreach ($hari->result() as $row)
				{
					$data[$row->hari_id] = $row->hari_nama;
				}
		}
		$hari->free_result();
		return $data;	
	 }
	  function getdropkelasvii(){
		$data = array();
		$this->db->select('*');
		$this->db->where('idRuang',"VII");
		$kelas = $this->db->get('ruang_table');
		if ($kelas->num_rows() > 0){
			foreach ($kelas->result() as $row)
				{
					$data[$row->no] = $row->NamaRuang;
				}
		}
		$kelas->free_result();
		return $data;	
	 }
	 function getdropkelasviii(){
		$data = array();
		$this->db->select('*');
		$this->db->where('idRuang',"VIII");
		$kelas = $this->db->get('ruang_table');
		if ($kelas->num_rows() > 0){
			foreach ($kelas->result() as $row)
				{
					$data[$row->no] = $row->NamaRuang;
				}
		}
		$kelas->free_result();
		return $data;	
	 }
	 function getdropkelasix(){
		$data = array();
		$this->db->select('*');
		$this->db->where('idRuang',"IX");
		$kelas = $this->db->get('ruang_table');
		if ($kelas->num_rows() > 0){
			foreach ($kelas->result() as $row)
				{
					$data[$row->no] = $row->NamaRuang;
				}
		}
		$kelas->free_result();
		return $data;	
	 }
	 function getfirstkelasvii(){
         $data = array();
        $this->db->select('*');
		$this->db->where('idRuang',"VII");
        $this->db->order_by("no", "asc");
        $this->db->limit(1);
        $Q = $this->db->get('ruang_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
             $data = $row;
            }
        $Q->free_result();
        return $data;

        }
    }
	 function getfirstkelasviii(){
         $data = array();
        $this->db->select('*');
		$this->db->where('idRuang',"VIII");
        $this->db->order_by("no", "asc");
        $this->db->limit(1);
        $Q = $this->db->get('ruang_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
             $data = $row;
            }
        $Q->free_result();
        return $data;

        }
    }
	 function getfirstkelasix(){
         $data = array();
        $this->db->select('*');
		$this->db->where('idRuang',"IX");
        $this->db->order_by("no", "asc");
        $this->db->limit(1);
        $Q = $this->db->get('ruang_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
             $data = $row;
            }
        $Q->free_result();
        return $data;

        }
    }
	function getajarguru(){
	 $data = array();
	 $query = $this->db->query('select * from ajar_table a, guru_table g, mapel_table m where a.guru_id = g.guru_id and a.mapel_id= m.mapel_id'); 
	  if ($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
                $data[] = $row;
            }
        }
        $query->free_result();
        return $data;
	}
	function getfirsthari(){
         $data = array();
        $this->db->select('*');
        $this->db->order_by("hari_id", "asc");
        $this->db->limit(1);
        $Q = $this->db->get('hari_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
             $data = $row;
            }
        $Q->free_result();
        return $data;

        }
    }
	function retrieveslot($jam_ke,$hari_id,$no){
		$data = array();
        $query = $this->db->query("SELECT *,case when guru_id is null then 'false' else 'true' end as status FROM(select jam_id from jam_table where jam_ke =".$jam_ke." and hari_id = ".$hari_id.") as slot, slotjadwalkegiatan where slotjadwalkegiatan.jam_id = slot.jam_id and slotjadwalkegiatan.no = ".$no."");
        if ($query->num_rows() > 0){
          foreach ($query->result() as $row){
                $data = $row->status;
            }
        }
        $query->free_result();
        return $data;
    }
	function retrievematpel($jam_ke,$hari_id,$no){
		$data = array();
		$query = $this->db->query("SELECT ajar_id from(select jam_id from jam_table where jam_ke =".$jam_ke." and hari_id = ".$hari_id.") as slot,slotjadwalkegiatan,ajar_table where slotjadwalkegiatan.jam_id = slot.jam_id and slotjadwalkegiatan.guru_id = ajar_table.guru_id and slotjadwalkegiatan.no = ".$no."");
		 if ($query->num_rows() > 0){
          foreach ($query->result() as $row){
                $data = $row->ajar_id;
            }
        }
        $query->free_result();
        return $data;
	}
 function countpenjadwalan($where){
  return $this->getpenjadwalan($where)->num_rows();
 }
 
 function addpenjadwalan($data){
  $this->db->insert($this->table,$data); 
 }
  
 function editpenjadwalan($idSlotJadwalKegiatan, $data){
  $this->db->where('idSlotJadwalKegiatan',$idSlotJadwalKegiatan);
  $this->db->update($this->table, $data);
 }
  
 function deletepenjadwalan($idSlotJadwalKegiatan){
  $this->db->delete($this->table, array('idSlotJadwalKegiatan' => $idSlotJadwalKegiatan));
 }
 function execute($hari,$jam){
    $query = $this->db->query("SELECT * FROM jam_table WHERE hari='$hari' and jam='$jam'");
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
 }
}
?>