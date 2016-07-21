<?php 
	/**
	* 
	*/
	class Datakeahlian extends CI_Model
	{
		
		public function all()
		{
			return $this->db->get('keahlian');
		}
		public function daftar_sub($idkeahlian)
		{
			$this->db->where('idkeahlian',$idkeahlian);
			return $this->db->get('subkeahlian');
		}
	}