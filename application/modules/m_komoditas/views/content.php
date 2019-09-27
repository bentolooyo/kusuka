<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama_user ?></span>
            <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/gambar/logo.jpg">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h1 class="h3 mb-0 text-gray-800"><?php echo $judul ?></h1> -->
        <!-- <a href="http://localho st/phpmyadmin/db_export.php?db=invertory_barang" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Backup Database</a> -->
        <a href="#form" data-toggle="modal" onclick="submit('tambah')" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Komoditas</a>
      </div>

      <!-- Content Row -->
      <!-- <div class="row">

      </div> -->

      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo $judul ?></h6>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Kelompok</th>
                  <th>Nama Komoditas</th>
                  <th>Tools</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NO</th>
                  <th>Nama Kelompok</th>
                  <th>Nama Komoditas</th>
                  <th>Tools</th>
                </tr>
              </tfoot>
              <tbody id="tampil_data">


              </tbody>
            </table>
          </div>
        </div>
      </div>


    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy;Benny Danang Kurniawan 2019</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
    </div>
  </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>


<!-- =========================================================FORM =================================================================== -->

<div class="modal form" id="form" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h3>Master Komoditas</h3>
    </div>
    <a id="pesan" align="center"></a>

    <table class="table">
      <tr>
        <td>Nama Kelompok</td>
        <td>
          <!-- <input type="text" class="form-control"  name="nama_desa" placeholder="Nama Kecamatan"> -->
          <select class="form-control" id="id_kelompok" name="id_kelompok">

          </select>
        </td>
      </tr>

      <tr>
        <td>Nama Komoditas</td>
        <td> <input type="text" class="form-control"  name="nama_komoditas" placeholder="Nama Komoditas">
          <input type="hidden" class="form-control"  name="id" placeholder="Nama Pengguna">
        </td>
      </tr>

      <tr align='center'>
        <td colspan="2">
      <a href="#" id="btn-tambah" onclick="tambah_data();"class="btn btn-primary"><span class="fa fa-save"></span> Save</a>
        <a href="#" id="btn-ubah" onclick="ubah_data();"class="btn btn-primary"><span class="fa fa-eye"></span> Ubah Data</a>
      <a href="#" data-dismiss="modal" class="btn btn-danger"><span class="fa fa-times"></span> Cancel</a>
        </td>
        </tr>
    </table>
  </div>

</div>
</div>

<!-- =========================================================FORM =================================================================== -->

<!-- =========================================================FORM Detail =================================================================== -->

<div class="modal fade" id="form_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"><span class="fa fa-eye"></span> Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        						<label for="name">Nama Kecamatan</label>
        						<h4 id="nama"></h4>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- =========================================================FORM =================================================================== -->

<script type="text/javascript">

tampil_data();
//================================================== MENAMPILKAN DATA ==============================================================
function tampil_data(){

         $.ajax({
             type  : 'ajax',
             url   : '<?php echo base_url('m_komoditas/data'); ?>',
             async : false,
             dataType : 'json',
             success : function(data){

                 var html = '';
                 var i;
                 var no =0;
                 for(i=0; i<data.length; i++){

                   no ++;
                     html += '<tr>'+
                             '<td>'+no+'</td>'+
                             '<td>'+data[i].nama_kelompok+'</td>'+
                              '<td ondblclick="detail('+data[i].id_komoditas+')">'+data[i].nama_komoditas+'</td>'+
                             '<td style="text-align:right;">'+
                                   '<a href="#form" data-toggle="modal" class="btn btn-warning" onclick="submit('+data[i].id_komoditas+');"><i class="far fa-edit"></i></a>'+' '+
                                   '<a href="#" class="btn btn-danger btn-xs" onclick="hapus('+data[i].id_komoditas+');" ><i class="fa fa-trash" aria-hidden="true"></i></a>'+
                                 '</td>'+
                             '</tr>';
                 }
                 $('#tampil_data').html(html);
             }

         });
       }
//================================================== AKHIR MENAMPILKAN DATA ==============================================================
tampil_kelompok();
function tampil_kelompok(){
var awal='<option value=0>--Pilih Komoditas--</option>';
         $.ajax({
             type  : 'ajax',
             url   : '<?php echo base_url('m_komoditas/data_kelompok'); ?>',
             async : false,
             dataType : 'json',
             success : function(data){

                 var html = '';
                 var i;
                 var no =0;
                 for(i=0; i<data.length; i++){

                   no ++;
                     html += '<option value='+data[i].id_kelompok+'>'+data[i].nama_kelompok+'</option>';
                 }
                 $('#id_kelompok').html(awal+html);
             }

         });
       }
