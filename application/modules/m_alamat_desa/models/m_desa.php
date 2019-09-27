<?php

class M_desa extends CI_Model{


function ambil_semua($tabel){
    return $this->db->query('SELECT * FROM '.$tabel.'
 LEFT JOIN m_alamat_kecamatan on m_alamat_kecamatan.id_kecamatan =m_alamat_desa.id_kecamatan ORDER BY m_alamat_kecamatan.nama_kecamatan ASC')->result();

  }

  function ambil_kecamatan($tabel){
          $this->db->from($tabel);
          $this->db->order_by("nama_kecamatan", "asc");
          $query = $this->db->get();
          return $query->result();
    }





function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function ambilid($tabel,$where){
        return $this->db->query('SELECT * FROM '.$tabel.'
     LEFT JOIN m_alamat_kecamatan on m_alamat_kecamatan.id_kecamatan = m_alamat_desa.id_kecamatan WHERE m_alamat_desa.id_desa ='.$where);

      }


function update($tabel,$data,$where)
    {
      $this->db->where($where);
      $this->db->update($tabel,$data);
    }

function hapus($table,$data){
        $this->db->delete($table,$data);
    }
}
