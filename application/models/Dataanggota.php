<?php 
	/**
	* 
	*/
	class Dataanggota extends CI_model
	{
		public function all($idkwaran='')
		{
			if (!empty($idkwaran)) {
				$this->db->where('idkwaran');
				return $this->db->get('anggota');
			}else{
				return $this->db->get('anggota');
			}
			
		}
		
		public function golongan()
		{
			return $this->db->query('select distinct(golongan) from anggota');
		}
		public function keahlian()
		{
			return $this->db->query("select distinct(keahlian) from anggota");
		}
		public function insert($data)
		{
			$this->db->insert('anggota',$data);
		}
		public function detail($idanggota)
		{
			return $this->db->query("	SELECT *
																FROM anggota a
																INNER JOIN kwaran k
																ON k.idkwaran = a.idkwaran
																INNER JOIN gudep g
																on g.idgudep=a.idgudep
																where a.idanggota='$idanggota'");
		}
		public function table_anggota($idkwaran)
		{
			if ($idkwaran!=0) {
				return $this->db->query("	SELECT *
																FROM anggota a
																INNER JOIN kwaran k
																ON k.idkwaran = a.idkwaran
																INNER JOIN gudep g
																on g.idgudep=a.idgudep
																where k.idkwaran='$idkwaran'");
			}else{

				return $this->db->query("	SELECT *
																FROM anggota a
																INNER JOIN kwaran k
																ON k.idkwaran = a.idkwaran
																INNER JOIN gudep g
																on g.idgudep=a.idgudep");
			}
			
		}
		public function where($idanggota)
		{
			$this->db->where('idanggota',$idanggota);
			return $this->db->get('anggota');
		}
		public function delete($idanggota)
		{
			$this->db->where('idanggota',$idanggota);
			$this->db->delete('anggota');
		}
		public function update($data)
		{
			$this->db->where('idanggota',$data['idanggota']);
			$this->db->update('anggota',$data);
		}
		public function selectKwaran($idkwaran)
		{
			return $data = array(
				'data' =>$this->whereKwaran($idkwaran)->result(),
				'fields'=>$this->db->list_fields('anggota'),
				'key'=>'idanggota' 
				);
		}
		public function whereKwaran($idkwaran)
		{
			$this->db->where('idkwaran',$idkwaran);
			return $this->db->get('anggota');
		}
	}