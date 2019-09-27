<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kelas_kelompok extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('m_kelas');


	}

	public function index()
		{

			$data['judul']="Master Kelas Kelompok";
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
			 $data=$this->m_kelas->ambil_semua('m_kelas_kelompok');
			 echo json_encode($data);
	 }


	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('id_kelas_kelompok' => $id,
										);

						$data = $this->m_kelas->ambilid('m_kelas_kelompok',$where)->result();

						echo json_encode($data);
		}


function proses_tambah(){
		 $nama_kelas_kelompok = $_POST['nama_kelas_kelompok'];


		 if($nama_kelas_kelompok == ''){
			 $result['pesan']='Nama Kelas Harus di isi !';
		 } else {
						 $result['pesan']='';
									 $data = array('nama_kelas_kelompok' => $nama_kelas_kelompok ,

										);
										 $this->m_kelas->insert('m_kelas_kelompok',$data);

								 }
								 echo json_encode($result);
				 }

function proses_ubah() {

					$nama_kelas_kelompok = $_POST['nama_kelas_kelompok'];

				 	$id = $_POST['id'];
				 	$where = array('id_kelas_kelompok' =>$id , );

				 	if($nama_kelas_kelompok == ''){
				 		$result['pesan']='Nama Kelas Kelompok Harus di isi !';
				 	}  else {
				 					$result['pesan']='';
									$data = array('nama_kelas_kelompok' => $nama_kelas_kelompok ,

									 );
				 									$this->m_kelas->update('m_kelas_kelompok',$data,$where);

				 							}
				 							echo json_encode($result);

				 }
function hapus(){
						$id = $_POST['id'];

						$data = array('id_kelas_kelompok' => $id,
						 				);
						$this->m_kelas->hapus('m_kelas_kelompok',$data);

					}
}