//================================================== AKHIR MENAMPILKAN DATA ==============================================================

//================================================== DETAIL DATA ==================================================================
      function detail(id) {
        console.log(id);
        $.ajax({
          type : 'POST',
          data : 'id='+id,
          url : '<?php echo base_url('m_alamat_kecamatan/ambilid'); ?>',
          success:function(hasil){
            //convert JSON parse

          obj = JSON.parse(hasil);
          console.log(hasil);
            $("#nama").html(obj[0]['nama_kecamatan']);
            $("#form_detail").modal('show');
          }

        });

      }
//================================================== AKHIR DETAIL DATA ==============================================================
      function submit(x) {
        if (x=='tambah') {
          $('#btn-tambah').show();
          $('#btn-ubah').hide();
            } else {
          $('#btn-tambah').hide();
          $('#btn-ubah').show();

          $.ajax({
            type : 'POST',
            data : 'id='+x,
            url : '<?php echo base_url('m_komoditas/ambilid'); ?>',
            success:function(hasil){
              //convert JSON parse
             console.log(hasil);
            obj = JSON.parse(hasil);
              $("input[name='id']").val(obj[0]['id_komoditas']);
              $("input[name='nama_komoditas']").val(obj[0]['nama_komoditas']);
            var awal='<option value='+obj[0]['id_kelompok']+' selected="selected">'+obj[0]['nama_kelompok']+'</option>';

                   $.ajax({
                       type  : 'ajax',
                       url   : '<?php echo base_url('m_komoditas/data_kelompok'); ?>',
                       async : false,
                       dataType : 'json',
                       success : function(data){

                           var html = '';
                           var i;
                           var no =0;
                           for(i=0; i<data.length; i++){

                             no ++;
                               html += '<option value='+data[i].id_kelompok+'>'+data[i].nama_kelompok+'</option>';
                           }
                           $('#id_kelompok').html(awal+html);

                       }

                   });
            }

          });
        }

      }


function tambah_data() {
  var nama_komoditas =$("input[name='nama_komoditas']").val();
  var id_kelompok =$("#id_kelompok").val();


      $.ajax({
      type:'POST',
      data: 'id_kelompok='+id_kelompok+'&nama_komoditas='+nama_komoditas,
      url: '<?php echo base_url('m_komoditas/proses_tambah') ?>',
      dataType:'json',
      success:function(hasil){

          if (hasil.pesan == '') {
          $('#form').modal('hide');
          tampil_data();
          //kosongkan om
          tampil_kelompok();
          $("input[name='nama_komoditas']").val('');

          } else {
          $('#pesan').html('<div class="alert alert-success"><strong>'+hasil.pesan+'</strong></div>');
          }

      }
      });
}


//===========================================================Ubah Data======================================================================

function ubah_data() {
  var nama_komoditas =$("input[name='nama_komoditas']").val();
  var id_kelompok =$("#id_kelompok").val();
  var id =$("input[name='id']").val();


  $.ajax({
  type:'POST',
  data: 'id='+id+'&nama_komoditas='+nama_komoditas+'&id_kelompok='+id_kelompok,
  url: '<?php echo base_url('m_komoditas/proses_ubah') ?>',
  dataType:'json',
  success:function(hasil){

      if (hasil.pesan == '') {
      $('#form').modal('hide');
      tampil_data();
      //kosongkan om
      tampil_kelompok();
      $("input[name='id']").val('');
      $("input[name='nama_kelompok']").val('');

      } else {
      $('#pesan').html('<div class="alert alert-success"><strong>'+hasil.pesan+'</strong></div>');
      }

  }
  });

}
//=========================================================Akhir Ubah===================================================================

function hapus(id) {
 var tanya =confirm('Apakah anda akan menghapus data ini ?');
 if (tanya) {
   $.ajax({
     type : 'POST',
     data : 'id='+id,
     url : '<?php echo base_url('m_alamat_desa/hapus'); ?>',
     success:function(hasil){
       //convert JSON parse
  tampil_data();
     }
   });
 }
}
</script>
