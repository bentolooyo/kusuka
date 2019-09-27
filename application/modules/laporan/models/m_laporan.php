<?php

class M_laporan extends CI_Model{

function ambil_semua($tabel){
    return $this->db->query('SELECT
id_lapor, nama_kelompok,
t_lapor.id_kecamatan, nama_kecamatan,
t_lapor.id_desa, nama_desa,
t_lapor.id_komoditas,nama_komoditas,
t_lapor.id_kelas_kelompok, nama_kelas_kelompok,
nama_ketua,sk_pengukuhan,sk_kemenkuham
id_kelas_kelompok, nama_kelompok,
no_hp,status,no_hp, barcode
FROM t_lapor
LEFT JOIN m_alamat_kecamatan ON m_alamat_kecamatan.id_kecamatan = t_lapor.id_kecamatan
LEFT JOIN m_alamat_desa ON m_alamat_desa.id_desa = t_lapor.id_desa
LEFT JOIN m_komoditas ON m_komoditas.id_komoditas = t_lapor.id_komoditas
LEFT JOIN m_kelas_kelompok ON m_kelas_kelompok.id_kelas_kelompok = t_lapor.id_kelas_kelompok ORDER BY id_kecamatan
')->result();

  }

public function ambil_cari($cari)
{

 return  $this->db->query($cari)->result();
}

  function ambil_kecamatan($tabel){
          $this->db->from($tabel);
          $this->db->order_by("nama_kecamatan", "asc");
          $query = $this->db->get();
          return $query->result();
    }

    function ambil_desa($tabel,$id){

            $query = $this->db->query('SELECT * FROM '.$tabel.' WHERE id_kecamatan = '.$id.' ORDER BY nama_desa ASC');
            return $query->result();
      }

      function ambil_kelompok($tabel){
              $this->db->from($tabel);
              $this->db->order_by("nama_kelompok", "asc");
              $query = $this->db->get();
              return $query->result();
        }

        function ambil_kelas_kelompok($tabel){
                $this->db->from($tabel);
                $this->db->order_by("nama_kelas_kelompok", "asc");
                $query = $this->db->get();
                return $query->result();
          }



            function ambil_komoditas($tabel,$id){

                    $query = $this->db->query('SELECT * FROM '.$tabel.' WHERE id_kelompok = '.$id.' ORDER BY nama_komoditas ASC');
                    return $query->result();
              }

    function kode_otomatis()
        {
          $this->db->select('RIGHT(t_lapor.barcode,4) as kode',false);
          $this->db->limit(1);
          $this->db->order_by('barcode','DESC');
          $query = $this->db->get('t_lapor');
          if($query->num_rows()<>0){
            $data = $query->row();
            $kode= intval($data->kode)+1;
          }else {
            $kode=1;
          }
          $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
          $kodejadi = "BRKR".$kodemax;
          return $kodejadi;
        }

    function insert($table,$data){
            $this->db->insert($table,$data);
            }
   function hapus($table,$data){
                $this->db->delete($table,$data);
                }

function ambil_databyid($id)
{

      return $this->db->query('SELECT
  id_lapor, t_lapor.nama_kelompok as nama_kelompok ,barcode,
  t_lapor.id_kecamatan as id_kecamatan_baru, nama_kecamatan,
  t_lapor.id_desa as id_desa_baru, nama_desa,
  t_lapor.id_komoditas as id_komoditas_baru,nama_komoditas,
  t_lapor.id_kelompok as id_kelompok_baru,m_kelompok.nama_kelompok as nama_kelompok_baru,
  nama_ketua,
  jumlah_anggota,
  sk_pengukuhan,sk_kemenkuham,
  t_lapor.id_kelas_kelompok as id_kelas_kelompok_baru, nama_kelas_kelompok,
  no_hp,
  status,
  tanggal_input,
  keterangan
  FROM t_lapor
  LEFT JOIN m_alamat_kecamatan ON m_alamat_kecamatan.id_kecamatan = t_lapor.id_kecamatan
  LEFT JOIN m_alamat_desa ON m_alamat_desa.id_desa = t_lapor.id_desa
  LEFT JOIN m_komoditas ON m_komoditas.id_komoditas = t_lapor.id_komoditas
  LEFT JOIN m_kelompok ON m_kelompok.id_kelompok = t_lapor.id_kelompok
  LEFT JOIN m_kelas_kelompok ON m_kelas_kelompok.id_kelas_kelompok = t_lapor.id_kelas_kelompok  WHERE id_lapor =
  '.$id)->result();


}

function update($tabel,$data,$where)
    {
      $this->db->where($where);
      $this->db->update($tabel,$data);
    }

}
