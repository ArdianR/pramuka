<?php 
/**
* 
*/
class Datarekap extends CI_Model
{
	
	public function sorting_anggota($data)
	{
		$idkwaran=$data['idkwaran'];
		$idgudep=$data['idgudep'];
		$keahlian=$data['keahlian'];
		$golongan=$data['golongan'];
		return $this->db->query("SELECT *  FROM anggota a
															INNER JOIN kwaran k
															ON k.idkwaran = a.idkwaran
															INNER JOIN gudep g
															on g.idgudep=a.idgudep
															where a.idkwaran='$idkwaran'
															and  a.idgudep='$idgudep'
															and a.golongan='$golongan'
															and a.keahlian='$keahlian'");	
	}
	public function rekap_golongan($data)
	{
		if ($data['golongan']==null) {
			return $this->db->query("SELECT * 
					FROM anggota a
					INNER JOIN kwaran k ON a.idkwaran = k.idkwaran
					INNER JOIN keahlian ka ON a.keahlian = ka.idkeahlian
					INNER JOIN subkeahlian sa ON a.subkeahlian = sa.idsub 
														and k.idkwaran='".$data['kwaran']."'
														");
		}
		elseif($data['kwaran']==null)
		{
			return $this->db->query("SELECT * 
					FROM anggota a
					INNER JOIN kwaran k ON a.idkwaran = k.idkwaran
					INNER JOIN keahlian ka ON a.keahlian = ka.idkeahlian
					INNER JOIN subkeahlian sa ON a.subkeahlian = sa.idsub
														and a.golongan='".$data['golongan']."'
														");
		}
		else{
			return $this->db->query("SELECT * 
					FROM anggota a
					INNER JOIN kwaran k ON a.idkwaran = k.idkwaran
					INNER JOIN keahlian ka ON a.keahlian = ka.idkeahlian
					INNER JOIN subkeahlian sa ON a.subkeahlian = sa.idsub
														and k.idkwaran='".$data['kwaran']."'
														and a.golongan='".$data['golongan']."'
														");
		}
	}
	public function rekap_keahlian($data)
	{

			if (!empty($data['idkwaran'])) {
				if ($data['sub_keahlian']==null) {
			 	return $this->db->query("SELECT * 
									 	FROM anggota a
									 	INNER JOIN kwaran k ON a.idkwaran = k.idkwaran
									 	INNER JOIN keahlian ka ON a.keahlian = ka.idkeahlian
									 	INNER JOIN subkeahlian sa ON a.subkeahlian = sa.idsub 
				 						AND a.keahlian='".$data['keahlian']."'
				 						and k.idkwaran='".$data['idkwaran']."'
				 						");
		 		}
		 		else
		 		{
		 			return $this->db->query("SELECT * 
											 FROM anggota a
											 INNER JOIN kwaran k ON a.idkwaran = k.idkwaran
											 INNER JOIN keahlian ka ON a.keahlian = ka.idkeahlian
											 INNER JOIN subkeahlian sa ON a.subkeahlian = sa.idsub
		 									 and sa.idsub='".$data['sub_keahlian']."'
		 									 and ka.idkeahlian='".$data['keahlian']."'
		 									 and k.idkwaran='".$data['idkwaran']."'
		 									 ");
				 }
			}else{
				if ($data['sub_keahlian']==null) {
			 		return $this->db->query("SELECT * 
									 	FROM anggota a
									 	INNER JOIN kwaran k ON a.idkwaran = k.idkwaran
									 	INNER JOIN keahlian ka ON a.keahlian = ka.idkeahlian
									 	INNER JOIN subkeahlian sa ON a.subkeahlian = sa.idsub 
			 						 	AND a.keahlian='".$data['keahlian']."'");
		 		}
		 		else
		 		{
		 			return $this->db->query("SELECT * 
											 FROM anggota a
											 INNER JOIN kwaran k ON a.idkwaran = k.idkwaran
											 INNER JOIN keahlian ka ON a.keahlian = ka.idkeahlian
											 INNER JOIN subkeahlian sa ON a.subkeahlian = sa.idsub
		 									 and sa.idsub='".$data['sub_keahlian']."'
		 									 and ka.idkeahlian='".$data['keahlian']."'");
				 }
			}
	}

}