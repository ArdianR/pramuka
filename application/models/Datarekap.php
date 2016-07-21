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

}