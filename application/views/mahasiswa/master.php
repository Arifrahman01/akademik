<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Master Mahasiswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Master</a></li>
          <li class="breadcrumb-item active">Master Mahasiswa</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Input</h3>
  </div>
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nim</label>
        <input type="text" class="form-control" id="nim_mhs" placeholder="Nomor Induk Mahasiswa">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="nama_mhs" placeholder="Nama Mahasiswa">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Alamat</label>
        <input type="text" class="form-control" id="alamat" placeholder="Alamat Mahasiswa">
      </div>
      
      <div class="form-group">
        <label>Tanggal Lahir</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
          </div>
          <input type="date" id="date_lhr"class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
        </div>
      </div>

      <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2" id="jenis_kelamin" style="width: 100%;">
                      <option value=''> - Jenis Kelamin - </option>
                      <option value='Laki-laki'>Laki-laki</option>
                      <option value='Perempuan'>Perempuan</option>
                    </select>
                </div>
 
  <!-- </form> -->
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="" id='bt-savemhs' onclick="save_mhs()" class="btn btn-primary">Simpan</button>
    </div>
</div>
