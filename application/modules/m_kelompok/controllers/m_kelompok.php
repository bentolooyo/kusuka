<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelompok extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('md_kelompok');


	}

	public function index()
		{

			$data['judul']="Master Kelompok Unit";
			$data['nama_user'] = $this->session->userdata('nama');
			 $this->load->view('page_dashboard',$data);
			 	$this->cek_menu($this->session->userdata('level'));
			  // $this->load->view('left_menu',$data);
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


	function data(){
			 $data=$this->md_kelompok->ambil_semua('m_kelompok');
			 echo json_encode($data);
	 }


	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('id_kelompok' => $id,
										);

						$data = $this->md_kelompok->ambilid('m_kelompok',$where)->result();

						echo json_encode($data);
		}


function proses_tambah(){
		 $nama_kelompok = $_POST['nama_kelompok'];


		 if($nama_kelompok == ''){
			 $result['pesan']='Nama Kelompok Harus di isi !';
		 } else {
						 $result['pesan']='';
									 $data = array('nama_kelompok' => $nama_kelompok ,

										);
										 $this->md_kelompok->insert('m_kelompok',$data);

								 }
								 echo json_encode($result);
				 }

function proses_ubah() {

					 $nama_kelompok = $_POST['nama_kelompok'];

				 	$id = $_POST['id'];
				 	$where = array('id_kelompok' =>$id , );

				 	if($nama_kelompok == ''){
				 		$result['pesan']='Nama Kelompok Harus di isi !';
				 	}  else {
				 					$result['pesan']='';
									$data = array('nama_kelompok' => $nama_kelompok ,

									 );
				 									$this->md_kelompok->update('m_kelompok',$data,$where);

				 							}
				 							echo json_encode($result);

				 }
function hapus(){
						$id = $_POST['id'];

						$data = array('id_kelompok' => $id,
						 				);
						$this->md_kelompok->hapus('m_kelompok',$data);

					}
}
