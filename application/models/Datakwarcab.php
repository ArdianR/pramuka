<?php 
	/**
	* 
	*/
	class Datakwarcab extends CI_Model
	{
		
		public function all()
		{
			return $this->db->get('kwarcab');
		}
	}