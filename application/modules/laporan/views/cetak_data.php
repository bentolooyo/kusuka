<link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
<div class="container">
  <style type="text/css" media="print">

/* @page {

  size: landscape;
    left: 0;
} */
body {
    page-break-before: avoid;
    width:100%;
    height:100%;
    -webkit-transform: rotate(-90deg) scale(.70,.70);
    -moz-transform:rotate(-90deg) scale(.60,.60);
    zoom: 250%    }
  </style>
<table>
  <tr align="center">
    <td> <img src="<?php echo base_url('assets/gambar/logo.png') ?>" height="100" width="75"> </td>
    <td>
      <h4> <b>DINAS KELAUTAN DAN PERIKANAN</b> </h4>
      <h5> <b>KABUPATEN KARAWANG</b> </h5>
      <p>Alamat : Jl. Ir. Suratin No 1 Nagasari Kec. Karawang Bar. Kabupaten Karawang, Jawa Barat 41314</p>
    </td>

  </tr>
  <tr>
    <td colspan="2"> <hr> </td>
  </tr>

  <tr align="center">
    <td colspan="2"> <b>REKAPITULASI DATA:</b>  </td>
  </tr>
  <tr >
    <td colspan="3">
<p style="text-align: justify; text-indent: 0.5in; " >Rekap Data Tanggal  <b> <?php echo $tanggal_awal ?> Sampai <?php echo $tanggal_akhir; ?></b> </p>



  <table border="1" width="100%" class="table">

    <tr  bgcolor="#FCDF5D">
      <td rowspan="2"> <b>NO</b> </td>
      <td rowspan="2"><b>NAMA KELOMPOK</b> </td>
      <td colspan="2"><b>Alamat</b> </td>

      <td rowspan="2"><b>KOMODITAS USAHA</b> </td>
      <td rowspan="2"><b>NAMA KETUA</b> </td>
      <td rowspan="2"><b>JUMLAH ANGGOTA</b> </td>
      <td colspan="2"><b>STATUS HUKUM</b> </td>

      <td rowspan="2"><b>KELAS KELOMPOK</b> </td>
      <td rowspan="2"><b>NO HP</b> </td>
      <td rowspan="2"><b>STATUS</b> </td>
    </tr>
    <tr  bgcolor="#FCDF5D">
  <td><b>KECAMATAN</b> </td>
  <td><b>DESA</b> </td>
  <td><b>SK PENGUKUHAN</b> </td>
  <td><b>SK KEMENKUHAM</b> </td>

</tr>
<?php $no=0; foreach ($file as $k): $no++; ?>
<tr>
  <td><?php echo $no ?></td>
  <td><?php echo $k->nama_kelompok; ?></td>
    <td><?php echo $k->nama_kecamatan; ?></td>
      <td><?php echo $k->nama_kecamatan; ?></td>
            <td><?php echo $k->nama_komoditas; ?></td>
                  <td><?php echo $k->nama_ketua; ?></td>
                        <td><?php echo $k->jumlah_anggota; ?></td>
                              <td><?php echo $k->sk_pengukuhan; ?></td>
                          <td><?php echo $k->sk_kemenkuham; ?></td>
                          <td><?php echo $k->nama_kelas_kelompok; ?></td>
                            <td><?php echo $k->no_hp; ?></td>
                              <td><?php echo $k->status; ?></td>
</tr>
<?php endforeach; ?>
  </table>



   </td>
  </tr>
</table>

</div>


<script type="text/javascript">
  window.print();
  // window.href("<?php echo base_url('t_lapor/') ?>")
</script>
