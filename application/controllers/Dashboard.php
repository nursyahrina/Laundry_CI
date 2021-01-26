<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		// cek sesi login
		if ($this->session->userdata('status') != "login") {
			redirect(base_url().'welcome?pesan=belumlogin');
		}
		$this->load->model('data_karyawan');
		$this->load->model('data_pelanggan');
		/*$this->load->model('data_matakuliah');
		$this->load->model('data_krs');
		$this->load->model('data_tahun_akademik');*/
	}

	public function index()
	{
		$user['username'] = $this->session->userdata('username');
		$data = array(
					'n_karyawan' => $this->data_karyawan->count_rows(),
					'n_pelanggan' => $this->data_pelanggan->count_rows()/*,
					'n_matakuliah' => $this->data_matakuliah->count_rows(),
					'n_krs' => $this->data_krs->count_rows(),
					'n_ta' => $this->data_tahun_akademik->count_rows()*/
				);

		$this->load->view('header');
		$this->load->view('navigation', $user);
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
		$this->load->view('source');
	}
}
