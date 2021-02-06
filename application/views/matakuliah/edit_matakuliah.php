<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Master</a></li>
          <li class="breadcrumb-item active">Edit Matakuliah</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form Input</h3>
  </div>

<?php 
$kode_mk  = $td_matakuliah[0]->Kode_MK;
$nama_mk  = $td_matakuliah[0]->Nama_MK;
$sks  = $td_matakuliah[0]->Sks;

?>
    <div class="card-body">
      <div class="form-group">
        <label >Kode Matakuliah</label>
        <input type="text" readonly value="<?php echo $kode_mk ?>" class="form-control" id="edt_kdmatakuliah" placeholder="Kode Matakulaih">
      </div>
      <div class="form-group">
        <label >Nama Matakuliah</label>
        <input type="text" class="form-control" value="<?php echo $nama_mk?>" id="edt_namamatakuliah" placeholder="Nama Matakuliah">
      </div>
      
     
      <div class="form-group">
                  <label>Jumlah SKS</label>
                  <select class="form-control select2" id='edt_sks' style="width: 100%;">
                      <option value=''> - Jumlah SKS - </option>
                      <option value='1'<?php echo ($sks==1)?'selected':''?> >1</option>
                      <option value='2'<?php echo ($sks==2)?'selected':''?> >2</option>
                      <option value='3'<?php echo ($sks==3)?'selected':''?> >3</option>
                      <option value='4'<?php echo ($sks==4)?'selected':''?> >4</option>
                    </select>
                </div>
 
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit"  onclick = "edit_save_matakuliah()" id="bt-savematakuliah" class="btn btn-primary">Simpan</button>
    </div>
  <!-- </form> -->
</div>
