<?php 
	/**
	* 
	*/
	class Datakwaran extends CI_Model
	{
		
		public function all($idkwaran)
		{
			if ($idkwaran!=0) {
				$this->db->where('idkwaran',$idkwaran);
				return $this->db->get('kwaran');
			}else{
				return $this->db->get('kwaran');
			}
			
		}
		public function insert($data)
		{
			$this->db->insert('kwaran',$data);
		}
		public function where($idkwaran)
		{
			$this->db->where('idkwaran',$idkwaran);
			return $this->db->get('kwaran');
		}
		public function update($data)
		{
			$this->db->where('idkwaran',$data['idkwaran']);
			$this->db->update('kwaran',$data);
		}
		public function delete($idkwaran)
		{
			$this->db->where('idkwaran',$idkwaran);
			$this->db->delete('kwaran');
		}
		public function auth($u,$p)
		{
			$this->db->where('username',$u);
			$this->db->where('password',$p);
			return $this->db->get('kwaran');
		}
		public function detailKwaran($idkwaran)
		{
			return $this->db->query("
				select nama_gudep,gudep_putra, gudep_putri ,count(distinct(idanggota)) as total,
				golongan in (select golongan from anggota where golongan='PEMBINA') as dewasa,
				golongan in (select golongan from anggota where golongan <>'PEMBINA') as muda,
				golongan in (select golongan from anggota where golongan='SIAGA') as siaga,
				golongan in (select golongan from anggota where golongan='SIAGA' and jenis_kelamin='L') as siaga_putra,
				golongan in (select golongan from anggota where golongan='SIAGA' and jenis_kelamin='P') as siaga_putri,
				golongan in (select golongan from anggota where golongan='PENGGALANG') as penggalang,
				golongan in (select golongan from anggota where golongan='PENGGALANG' and jenis_kelamin='L') as penggalang_putra,
				golongan in (select golongan from anggota where golongan='PENGGALANG' and jenis_kelamin='P') as penggalang_putri,
				golongan in (select golongan from anggota where golongan='PENEGAK') as penegak,
				golongan in (select golongan from anggota where golongan='PENEGAK' and jenis_kelamin='L') as penegak_putra,
				golongan in (select golongan from anggota where golongan='PENEGAK' and jenis_kelamin='P') as penegak_putri,
				golongan in (select golongan from anggota where golongan='PEMBINA') as pembina,
				golongan in (select golongan from anggota where golongan='PEMBINA' and jenis_kelamin='L') as pembina_putra,
				golongan in (select golongan from anggota where golongan='PEMBINA' and jenis_kelamin='P') as pembina_putri
				from gudep g, kwaran k,anggota a
				where k.idkwaran='$idkwaran'");
		}
		
	}