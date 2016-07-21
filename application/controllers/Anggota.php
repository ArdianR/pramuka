<?php 
	/**
	* 
	*/
	class Anggota extends CI_Controller
	{
		
		function __construct()
		{
				parent::__construct();
				$this->load->model('datakwaran');
				$this->load->model('dataanggota');
				$this->load->model('datakeahlian');
				$this->load->helper('dateindo');
		}
		public function session()
		{
			return $s=$this->session->userdata('admin');
		}
		public function form_anggota($idanggota='')
		{
			$s=$this->session();
			$data['idanggota']=$idanggota;
			$idkwaran=$s['idkwaran'];
			$data['kwaran']=$this->datakwaran->all($idkwaran);
			$data['keahlian']=$this->datakeahlian->all();
			$this->load->view('admin/form_anggota',$data);
		}
		public function add()
		{
			$tanggal=$this->input->post('tanggal');
			$bulan=$this->input->post('bulan');
			$tahun=$this->input->post('tahun');
			$tanggal_lahir=$tahun."-".$bulan."-".$tanggal;
			$text=array(
					'idanggota' => $this->input->post('idanggota'), 
					'nama_anggota' => $this->input->post('nama_anggota'), 
					'tempat_lahir' => $this->input->post('tempat_lahir'), 
					'tanggal_lahir' => $tanggal_lahir, 
					'agama' => $this->input->post('agama'), 
					'jenis_kelamin' => $this->input->post('jenis_kelamin'), 
					'golongan_darah' => $this->input->post('gol_darah'), 
					'alamat' => $this->input->post('alamat'), 
					'idkwaran' => $this->input->post('idkwaran'), 
					'idgudep' => $this->input->post('idgudep'), 
					'kode_gudep' => $this->input->post('kode_gudep'), 
					'golongan' => $this->input->post('golongan'), 
					'keahlian' => $this->input->post('keahlian'),
			);


			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['encrypt_name']	= TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				echo $this->upload->display_errors();
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$image=$data['upload_data']['file_name'];
				$foto=array('foto'=>$image);
				$data=array_merge($text,$foto);
				$this->dataanggota->insert($data);
				echo 1;
			}
		
		}
		public function update()
		{

			$tanggal=$this->input->post('tanggal');
			$bulan=$this->input->post('bulan');
			$tahun=$this->input->post('tahun');
			$tanggal_lahir=$tahun."-".$bulan."-".$tanggal;
			$text=array(
					'idanggota' => $this->input->post('idanggota'), 
					'nama_anggota' => $this->input->post('nama_anggota'),
					'tempat_lahir' => $this->input->post('tempat_lahir'), 
					'tanggal_lahir' => $tanggal_lahir,  
					'jenis_kelamin' => $this->input->post('jenis_kelamin'), 
					'agama' => $this->input->post('agama'), 
					'golongan_darah' => $this->input->post('gol_darah'), 
					'alamat' => $this->input->post('alamat'), 
					'idkwaran' => $this->input->post('idkwaran'), 
					'idgudep' => $this->input->post('idgudep'), 
					'kode_gudep' => $this->input->post('kode_gudep'), 
					'golongan' => $this->input->post('golongan'), 
					'keahlian' => $this->input->post('keahlian'),
			);


			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '5000';
			$config['encrypt_name']	= TRUE;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$data=$text;
				$this->dataanggota->update($data);
				echo 1;
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$image=$data['upload_data']['file_name'];
				$foto=array('foto'=>$image);
				$data=array_merge($text,$foto);
				$this->dataanggota->update($data);
				echo 1;
			}
		
		}
		public function table_anggota()
		{
			$s=$this->session();
			$idkwaran=$s['idkwaran'];
			$data['level']=$s['level'];
			$data['anggota']=$this->dataanggota->table_anggota($idkwaran);
			$this->load->view('modul/css');
			$this->load->view('admin/table_anggota',$data);
		}
		public function detail($idanggota)
		{
			$data=$this->dataanggota->where($idanggota);
		
			foreach($data->result() as $row)
			{	
				
				$tanggal=array(
					'tahun'=>substr($row->tanggal_lahir,0,4),
					'bulan'=>substr($row->tanggal_lahir,5,2),
					'tanggal'=>substr($row->tanggal_lahir,8,2),
					);
				$new=get_object_vars($row);
				$newdata=array_merge($new,$tanggal);

				echo json_encode($newdata);
			}
		}
		public function delete($idanggota)
		{
			$this->dataanggota->delete($idanggota);
			echo 1;
		}
		public function detailAnggota()
		{
			$idanggota=$this->input->post('idanggota');
			$data['anggota']=$this->dataanggota->detail($idanggota);
			$data['konten']=$this->load->view('public/detail_anggota',$data,TRUE);
			$this->load->view('modul/css');
			$this->load->view('welcome_message',$data);
		}
		public function sub_keahlian($idkeahlian)
		{
			$data['keahlian']=$this->datakeahlian->daftar_sub($idkeahlian);
			$this->load->view('admin/list_keahlian',$data);
		}
		public function kta($idanggota)
		{
			$data['anggota']=$this->dataanggota->detail($idanggota);
			$this->load->view('modul/js');
			$kartu=$this->load->view('admin/template_kta',$data,TRUE);
			echo $kartu;
			
		}
	}