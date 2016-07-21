<?php 
	/**
	* 
	*/
	class Rekap extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('datakwaran');
			$this->load->model('dataanggota');
			$this->load->model('datagudep');
			$this->load->model('datarekap');
			$this->load->model('datakeahlian');
		}
		public function session()
		{
			 return $s=$this->session->userdata('admin');
			 
		}
		public function form_rekap()
		{
			$s=$this->session();
			$idkwaran=$s['idkwaran'];
			$data['kwaran']=$this->datakwaran->all($idkwaran);
			$data['gudep']=$this->datagudep->all($idkwaran);
			$data['golongan']=$this->dataanggota->golongan();
			$data['keahlian']=$this->datakeahlian->all();
			$this->load->view('admin/form_rekap',$data);
		}
		public function create_rekap()
		{
			$data = array(
				'idkwaran' => $this->input->post('kwaran'),
				'idgudep' => $this->input->post('gudep'),
				'golongan' => $this->input->post('golongan'),
				'keahlian' => $this->input->post('keahlian'),
			 );
			$idkwaran=$data['idkwaran'];
			$rekapKwaran['kwaran']=$this->datakwaran->detailKwaran($idkwaran)->result();
			$rekapAnggota['anggota']=$this->datarekap->sorting_anggota($data)->result();
			$e=array();
			$head='';
			$head.=$this->load->view('modul/css',$e,TRUE);
			$head.=$this->load->view('modul/js',$e,TRUE);
			$head.=$this->load->view('admin/header',$rekapKwaran,TRUE);
			$body=$this->load->view('admin/rekap',$rekapAnggota,TRUE);
			echo $head.$body;
			
		}
	}