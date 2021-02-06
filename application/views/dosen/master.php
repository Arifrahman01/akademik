<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Master Dosen</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Master</a></li>
          <li class="breadcrumb-item active">Master Dosen</li>
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

    <div class="form-group">
        <label for="exampleInputPassword1">Nomor Induk Pegawai</label>
        <input type="text" class="form-control" maxlength id="nip_dosen" placeholder="Nomor Induk Pegawai">
      </div>
    
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Dosen</label>
        <input type="text" class="form-control" id="nama_dosen" placeholder="Nama Dosen">
      </div>
 
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" onclick="save_dosen()" id="bt-savedosen" class="btn btn-primary">Simpan</button>
    </div>
  <!-- </form> -->
</div>
