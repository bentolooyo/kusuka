<link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<div class="container">

<table width="100%">
  <tr align="center">
    <td> <img src="<?php echo base_url('assets/gambar/logo.png') ?>" height="100" width="75"> </td>
    <td>
      <h4> <b>DINAS KELAUTAN DAN PERIKANAN</b> </h4>
      <h5> <b>KABUPATEN KARAWANG</b> </h5>
      <p>Alamat : Jl. Ir. Suratin No 1 Nagasari Kec. Karawang Bar. Kabupaten Karawang, Jawa Barat 41314</p>
    </td>
    <td>
       <img src="<?php  echo base_url(); ?>assets/qrbarcode/<?php echo $barcode.'.png' ?>" height="75" width="75">
       <br>
       <?php echo $barcode ?>
     </td>
  </tr>
  <tr>
    <td colspan="3"> <hr> </td>
  </tr>

  <tr align="center">
    <td colspan="3"> <b>SURAT TERINTERGRASI:</b>  </td>
  </tr>
  <tr >
    <td colspan="3">
<p style="text-align: justify; text-indent: 0.5in; " >Dengan Surat ini Menyatakan Bahwa: </p>
<p style="text-align: justify; text-indent: 1in; " >Nama Kelompok  : <b><?php echo $nama_kelompok; ?></b>  </p>
<p style="text-align: justify; text-indent: 1in; " >Ketua Kelompok : <b><?php echo $nama_ketua; ?></b>  </p>
<p style="text-align: justify; text-indent: 1in; " >Jumlah Anggota : <b><?php echo $jumlah_anggota; ?></b> Orang  </p>
<p style="text-align: justify; text-indent: 1in; " >Alamat Kelompok : <b>Desa. <?php echo $nama_kecamatan; ?> Kecamatan. <?php echo $nama_kecamatan; ?></b>  </p>
<p style="text-align: justify; text-indent: 1in; " >Jenis Kelompok : <b><?php echo $nama_kelompok_baru; ?></b>   </p>
<p style="text-align: justify; text-indent: 1in; " >Jenis Komoditas : <b><?php echo $nama_komoditas; ?></b> </p>
<p style="text-align: justify; text-indent: 1in; " >Kelas Komoditas : <b><?php echo $nama_kelas_kelompok; ?></b>   </p>
<p style="text-align: justify; text-indent: 1in; " >SK Pendukung : <b>SK Kemenkuham :<?php echo $sk_kemenkuham; ?>  SK Pengukuhan: <?php echo $sk_pengukuhan; ?></b>   </p>
<p style="text-align: justify; text-indent: 1in; " >Status Kelompok : <b><?php echo $status; ?></b>   </p>
<p style="text-align: justify; text-indent: 1in; " >Tanggal input : <b><?php echo $tanggal_input; ?></b>   </p>
<p style="text-align: justify; text-indent: 1in; " >Dengan Data di atas menjelaskan bahwa Kelompok tersebut sudah TERINTERGRASI dan terdaftar dalam sistem kami.  </p>
<p style="text-align: justify; text-indent: 1in; " >Adapun Tambahan data Pendukung akan di lampirkan dalam uraian berikut:  </p>
<div class="container">
<?php echo $keterangan; ?> </div>
<p style="text-align: justify; text-indent: 1in; " >Demikian Surat Intergrasi ini Kami buat sebenar-benarnya dan dapat di pertanggungjawabkan.  </p>
   </td>
  </tr>
</table>

</div>


<script type="text/javascript">
  window.print();
  // window.href("<?php echo base_url('t_lapor/') ?>")
</script>
