<?php 
	class Kwaran extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('datakwaran');
			$this->load->model('datakwarcab');
			$this->load->model('dataanggota');
		}
		public function session()
		{
			return $s=$this->session->userdata('admin');
		}
		public function sessionKwarcab()
		{
			$data=$this->datakwarcab->all();
			foreach($data->result() as $row)
			{
				$sa = array(
							'idkwarcab'=>$row->idkwarcab,
							'nama'=>$row->nama,
							'username' => $row->username, 
							'password'=>$row->password
				);
				 $this->session->set_userdata('super_admin',$sa);
				return $sa;
			}
		}
		public function form_kwaran($idkwaran='')
		{
			$data['idkwaran']=$idkwaran;
			$this->load->view('admin/form_kwaran',$data);
		}
		public function table_kwaran()
		{
			$s=$this->session();
			$idkwaran=$s['idkwaran'];
			$data['idkwaran']=$idkwaran;
			$data['kwaran']=$this->datakwaran->all($idkwaran);
			$this->load->view('admin/table_kwaran',$data);
		}
		public function delete($idkwaran)
		{
			$this->datakwaran->delete($idkwaran);
		}
		public function detail($idkwaran)
		{
			$kwaran=$this->datakwaran->where($idkwaran);
			echo json_encode($kwaran->result());
		}
		public function add()
		{
			$kwarcab=$this->sessionKwarcab();
			$data = array(
				'idkwaran' => $this->input->post('idkwaran'), 
				'nama_kwaran' => $this->input->post('nama_kwaran'), 
				'idkwarcab' => $kwarcab['idkwarcab'], 
				'username' => str_replace(' ','',$this->input->post('username')), 
				'password' => $this->input->post('password'), 
				'keterangan' => $this->input->post('keterangan'), 
				);

			$cek=$this->datakwaran->where($data['idkwaran']);
			if ($cek->result()!=null) {
				echo "ID Kwaran ".$data['idkwaran']." Sudah Digunakan";
			}
			else{
				$this->datakwaran->insert($data);
				echo 1;
			}
			
		}
		public function update()
		{
			$kwarcab=$this->sessionKwarcab();
			$data = array(
				'idkwaran' => $this->input->post('idkwaran'), 
				'nama_kwaran' => $this->input->post('nama_kwaran'), 
				'idkwarcab' => $kwarcab['idkwarcab'], 
				'username' => str_replace(' ','',$this->input->post('username')), 
				'password' => $this->input->post('password'), 
				'keterangan' => $this->input->post('keterangan'), 
				);
			$this->datakwaran->update($data);
			echo 1;

		}
		public function detailKwaran()
		{
			$idkwaran=$this->input->post('idkwaran');
			 // $rekap=$this->datakwaran->detailKwaran($idkwaran);
			$kwaran=$this->datakwaran->where($idkwaran);
			$data=$this->dataanggota->selectKwaran($idkwaran);
			
			  foreach($kwaran->result() as $row)
			  {
			  	$nama=$row->nama_kwaran;
			  	$kwaran= array(
			  		'kwaran' => $nama,
			  	);
			  	$newArray=array_merge($data,$kwaran);
			  	
				$this->load->view('modul/css');
			  	$x['konten']=$this->load->view('public/table_anggota',$newArray,true);
			  	$this->load->view('welcome_message',$x);
			  }
			

		}
	}