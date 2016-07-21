<?php 
	/**
	* 
	*/
	class Dataadmin extends CI_Model
	{
		
		public function where()
		{
			$this->db->where('id',1);
			return $this->db->get('admin');
		}
		public function update($data)
		{
			$this->db->where('id',1);
			$this->db->update('admin',$data);
		}
		public function auth($u,$p)
		{
			$this->db->where('username',$u);
			$this->db->where('password',md5($p));
			return $this->db->get('admin');
		}
	}