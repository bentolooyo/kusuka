<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_komoditas extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('md_komoditas');


	}

	public function index()
		{

			$data['judul']="Master Komoditas";
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
			 $data=$this->md_komoditas->ambil_semua('m_komoditas');
			 echo json_encode($data);
	 }

	 function data_kelompok(){
 			 $data=$this->md_komoditas->ambil_kelompok('m_kelompok');
 			 echo json_encode($data);
 	 }


	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('m_komoditas.id_komoditas' => $id,
										);

						$data = $this->md_komoditas->ambilid('m_komoditas',$id)->result();


						echo json_encode($data);
		}


function proses_tambah(){
		 $nama_komoditas = $_POST['nama_komoditas'];
		 $id_kelompok = $_POST['id_kelompok'];


		 if($nama_komoditas  == ''){
			 $result['pesan']='Nama Komoditas Harus di isi !';
		 } else {
						 $result['pesan']='';
									 $data = array('nama_komoditas' => $nama_komoditas ,
									 'id_kelompok' => $id_kelompok ,

										);
										 $this->md_komoditas->insert('m_komoditas',$data);

								 }
								 echo json_encode($result);
				 }

function proses_ubah() {
	$nama_komoditas = $_POST['nama_komoditas'];
	$id_kelompok = $_POST['id_kelompok'];



				 	$id = $_POST['id'];
				 	$where = array('id_komoditas' =>$id , );

				 	if($nama_komoditas == ''){
				 		$result['pesan']='Nama Komoditas Harus di isi !';
				 	}  else {
				 					$result['pesan']='';
									$data = array('nama_komoditas' => $nama_komoditas ,
 								 'id_kelompok' => $id_kelompok ,

 									);
				 									 $this->md_komoditas->update('m_komoditas',$data,$where);

				 							}
				 							echo json_encode($result);

				 }
function hapus(){
						$id = $_POST['id'];

						$data = array('id_komoditas' => $id,
						 				);
						$this->md_komoditas->hapus('m_komoditas',$data);

					}
}
