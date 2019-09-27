<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alamat_kecamatan extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('m_kecamatan');


	}

	public function index()
		{

			$data['judul']="Master Kecamatan";
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
			 $data=$this->m_kecamatan->ambil_semua('m_alamat_kecamatan');
			 echo json_encode($data);
	 }


	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('id_kecamatan' => $id,
										);

						$data = $this->m_kecamatan->ambilid('m_alamat_kecamatan',$where)->result();

						echo json_encode($data);
		}


function proses_tambah(){
		 $nama_kecamatan = $_POST['nama_kecamatan'];


		 if($nama_kecamatan == ''){
			 $result['pesan']='Nama Kecamatan Harus di isi !';
		 } else {
						 $result['pesan']='';
									 $data = array('nama_kecamatan' => $nama_kecamatan ,

										);
										 $this->m_kecamatan->insert('m_alamat_kecamatan',$data);

								 }
								 echo json_encode($result);
				 }

function proses_ubah() {

					 $nama_kecamatan = $_POST['nama_kecamatan'];

				 	$id = $_POST['id'];
				 	$where = array('id_kecamatan' =>$id , );

				 	if($nama_kecamatan == ''){
				 		$result['pesan']='Nama Pengguna Harus di isi !';
				 	}  else {
				 					$result['pesan']='';
									$data = array('nama_kecamatan' => $nama_kecamatan ,

									 );
				 									$this->m_kecamatan->update('m_alamat_kecamatan',$data,$where);

				 							}
				 							echo json_encode($result);

				 }
function hapus(){
						$id = $_POST['id'];

						$data = array('id_kecamatan' => $id,
						 				);
						$this->m_kecamatan->hapus('m_alamat_kecamatan',$data);

					}
}
