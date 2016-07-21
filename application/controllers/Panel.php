<?php 
	/**
	* 
	*/
	class Panel extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$admin=$this->session->userdata('admin');
			if (empty($admin)) {
				redirect('login');
			}else{
				$this->load->model('dataanggota');
				$this->load->model('datagudep');
				$this->load->model('datakwaran');	
			}
			
		}
		public function logout()
		{
			$this->session->unset_userdata('admin');
			redirect('login');
		}
		public function session()
		{
			 return $s=$this->session->userdata('admin');
			
		}
		public function index()
		{
			$this->load->view('modul/css');
			$this->load->view('modul/js');
			$this->load->view('modul/datatable');
			$this->load->view('modul/select');
			$s=$this->session();
			$data['username']=$s['username'];
			echo $data['level']=$s['level'];
			$this->load->view('admin/navbar',$data);		
		}
		public function rekap()
		{

			$s=$this->session();
			$idkwaran=$s['idkwaran'];
			$data = array(
				'anggota' => count($this->dataanggota->all($idkwaran)->result()), 
				'gudep' => count($this->datagudep->all($idkwaran)->result()), 
				'kwaran' => count($this->datakwaran->all($idkwaran)->result()), 
				);
			echo json_encode($data);
		}
	}