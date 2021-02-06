<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Mahasiswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Edit</a></li>
          <li class="breadcrumb-item active">Mahasiswa</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<?php 
$nim = $td_mahasiswa[0]->Nim;
$nama = $td_mahasiswa[0]->Nama_Mhs;
$alamat = $td_mahasiswa[0]->Alamat;
$tgl_lahir = $td_mahasiswa[0]->Tgl_Lahir;
$jk     = $td_mahasiswa[0]->Jenis_Kelamin;
?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Input</h3>
  </div>
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nim</label>
        <input type="text" disabled class="form-control" value="<?php echo $nim ?>" id="edt_nim_mhs" placeholder="Nomor Induk Mahasiswa">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nama Mahasiswa</label>
        <input type="text" class="form-control" value="<?php echo $nama ?>" id="edt_nama_mhs" placeholder="Nama Mahasiswa">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Alamat</label>
        <input type="text" class="form-control" value="<?php echo $alamat ?>" id="edt_alamat" placeholder="Alamat Mahasiswa">
      </div>
      
      <div class="form-group">
        <label>Tanggal Lahir</label>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
          </div>
          <input type="date" value="<?php echo $tgl_lahir ?>" id="date_lhr"class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
        </div>
      </div>

      <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2" id="jenis_kelamin" style="width: 100%;">
                      <option value=''> - Jenis Kelamin - </option>
                      <option value='Laki-laki' <?php echo ($jk=='Laki-laki')? 'Selected' :''  ?> >Laki-laki</option>
                      <option value='Perempuan' <?php echo ($jk=='Perempuan')? 'Selected' :''  ?>  >Perempuan</option>
                    </select>
                </div>
 
  <!-- </form> -->
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="" id='bt-saveeditmahasiswa' onclick="edit_save_mahasiswa()" class="btn btn-primary">Update</button>
    </div>
</div>
