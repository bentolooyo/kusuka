<?php

class M_dashboard extends CI_Model{

public function jumlah_anggota()
{
return  $this->db->query('SELECT sum(jumlah_anggota) as jumlah_semua FROM t_lapor ')->result_array();
}


public function jumlah_kelompok()
{
return  $this->db->query('SELECT COUNT(id_lapor) as jumlah_kelompok FROM t_lapor WHERE status = "aktif"')->result_array();
}

public function jumlah_kelompok_ta()
{
return  $this->db->query('SELECT COUNT(id_lapor) as jumlah_kelompok_ta FROM t_lapor WHERE status = "tidak"')->result_array();
}

public function jumlah_seluruh_kelompok()
{
return  $this->db->query('SELECT COUNT(id_lapor) as jumlah_kelompok FROM t_lapor ')->result_array();
}

public function semua_bulan()
{
return  $this->db->query('SELECT DATE_FORMAT(tanggal_input, "%M") as bulan ,COUNT(*) AS jumlah_bulanan FROM t_lapor GROUP BY MONTH(tanggal_input)')->result();
}
}
