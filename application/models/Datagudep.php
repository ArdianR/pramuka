<?php 
	/**
	* 
	*/
	class Datagudep extends CI_Model
	{
		
		public function insert($data)
		{
			$this->db->insert('gudep',$data);
		}
		public function update($data)
		{
			$this->db->where('idgudep',$data['idgudep']);
			$this->db->update('gudep',$data);
		}
		public function cekIdgudep($gudep_putra,$gudep_putri)
		{
			$this->db->where("(gudep_putra=".$gudep_putra.") OR (gudep_putri=".$gudep_putri.") OR
			(gudep_putra=".$gudep_putri.") OR (gudep_putri=".$gudep_putra.")");
			return $this->db->get('gudep');
		}
		public function all($idkwaran)
		{
			return $this->db->query("SELECT k.idkwaran,g.idgudep,nama_kwaran,gudep_putra,gudep_putri,															 				 nama_gudep,g.keterangan
															 from gudep g, kwaran k
															 where  g.idkwaran=k.idkwaran and k.idkwaran='$idkwaran'");
		}
		public function where($idgudep)
		{
			$this->db->where('idgudep',$idgudep);
			return $this->db->get('gudep');
		}
		public function delete($idgudep)
		{
			$this->db->where('idgudep',$idgudep);
			$this->db->delete('gudep');
		}
		public function gudepKwaran($idkwaran)
		{
			$this->db->where('idkwaran',$idkwaran);
			return $this->db->get('gudep');
		}
	}