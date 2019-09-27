<?php

class Md_komoditas extends CI_Model{


function ambil_semua($tabel){
    return $this->db->query('SELECT * FROM '.$tabel.'
 LEFT JOIN m_kelompok on m_kelompok.id_kelompok =m_komoditas.id_kelompok ORDER BY m_komoditas.nama_komoditas ASC')->result();

  }

  function ambil_kelompok($tabel){
          $this->db->from($tabel);
          $this->db->order_by("nama_kelompok", "asc");
          $query = $this->db->get();
          return $query->result();
    }



function insert($table,$data){
        $this->db->insert($table,$data);
    }

    function ambilid($tabel,$where){
        return $this->db->query('SELECT * FROM '.$tabel.'
LEFT JOIN m_kelompok on m_kelompok.id_kelompok =m_komoditas.id_kelompok WHERE m_komoditas.id_komoditas ='.$where);

      }
// function ambilid($tabel,$where)
//     {
//           return $this->db->get_where($tabel,$where);
//     }

function update($tabel,$data,$where)
    {
      $this->db->where($where);
      $this->db->update($tabel,$data);
    }

function hapus($table,$data){
        $this->db->delete($table,$data);
    }
}
