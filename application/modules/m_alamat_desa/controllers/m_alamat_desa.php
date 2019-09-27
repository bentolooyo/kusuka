<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alamat_desa extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('m_desa');


	}

	public function index()
		{

			$data['judul']="Master Desa";
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
			 $data=$this->m_desa->ambil_semua('m_alamat_desa');
			 echo json_encode($data);
	 }

	 function data_kecamatan(){
 			 $data=$this->m_desa->ambil_kecamatan('m_alamat_kecamatan');
 			 echo json_encode($data);
 	 }


	 function ambilid()
		{
						$id = $_POST['id'];
						$where = array('m_alamat_desa.id_desa' => $id,
										);

						$data = $this->m_desa->ambilid('m_alamat_desa',$id)->result();


						echo json_encode($data);
		}


function proses_tambah(){
		 $nama_desa = $_POST['nama_desa'];
		 $id_kecamatan = $_POST['id_kecamatan'];


		 if($nama_desa  == ''){
			 $result['pesan']='Nama Desa Harus di isi !';
		 } else {
						 $result['pesan']='';
									 $data = array('nama_desa' => $nama_desa ,
									 'id_kecamatan' => $id_kecamatan ,

										);
										 $this->m_desa->insert('m_alamat_desa',$data);

								 }
								 echo json_encode($result);
				 }

function proses_ubah() {
	$nama_desa = $_POST['nama_desa'];
  $id_kecamatan = $_POST['id_kecamatan'];



				 	$id = $_POST['id'];
				 	$where = array('id_desa' =>$id , );

				 	if($nama_desa == ''){
				 		$result['pesan']='Nama Pengguna Harus di isi !';
				 	}  else {
				 					$result['pesan']='';
									$data = array('nama_desa' => $nama_desa ,
																'id_kecamatan' => $id_kecamatan,

									 );
				 									 $this->m_desa->update('m_alamat_desa',$data,$where);

				 							}
				 							echo json_encode($result);

				 }
function hapus(){
						$id = $_POST['id'];

						$data = array('id_desa' => $id,
						 				);
						$this->m_desa->hapus('m_alamat_desa',$data);

					}
}
