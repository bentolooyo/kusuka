<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();

		// print_r($this->session->userdata());
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		}
		$this->load->model('m_dashboard');


	}

	public function index()
		{

			$datas = $this->m_dashboard->jumlah_anggota();
			$datau = $this->m_dashboard->jumlah_kelompok();
			$datat = $this->m_dashboard->jumlah_kelompok_ta();
			$datav = $this->m_dashboard->jumlah_seluruh_kelompok();
			// print_r($datas[0]['jumlah_semua']);
			$data['jumlah_semua']=$datas[0]['jumlah_semua'];
			$data['jumlah_kelompok']=$datau[0]['jumlah_kelompok'];
			$data['jumlah_kelompok_ta']=$datat[0]['jumlah_kelompok_ta'];
			$data['jumlah_seluruh_kelompok']=$datav[0]['jumlah_kelompok'];
			$data['judul']="Dashboard Data Barang";
			$data['nama_user'] = $this->session->userdata('nama');
			$this->load->view('page_dashboard',$data);
			$this->cek_menu($this->session->userdata('level'));

			$data['semua_bulan'] = $this->m_dashboard->semua_bulan();

			 $this->load->view('content',$data);

	  }

	function cek_menu($status)
			{
						if($status == 'admin'){
						 $this->load->view('left_menu_admin');
						} else if ($status == 'maintenage'){
								 $this->load->view('left_menu_maintenage');
						} else {
								 $this->load->view('left_menu_user');

						}
			}

}
