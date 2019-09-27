<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_lapor extends CI_Controller {

	function __construct(){
		parent::__construct();

		//Khusus Admin
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		} else if($this->session->userdata('level')!= "admin" ) {
			redirect(base_url('dashboard'));
		}
		$this->load->model('m_lapor');


	}

	public function index()
		{

			$data['judul']="Input Data";
			$data['nama_user'] = $this->session->userdata('nama');
			$this->load->view('page_dashboard',$data);
			$this->cek_menu($this->session->userdata('level'));
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
			 $data=$this->m_lapor->ambil_semua('t_lapor');
			 echo json_encode($data);
	 }


	 function ambilid($id)
		{

			 $data = $this->m_lapor->ambil_databyid($id);
			 echo json_encode($data);
		}

public function tambah()
{
	$data['judul']="Form Input Data";
	$data['nama_user'] = $this->session->userdata('nama');
	$this->load->view('page_dashboard',$data);
	$this->cek_menu($this->session->userdata('level'));
	$data['barcode'] = $this->m_lapor->kode_otomatis();
		 $this->load->view('from_input',$data);
}

function proses_tambah(){


$kode_otomatis = $this->m_lapor->kode_otomatis();
$this->load->library('ciqrcode'); //pemanggilan library QR CODE

	 $configs['cacheable']    = true; //boolean, the default is true
	 $configs['cachedir']     = './assets/'; //string, the default is application/cache/
	 $configs['errorlog']     = './assets/'; //string, the default is application/logs/
	 $configs['imagedir']     = './assets/qrbarcode/'; //direktori penyimpanan qr code
	 $configs['quality']      = true; //boolean, the default is true
	 $configs['size']         = '1024'; //interger, the default is 1024
	 $configs['black']        = array(224,255,255); // array, default is array(255,255,255)
	 $configs['white']        = array(70,130,180); // array, default is array(0,0,0)
	 $this->ciqrcode->initialize($configs);
	 $image_name=$kode_otomatis.'.png'; //buat name dari qr code sesuai dengan nim
	 $params['data'] = $kode_otomatis; //data yang akan di jadikan QR CODE
	 $params['level'] = 'H'; //H=High
	 $params['size'] = 10;
	 $params['savename'] = FCPATH.$configs['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
	 $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE



	//1 [nama_kelompok] => Budi Luhur
	$nama_kelompok = $_POST['nama_kelompok'];
	//2 [barcode] => BRKR0002
	$barcode = $_POST['barcode'];
	//3 [id_kecamatan] => 1
	$id_kecamatan = $_POST['id_kecamatan'];
	//4 [id_desa] => 2
	$id_desa = $_POST['id_desa'];
	//5 [id_komoditas] => 2
	$id_komoditas = $_POST['id_komoditas'];
	//6 [nama_ketua] => Sadiman Suwirnah
	$nama_ketua = $_POST['nama_ketua'];
	//7 [jumlah_anggota] => 10
	$jumlah_anggota = $_POST['jumlah_anggota'];
	//8 [sk_pengukuhan] => -
	$sk_pengukuhan = $_POST['sk_pengukuhan'];
	//9 [sk_kemenkuham] => -
	$sk_kemenkuham = $_POST['sk_kemenkuham'];
	//10 [id_kelas_kelompok] => 1
	$id_kelas_kelompok = $_POST['id_kelas_kelompok'];
	//11 [no_hp] => 08262514411
	$no_hp = $_POST['no_hp'];
	//12 [id_status] => aktif
	$id_status = $_POST['id_status'];
	//13 [tanggal_input] => 2019-08-18
	$tanggal_input = $_POST['tanggal_input'];
	//14 [keterangan] =>
	$keterangan = $_POST['keterangan'];

		$id_kelompok = $_POST['id_kelompok'];

	$data = array(
 'nama_kelompok' => $nama_kelompok ,
 'barcode' => $barcode ,
 'id_kecamatan' => $id_kecamatan,
 'id_desa' => $id_desa,
 'id_komoditas' => $id_komoditas,
 'nama_ketua' => $nama_ketua,
 'jumlah_anggota' => $jumlah_anggota,
 'sk_pengukuhan' => $sk_pengukuhan,
 'sk_kemenkuham' => $sk_kemenkuham,
 'id_kelas_kelompok' => $id_kelas_kelompok,
 'no_hp' => $no_hp,
 'status' => $id_status,
 'tanggal_input' => $tanggal_input,
 'keterangan' => $keterangan,
  'id_kelompok' => $id_kelompok
	);


$this->m_lapor->insert('t_lapor',$data);
	 redirect(base_url('t_lapor/'), 'refresh');
				 }


	 public function form_edit($id)
				 {
					 // echo $id;
					 $ambilid = $this->m_lapor->ambil_databyid($id);
					 // echo "<pre>";
					 // print_r($ambilid);
					 // echo "</pre>";

					 					// [id_lapor] => 1
										$data['id_lapor']= $ambilid[0]->id_lapor;
				            // [nama_kelompok] => Konco Tani
									  $data['nama_kelompok']= $ambilid[0]->nama_kelompok;
				            // [id_kecamatan_baru] => 3
									  $data['id_kecamatan_baru']= $ambilid[0]->id_kecamatan_baru;
				            // [nama_kecamatan] => Banyudono
										$data['nama_kecamatan']= $ambilid[0]->nama_kecamatan;
				            // [id_desa_baru] => 2
										$data['id_desa_baru']= $ambilid[0]->id_desa_baru;
				            // [nama_desa] => Kacangan
										$data['nama_desa']= $ambilid[0]->nama_desa;
				            // [id_komoditas_baru] => 2
										$data['id_komoditas_baru']= $ambilid[0]->id_komoditas_baru;
				            // [nama_komoditas] => Petani
										$data['nama_komoditas']= $ambilid[0]->nama_komoditas;
				            // [nama_ketua] => Nanang ,SE
										$data['nama_ketua']= $ambilid[0]->nama_ketua;
				            // [jumlah_anggota] => 12
										$data['jumlah_anggota']= $ambilid[0]->jumlah_anggota;
				            // [sk_pengukuhan] => -
										$data['sk_pengukuhan']= $ambilid[0]->sk_pengukuhan;
				            // [sk_kemenkuham] => -
										$data['sk_kemenkuham']= $ambilid[0]->sk_kemenkuham;
				            // [id_kelas_kelompok_baru] => 1
										$data['id_kelas_kelompok_baru']= $ambilid[0]->id_kelas_kelompok_baru;
										//	[nama_kelas_kelompok] => Pemula
										$data['nama_kelas_kelompok']= $ambilid[0]->nama_kelas_kelompok;
				            // [no_hp] => Pemula
										$data['no_hp']= $ambilid[0]->no_hp;
				            // [status] => aktif
										$data['status']= $ambilid[0]->status;
				            // [tanggal_input] => 2019-08-10
										$data['tanggal_input']= $ambilid[0]->tanggal_input;
				            // [keterangan] =>
										$data['keterangan']= $ambilid[0]->keterangan;

										$data['id_kelas_kelompok_baru']= $ambilid[0]->id_kelas_kelompok_baru;

										$data['nama_kelompok_baru']= $ambilid[0]->nama_kelompok_baru;

	 	$data['judul']="Form Edit Data";
 		$data['nama_user'] = $this->session->userdata('nama');
		$this->load->view('page_dashboard',$data);
		$this->cek_menu($this->session->userdata('level'));
		$data['barcode'] =  $ambilid[0]->barcode;
  	$where = array('id_lapor' =>$id , );
		$this->load->view('from_edit',$data);
				 }


function proses_ubah() {

		// 1[nama_kelompok] => Konco Tani
    // 2[id_lapor] => 1
    // 3[barcode] => BRKR0001
    // 4[id_kecamatan] => 3
    // 5[id_desa] => 2
    // // 6[id_kelompok] => 0
    // 6[id_komoditas] => 2
    // 7[nama_ketua] => Nanang ,SE
    // 8[jumlah_anggota] => 12
    // 9[sk_pengukuhan] => -
    // 10[sk_kemenkuham] => -
    // 11[id_kelas_kelompok] => 1
    // 12[no_hp] => 086567756
    // 13[id_status] => aktif
    // 14[tanggal_input] => 2019-08-10
    // 15[keterangan] =>
		$id_lapor = $_POST['id_lapor'];

		//1 [nama_kelompok] => Budi Luhur
		$nama_kelompok = $_POST['nama_kelompok'];
		//2 [barcode] => BRKR0002
		$barcode = $_POST['barcode'];
		//3 [id_kecamatan] => 1
		$id_kecamatan = $_POST['id_kecamatan'];
		//4 [id_desa] => 2
		$id_desa = $_POST['id_desa'];
		//5 [id_komoditas] => 2
		$id_komoditas = $_POST['id_komoditas'];
		//6 [nama_ketua] => Sadiman Suwirnah
		$nama_ketua = $_POST['nama_ketua'];
		//7 [jumlah_anggota] => 10
		$jumlah_anggota = $_POST['jumlah_anggota'];
		//8 [sk_pengukuhan] => -
		$sk_pengukuhan = $_POST['sk_pengukuhan'];
		//9 [sk_kemenkuham] => -
		$sk_kemenkuham = $_POST['sk_kemenkuham'];
		//10 [id_kelas_kelompok] => 1
		$id_kelas_kelompok = $_POST['id_kelas_kelompok'];
		//11 [no_hp] => 08262514411
		$no_hp = $_POST['no_hp'];
		//12 [id_status] => aktif
		$id_status = $_POST['id_status'];
		//13 [tanggal_input] => 2019-08-18
		$tanggal_input = $_POST['tanggal_input'];
		//14 [keterangan] =>
		$keterangan = $_POST['keterangan'];

		$id_kelompok = $_POST['id_kelompok'];


		$where = array('id_lapor' => $id_lapor,
						);


		$data = array(
					 'nama_kelompok' => $nama_kelompok ,
					 'barcode' => $barcode ,
					 'id_kecamatan' => $id_kecamatan,
					 'id_desa' => $id_desa,
					 'id_komoditas' => $id_komoditas,
					 'nama_ketua' => $nama_ketua,
					 'jumlah_anggota' => $jumlah_anggota,
					 'sk_pengukuhan' => $sk_pengukuhan,
					 'sk_kemenkuham' => $sk_kemenkuham,
					 'id_kelas_kelompok' => $id_kelas_kelompok,
					 'no_hp' => $no_hp,
					 'status' => $id_status,
					 'tanggal_input' => $tanggal_input,
					 'keterangan' => $keterangan,
					 'id_kelompok' => $id_kelompok
			);

			print_r($data);

		$this->m_lapor->update('t_lapor',$data,$where);
			redirect(base_url('t_lapor/'), 'refresh');
				 }



function hapus($id){
						$data = array('id_lapor' => $id,
						 				);
						$this->m_lapor->hapus('t_lapor',$data);
 						redirect(base_url('t_lapor/'), 'refresh');
					}

function data_kecamatan(){
			  			 $data=$this->m_lapor->ambil_kecamatan('m_alamat_kecamatan');
			  			 echo json_encode($data);
			  	 }

function data_desa($id){
					 			  			 $data=$this->m_lapor->ambil_desa('m_alamat_desa',$id);
					 			  			 echo json_encode($data);
					 			  	 }

function data_kelompok(){
			 	$data=$this->m_lapor->ambil_kelompok('m_kelompok');
			  echo json_encode($data);
				 }

 function data_komoditas($id){
				 			 $data=$this->m_lapor->ambil_komoditas('m_komoditas',$id);
				 			 echo json_encode($data);
				 			 }


function data_kelas_kelompok(){
					 $data=$this->m_lapor->ambil_kelas_kelompok('m_kelas_kelompok');
				   echo json_encode($data);
							 			  	 }


 public function cetak_surat($id)
															 {
																 // echo $id;
																 $ambilid = $this->m_lapor->ambil_databyid($id);
																 // echo "<pre>";
																 // print_r($ambilid);
																 // echo "</pre>";

																 					// [id_lapor] => 1
																					$data['id_lapor']= $ambilid[0]->id_lapor;
															            // [nama_kelompok] => Konco Tani
																				  $data['nama_kelompok']= $ambilid[0]->nama_kelompok;
															            // [id_kecamatan_baru] => 3
																				  $data['id_kecamatan_baru']= $ambilid[0]->id_kecamatan_baru;
															            // [nama_kecamatan] => Banyudono
																					$data['nama_kecamatan']= $ambilid[0]->nama_kecamatan;
															            // [id_desa_baru] => 2
																					$data['id_desa_baru']= $ambilid[0]->id_desa_baru;
															            // [nama_desa] => Kacangan
																					$data['nama_desa']= $ambilid[0]->nama_desa;
															            // [id_komoditas_baru] => 2
																					$data['id_komoditas_baru']= $ambilid[0]->id_komoditas_baru;
															            // [nama_komoditas] => Petani
																					$data['nama_komoditas']= $ambilid[0]->nama_komoditas;
															            // [nama_ketua] => Nanang ,SE
																					$data['nama_ketua']= $ambilid[0]->nama_ketua;
															            // [jumlah_anggota] => 12
																					$data['jumlah_anggota']= $ambilid[0]->jumlah_anggota;
															            // [sk_pengukuhan] => -
																					$data['sk_pengukuhan']= $ambilid[0]->sk_pengukuhan;
															            // [sk_kemenkuham] => -
																					$data['sk_kemenkuham']= $ambilid[0]->sk_kemenkuham;
															            // [id_kelas_kelompok_baru] => 1
																					$data['id_kelas_kelompok_baru']= $ambilid[0]->id_kelas_kelompok_baru;
																					//	[nama_kelas_kelompok] => Pemula
																					$data['nama_kelas_kelompok']= $ambilid[0]->nama_kelas_kelompok;
															            // [no_hp] => Pemula
																					$data['no_hp']= $ambilid[0]->no_hp;
															            // [status] => aktif
																					$data['status']= $ambilid[0]->status;
															            // [tanggal_input] => 2019-08-10
																					$data['tanggal_input']= $ambilid[0]->tanggal_input;
															            // [keterangan] =>
																					$data['keterangan']= $ambilid[0]->keterangan;
																						// $data['nama_kelompok_baru']= $ambilid[0]->id_kelompok;
																						$data['nama_kelompok_baru']= $ambilid[0]->nama_kelompok_baru;

												 	// $data['judul']="Form Edit Data";
											 		// $data['nama_user'] = $this->session->userdata('nama');
													// $this->load->view('page_dashboard',$data);
													// $this->cek_menu($this->session->userdata('level'));
													$data['barcode'] =  $ambilid[0]->barcode;
											  	// $where = array('id_lapor' =>$id , );
													$this->load->view('cetak_surat',$data);
															 }




}
