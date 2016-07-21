<?php 
	/**
	* 
	*/
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('datakwaran');
			$this->load->model('dataadmin');
		}
		public function index()
		{
			$this->load->view('modul/css');
			$this->load->view('public/form_login');

		}
		public function auth()
		{
				$u=$this->input->post('username');
				$p=$this->input->post('password');
				$cek=$this->dataadmin->auth($u,$p);
				if($cek->result()!=null)
				{
					foreach ($cek->result() as $row)
					{
						$session = array(
							'username' => $row->username, 
							'password' => $row->password, 
							'level' => $row->level,
							'idkwaran' => 0,
							);
						$this->redirect($session);
					}
				}
				else
				{
					$cekKwaran=$this->datakwaran->auth($u,$p);
					if ($cekKwaran->result()!=null) 
					{
						foreach($cekKwaran->result() as $row)
						{
							$session = array(
								'username' => $row->username, 
								'password' => $row->password, 
								'level' => 1,
								'idkwaran' => $row->idkwaran,
							);
							$this->redirect($session);
						}
					}
					else
					{
						$this->session->set_flashdata('pesan','Login Gagal');
						redirect('login');
					}
				}
		}
		public function redirect($session)
		{
			$level=$session['level'];
			switch ($level) {
				case '0':
					$this->session->set_userdata('admin',$session);
					redirect('panel');
					break;
				case '1':
					$this->session->set_userdata('admin',$session);
					redirect('panel');
					break;
				default:
					$this->session->set_flashdata('pesan','Login Gagal');
					redirect('login');
					break;
			}
		}
	}