<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('datakwaran');
		$data['kwaran']=$this->datakwaran->all($idkwaran=0);
		$this->load->view('modul/css');
		$data['konten']=$this->load->view('public/home',$data,TRUE);
		$this->load->view('welcome_message',$data);
	}
}
