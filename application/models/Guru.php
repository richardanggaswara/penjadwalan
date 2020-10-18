<?php
class guru extends CI_Model
{
	function __construct()
    {
		parent::__construct();
		$this->load->database();
		
	}
	public function add($data)
	{		
		$result = $this->db->insert('guru_table', $data); 
		return $result;
	}
	 var $table = 'guru_table';
	function getpenjadwalan($where = '', $sort = '', $limit = ''){
		return $this->db->query("select * from ".$this->table." $where $sort $limit");
	}
	function getpenjadwalanBypenjadwalanid($guru_id){
	  return $this->db->get_where($this->table, array('guru_id' => $guru_id));
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
	 
	 function getnik($nik_guru){
        $data = array();
		$this->db->select('*');
        $query = $this->db->get_where('guru_table', array('guru_nik' => $nik_guru), 1);
        if ($query->num_rows() > 0){
          foreach ($query->result() as $row){
                $data = $row;
            }
        }
        $query->free_result();
        return $data;
     }
	 function bookslot($jam_id,$user_id,$no){
         $date_enrol = date("Y-m-d");
         $data = array(
            'guru_id' => $user_id,
            'jam_id' => $jam_id,
			'no' => $no,
            'date_created' => $date_enrol,
             );
	  $this->db->insert('slotjadwalkegiatan',$data);         
     }
	 function updateslot($jam_id,$user_id,$no){
         $date_enrol = date("Y-m-d");
         $data = array(
            'guru_id' => $user_id,
            'jam_id' => $jam_id,
			'no' => $no,
            'date_created' => $date_enrol,
             );
	  $this->db->insert('slotjadwalkegiatan',$data);         
     }
	 function unbookslot($jam_id,$user_id,$no){
         $date_enrol = date("Y-m-d");
         $data = array(
            'guru_id' => $user_id,
            'jam_id' => $jam_id,
			'no' => $no,
             );
	  $this->db->delete('slotjadwalkegiatan',$data);         
     }
	function getjam($jam_ke,$hari_id){
		$data = array();
		$query = $this->db->query("SELECT jam_id from jam_table where jam_ke = ".$jam_ke." and hari_id = ".$hari_id."");
		 if ($query->num_rows() > 0){
          foreach ($query->result() as $row){
                $data = $row->jam_id;
            }
        }
        $query->free_result();
        return $data;
	}
	function retrieveslot($jam_ke,$user_id,$no,$hari_id){
		$data = array();
        $query = $this->db->query("SELECT *,case when guru_id =".$user_id." is null then 'false' else 'true' end as status FROM(select jam_id from jam_table where jam_ke =".$jam_ke." and hari_id=".$hari_id.") as slot, slotjadwalkegiatan where slotjadwalkegiatan.jam_id = slot.jam_id and slotjadwalkegiatan.no = ".$no."");
        if ($query->num_rows() > 0){
          foreach ($query->result() as $row){
                $data = $row->status;
            }
        }
        $query->free_result();
        return $data;
    }
	function retrieveslotadmin($jam_ke,$no,$hari_id){
		$data = array();
        $query = $this->db->query("SELECT *,case when guru_id is null then 'false' else 'true' end as status FROM(select jam_id from jam_table where jam_ke =".$jam_ke." and hari_id=".$hari_id.") as slot, slotjadwalkegiatan where slotjadwalkegiatan.jam_id = slot.jam_id and slotjadwalkegiatan.no = ".$no."");
        if ($query->num_rows() > 0){
          foreach ($query->result() as $row){
                $data = $row->status;
            }
        }
        $query->free_result();
        return $data;
    }
	function retrievematpel($jam_ke,$no,$hari_id){
		$data = array();
		$query = $this->db->query("SELECT ajar_id from(select jam_id from jam_table where jam_ke =".$jam_ke." and hari_id = ".$hari_id.") as slot, slotjadwalkegiatan,ajar_table where slotjadwalkegiatan.jam_id = slot.jam_id and slotjadwalkegiatan.guru_id = ajar_table.guru_id and slotjadwalkegiatan.no = ".$no."");
		 if ($query->num_rows() > 0){
          foreach ($query->result() as $row){
                $data = $row->ajar_id;
            }
        }
        $query->free_result();
        return $data;
	}
	 function getdropkelas(){
		$data = array();
		$this->db->select('*');
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
	function retrievewaktu($jam_ke,$hari_id){
		$data = array();
		$query = $this->db->query("select * from jam_table where hari_id =".$hari_id." and jam_ke = ".$jam_ke." ");
		 if ($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
                $data = $row;
            }
        }
        $query->free_result();
        return $data;
	}
	function retrievehari($hari_nama){
		$data = array();
		$query = $this->db->query("select hari_id from hari_table where hari_nama ='$hari_nama' ");
		 if ($query->num_rows() > 0){
          foreach ($query->result() as $row){
                $data = $row->hari_id;
            }
        }
        $query->free_result();
        return $data;
	}
	function retrieveharibyjadwal($guru_id){
		$data = array();
		$query = $this->db->query("select * from jadwal_table,ruang_table where jadwal_table.guru_id =".$guru_id." and jadwal_table.no = ruang_table.no");
		if ($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[$row->no] = $row->NamaRuang;
			}
		}
		$query->free_result();
		return $data;
	}
	 function getslotforjam($hariid){
        $data = array();
        $this->db->select('*');
        $this->db->where('hari_id', $hariid);
		//$this->db->where('ruang_table.no', $no);
        $Q = $this->db->get('jam_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }
	 function getkelas($guru_id){
         $data = array();
        $this->db->select('*');
		$this->db->where('guru_id',$guru_id);
        $this->db->order_by("jadwal_id", "asc");
        $this->db->limit(1);
        $Q = $this->db->get('jadwal_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
             $data = $row;
            }
        $Q->free_result();
        return $data;

        }
    }
	 function gethari(){
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
	function getslotforkelas(){
        $data = array();
        $this->db->select('*');
		$this->db->order_by("no", "asc");
      //  $this->db->where('no', $no);
        $Q = $this->db->get('ruang_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }
	 function getslotforinput($hari_id,$no){
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
	function getslotforhari(){
        $data = array();
        $this->db->select('*');
		$this->db->order_by("hari_id", "asc");
        $Q = $this->db->get('hari_table');
        if ($Q->num_rows() > 0){
            foreach ($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

	
	//select jam_table.waktu, mapel_table.mapel from slotjadwalkegiatan join ajar_table on ajar_table.guru_id = slotjadwalkegiatan.guru_id join mapel_table on ajar_table.mapel_id = mapel_table.mapel_id join jam_table on jam_table.jam_id = slotjadwalkegiatan.jam_id where slotjadwalkegiatan.guru_id=1 group by jam_id=1
	
	//SELECT jam_table.waktu, mapel_table.mapel FROM slotjadwalkegiatan JOIN ajar_table ON ajar_table.guru_id = slotjadwalkegiatan.guru_id JOIN mapel_table ON ajar_table.mapel_id = mapel_table.mapel_id JOIN jam_table ON jam_table.jam_id = slotjadwalkegiatan.jam_id WHERE slotjadwalkegiatan.guru_id =1 AND slotjadwalkegiatan.jam_id =1
	
	function countpenjadwalan($where){
	  return $this->getpenjadwalan($where)->num_rows();
	 }
	 
	function addpenjadwalan($data){
	  $this->db->insert($this->table,$data); 
	 }
	  
	function editpenjadwalan($guru_id, $data){
	  $this->db->where('guru_id',$guru_id);
	  $this->db->update($this->table, $data);
	 }
	  
	function deletepenjadwalan($guru_id){
	  $this->db->delete($this->table, array('guru_id' => $guru_id));
	 }
	function execute($guru_nama){
		$query = $this->db->query("SELECT * FROM guru_table WHERE guru_nama='$guru_nama'");
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	 }
}
?>