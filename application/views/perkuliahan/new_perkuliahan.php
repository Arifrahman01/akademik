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

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Input</h3>
  </div>
    <div class="card-body">

    <div class="form-group">
        <label >Nomor Induk Mahasiswa</label>
      
        <select class="form-control " id="nim_mhs" name="nim_mhs">
              <option value="">--Pilih Mahasiswa--</option>
              <?php
              if(isset($tb_mahasiswa)){
                  foreach ($tb_mahasiswa as $key => $value) {
                      ?>
                        <option value="<?php echo $value->Nim;?>"><?php echo '['.$value->Nim.'] - '.$value->Nama_Mhs;?></option>
                      <?php
                  }
              }
              ?> 
          </select>
      </div>
    
      <div class="form-group">
        <label >Mata Kuliah</label>
        <select class="form-control " id="nama_matakuliah" name="nama_matakuliah">
              <option value="">--Pilih Matakuliah--</option>
              <?php
              if(isset($tb_matakuliah)){
                  foreach ($tb_matakuliah as $key => $value) {
                      ?>
                        <option value="<?php echo $value->Kode_MK;?>"><?php echo '['.$value->Kode_MK.'] - '.$value->Nama_MK.'('.$value->Sks.' SKS)';?></option>
                      <?php
                  }
              }
              ?> 
          </select>
      </div>

      <div class="form-group">
        <label >Nama Dosen</label>
        <select class="form-control " id="nama_dosen" name="nama_dosen">
              <option value="">--Pilih Dosen--</option>
              <?php
              if(isset($tb_dosen)){
                  foreach ($tb_dosen as $key => $value) {
                      ?>
                        <option value="<?php echo $value->Nip;?>"><?php echo '['.$value->Nip.'] - '.$value->Nama_Dosen;?></option>
                      <?php
                  }
              }
              ?> 
          </select>
      </div>

      <div class="form-group">
        <label >Nilai</label>
        <input type="number" class="form-control" id="nilai_kuliah" placeholder="1 s/d 9">
      </div>
 
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" id='bt-saveperkuliahan'onclick="save_perkuliahan()" class="btn btn-primary">Simpan</button>
    </div>
  <!-- </form> -->
</div>
