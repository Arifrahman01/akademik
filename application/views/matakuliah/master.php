<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Master Matakuliah</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Mata</a></li>
          <li class="breadcrumb-item active">Master Matakuliah</li>
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
        <label >Kode Matakuliah</label>
        <input type="text" class="form-control" id="kd_matakuliah" placeholder="Kode Matakulaih">
      </div>
      <div class="form-group">
        <label >Nama Matakuliah</label>
        <input type="text" class="form-control" id="nama_matakuliah" placeholder="Nama Matakuliah">
      </div>
      
     
      <div class="form-group">
                  <label>Jumlah SKS</label>
                  <select class="form-control select2" id='sks_mt' style="width: 100%;">
                      <option value=''> - Jumlah SKS - </option>
                      <option value='1'>1</option>
                      <option value='2'>2</option>
                      <option value='3'>3</option>
                      <option value='4'>4</option>
                    </select>
                </div>
 
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit"  onclick = "save_kuliah()" id="bt-savematakuliah" class="btn btn-primary">Simpan</button>
    </div>
  <!-- </form> -->
</div>
