

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Matakuliaah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item active">List Matakuliah</li>
            </ol>
          </div>
        </div>
    </section>



<section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Matakuliah</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" id="table_search" class="form-control float-right" value ="<?php echo $this->input->get('q')? base64_decode($this->input->get('q')):'' ?>"  placeholder="Pencarian">

                      <div class="input-group-append">
                      <button type="" onclick="search('home/list_matakuliah')" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>Jumlah SKS</th>
                    <th>Aksi</th>
                  </tr>
                  <?php 
                  $no=$this->input->get('p')?((($this->input->get('p')-1)*5)+1):'1';
                   foreach ($td_matakuliah as $key => $value) {
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$value->Kode_MK."</td>";
                    echo "<td>".$value->Nama_MK."</td>";
                    echo "<td>".$value->Sks."</td>";
                    echo  '<td> <a ><i onclick="Edit_matakuliah(\''.$value->Kode_MK.'\')"; title="Ubah" class="fa fa-edit text-success text-active"></i></a> | <a id="bt-hapus'.$value->Kode_MK.'" ><i  title="Hapus" onclick="hapus_matakuliah(\''.$value->Kode_MK.'\')";  class="fa fa-trash text-danger text-active"></i></a></td>';
                    echo "</tr>";
                    $no++;
                  }
                  ?>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
  
      <ul class="pagination">
    
        <?php
         $page= $paging['page']?$paging['page']:1;
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled page-item"><a class="page-link" href="#">First</a></li>
          <li class="disabled page-item"><a class="page-link" href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li class="page-item"><a class="page-link"  href="<?php echo base_url('home/list_matakuliah?p=1')?>">First</a></li>
          <li class="page-item"><a class="page-link" href="<?php echo base_url('home/list_matakuliah?p='.$link_prev)?>">&laquo;</a></li>
        <?php
        }
        ?>
     
        <?php
        
        $get_jumlah = $paging['total']?$paging['total']:1;
        // var_dump($get_jumlah);
        $jumlah_page = ceil($get_jumlah / 5); // Hitung jumlah halamannya
        $jumlah_number = 2; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? 'active' : '';
        ?>
          <li class="page-item  <?php echo $link_active;?>"><a class="page-link" href="<?php echo base_url('home/list_matakuliah?p='.$i)?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        <?php
        if($page == $jumlah_page){ 
        ?>
          <li class="disabled page-item"><a class="page-link" href="#">&raquo;</a></li>
          <li class="disabled page-item"><a class="page-link" href="#">Last</a></li>
        <?php
        }else{ 
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li class="page-item"><a class="page-link" href="<?php echo base_url('home/list_matakuliah=p'.$link_next) ?>">&raquo;</a></li>
          <li class="page-item"><a class="page-link" href="<?php echo base_url('home/list_matakuliah?p='.$jumlah_page); ?>">Last</a></li>
        <?php
        }
        ?>
      </ul>
