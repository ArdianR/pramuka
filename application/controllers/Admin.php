<?php 
	/**
	* 
	*/
	class Admin extends CI_Controller
	{
		
		function __construct()
		{
				parent::__construct();
				$this->load->model('dataadmin');
		}
		
		public function form_admin()
		{
			$data['admin']=$this->dataadmin->where();
			$this->load->view('admin/form_admin',$data);
		}
		public function update()
		{
			$password=$this->input->post('password');
			if (empty($password)) {
				$data = array('username' => $this->input->post('username'));
				$this->dataadmin->update($data);
				echo 1;
			}else{
				$data = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password'))
					);
				$this->dataadmin->update($data);
				echo 1;
			}
		}
	}