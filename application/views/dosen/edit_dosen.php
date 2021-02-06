<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dosen</a></li>
          <li class="breadcrumb-item active">Edit Dosen</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Input</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <!-- <form role="form"> -->
    <div class="card-body">
<?php 
$nip = $td_dosen[0]->Nip;
$nama = $td_dosen[0]->Nama_Dosen;
?>
    <div class="form-group">
        <label for="">Nomor Induk Pegawai</label>
        <input type="text" readonly class="form-control" value="<?php echo $nip?>" maxlength id="nip_dosen" placeholder="Nomor Induk Pegawai">
      </div>
    
      <div class="form-group">
        <label for="">Nama Dosen</label>
        <input type="text" class="form-control" value="<?php echo $nama?>" id="nama_dosen" placeholder="Nama Dosen">
      </div>
 
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" onclick="edit_save_dosen()" id="bt-savedosen" class="btn btn-primary">Update</button>
    </div>
  <!-- </form> -->
</div>
