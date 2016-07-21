<?php 
	/**
	* 
	*/
	class Gudep extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('datakwaran');
			$this->load->model('datagudep');
		}
		public function session()
		{
			return $s=$this->session->userdata('admin');
		}
		public function form_gudep($idgudep='')
		{
			$data['idgudep']=$idgudep;
			$s=$this->session();
			$idkwaran=$s['idkwaran'];
			$data['kwaran']=$this->datakwaran->all($idkwaran);
			$this->load->view('admin/form_gudep',$data);
		}
		public function table_gudep()
		{
				$s=$this->session();
				$idkwaran=$s['idkwaran'];
				$data['gudep']=$this->datagudep->all($idkwaran);
				$this->load->view('admin/table_gudep',$data);
		}
		public function detail($idgudep='')
		{
			if (!empty($idgudep)) {
				$gudep=$this->datagudep->where($idgudep);
        echo json_encode($gudep->result());
			}
		}
		public function delete($idgudep)
		{
			$this->datagudep->delete($idgudep);
		}
		public function add()
		{
			$data = array(
				'idkwaran' => $this->input->post('idkwaran'),
				'gudep_putra' => trim($this->input->post('gudep_putra')),
				'gudep_putri' => trim($this->input->post('gudep_putri')),
				'keterangan' => $this->input->post('keterangan'),
				'nama_gudep' => $this->input->post('nama_gudep'),
			);
			$cek=$this->cekIdgudep($data['gudep_putra'],$data['gudep_putri'],$idgudep='');
			if ($cek!=1) {
				echo $cek;
			}else{
				$this->datagudep->insert($data);
				echo $cek;
			}
			
		}
		public function update()
		{
			$data = array(
				'idgudep' => $this->input->post('idgudep'),
				'idkwaran' => $this->input->post('idkwaran'),
				'gudep_putra' => trim($this->input->post('gudep_putra')),
				'gudep_putri' => trim($this->input->post('gudep_putri')),
				'keterangan' => $this->input->post('keterangan'),
				'nama_gudep' => $this->input->post('nama_gudep'),
			);
			$cek=$this->cekIdgudep($data['gudep_putra'],$data['gudep_putri'],$data['idgudep']);
			if ($cek!=1) {
				echo $cek;
			}else{
				$this->datagudep->update($data);
				echo $cek;
			}
			
		}
		public function cekIdgudep($gudep_putra,$gudep_putri,$idgudep)
		{
			$data=$this->datagudep->cekIdgudep($gudep_putra,$gudep_putri);
			if (!empty($idgudep)) {
				if ($data->result()!=null) {
					foreach($data->result() as $row)
					{
						if ($idgudep==$row->idgudep) {
							if ($row->gudep_putra==$gudep_putra) {
								return  1;
							}else{
									return  1; 
							}
						}
						else{
							if ($row->gudep_putra==$gudep_putra) {
								return  "Kode Gudep <u>".$row->gudep_putra."</u> Sudah Digunakan";
							}else{
									return  "Kode Gudep <u>".$row->gudep_putri."</u> Sudah Digunakan"; 
							}
						}
					}

				}else{
					return  1;
				}
			}
			else{
				if ($data->result()!=null) {
					foreach($data->result() as $row)
					{
						if ($row->gudep_putra==$gudep_putra) {
								return  "Kode Gudep <u>".$row->gudep_putra."</u> Sudah Digunakan";
						}else{
								return  "Kode Gudep <u>".$row->gudep_putri."</u> Sudah Digunakan"; 
						}
					}

				}else{
					return  1;
				}
			}
		}
		public function list_gudep($idkwaran)
		{
			$data['gudep']=$this->datagudep->gudepKwaran($idkwaran);
			$this->load->view('admin/list_gudep',$data);
		}
		public function kode_gudep($idgudep,$jk)
		{
			$data=$this->datagudep->where($idgudep);
			foreach($data->result() as $row)
			{
				if ($jk=='L') {
					echo $row->gudep_putra;
				}else{
					echo $row->gudep_putri;
				}
			}
		}
	}