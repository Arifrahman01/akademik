<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Perkuliahan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Perkuliahan</a></li>
          <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<?php 

?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Input</h3>
  </div>
    <div class="card-body">
    <div class="form-group">
        <label for="exampleInputPassword1">Mahasiswa</label>
        <input type="text" disabled class="form-control" id="" value="<?php echo '['.$td_perkuliahan[0]->Nim.'] - '.$td_perkuliahan[0]->Nama_Mhs?>" placeholder="Alamat Mahasiswa">
        <input type="hidden" disabled class="form-control" id="edt-mhs" value="<?php echo $td_perkuliahan[0]->Nim ?>" >
      </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mata Kuliah</label>
        <input type="text" disabled class="form-control" id="" value="<?php echo '['.$td_perkuliahan[0]->Kode_MK.'] - '.$td_perkuliahan[0]->Nama_MK?>" placeholder="Alamat Mahasiswa">
        <input type="hidden" disabled class="form-control" id="edt-mk" value="<?php echo $td_perkuliahan[0]->Kode_MK; ?>" placeholder="Alamat Mahasiswa">
      </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Nama Dosen</label>
        <input type="text" disabled class="form-control" id="" value="<?php echo '['.$td_perkuliahan[0]->Nip.'] - '.$td_perkuliahan[0]->Nama_Dosen?>" placeholder="Alamat Mahasiswa">
        <input type="hidden" disabled class="form-control" id="edt-dosen" value="<?php echo $td_perkuliahan[0]->Nip ?>" >
      </div>
      <div class="form-group">
        <label >Nilai</label>
        <input type="number" class="form-control" value="<?php echo $td_perkuliahan[0]->Nilai ?>" id="edt_nilai" placeholder="">
      </div>
 
    </div>

    <div class="card-footer">
      <button type="submit" id='bt-saveeditperkuliahan' onclick="edit_save_perkuliahan()"  class="btn btn-primary">Simpan</button>
    </div>
  <!-- </form> -->
</div>
