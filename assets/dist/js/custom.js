$(document).ready( function () {
    var url = $(location).attr('href');
    var url1 = url.split("?");
    var res = url1[0].split("/");
    if (res[5]=='perkuliahan') {
         $('#head_perkuliahann').addClass('menu-open');
         $('#nav_addkuliah').addClass('active');
    }else if (res[5]=='list_perkuliahan') {
        $('#head_perkuliahann').addClass('menu-open');
        $('#nav_list_kuliah').addClass('active');
    }else if (res[5]=='list_mahasiswa') {
        $('#head_mahasiswa').addClass('menu-open');
        $('#nav_list_mahasiswa').addClass('active');
    }else if (res[5]=='master_mahasiswa') {
        $('#head_mahasiswa').addClass('menu-open');
        $('#nav_master_mahasiswa').addClass('active');
    }else if (res[5]=='list_dosen') {
        $('#head_dosen').addClass('menu-open');
        $('#nav_list_dosen').addClass('active');
    }else if (res[5]=='master_dosen') {
        $('#head_dosen').addClass('menu-open');
        $('#nav_master_dosen').addClass('active');
    }else if (res[5]=='list_matakuliah') {
        $('#head_matakuliah').addClass('menu-open');
        $('#nav_list_matakuliah').addClass('active');
    }else if (res[5]=='master_matakuliah') {
        $('#head_matakuliah').addClass('menu-open');
        $('#nav_master_matakuliah').addClass('active');
    }
  });
var getUrl = window.location;
var http = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];


  function save_mhs(){
      var nim = $('#nim_mhs').val();
      var nama = $('#nama_mhs').val();
      var tgl_lahir = $('#date_lhr').val();
      var jkelamin = $('#jenis_kelamin option:selected').val();
      var alamat = $('#alamat').val();
     if (!nim) {
        ToastInfo('NIM tidak boleh kosong')
        $('#nim_mhs').focus();
    }else if (!nama) {
        ToastInfo('Nama tidak boleh kosong')
        $('#nama_mhs').focus();
    }else if (!tgl_lahir) {
        ToastInfo('Tanggal lahir tidak boleh kosong')
        $('#date_lhr').focus();
    }else if (!jkelamin) {
        ToastInfo('jenis kelamin tidak boleh kosong')
        $('#jenis_kelamin').focus();
    }else if (nim.length < 5 || nim.length > 12) {
        ToastInfo('NIM tidak Valid')
        $('#nim_mhs').focus();
    }else if (!alamat) {
        ToastInfo('Alamat tidak bolah kosong')
        $('#alamat').focus();
    }else{
        $("#bt-savemhs").html("<span class='fa fa-spinner fa-spin'></span>   Loading");
        $.ajax({
            url: http+'/home/save_mahasiswa',
            type: "POST",
            data: {
                'nim' : nim,
                'nama': nama,
                'tgl_lahir':tgl_lahir,
                'jkelamin' : jkelamin,
                'alamat'  : alamat
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.replace(http+'/home/list_mahasiswa');
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){				
                        $("#bt-savemhs").html("Simpan")
                    },1000);
                }
            }
            });

    }
  }

  function save_dosen(){
      var nip           = $('#nip_dosen').val();
      var nama_dosen    = $('#nama_dosen').val();
      if (!nip) {
        ToastInfo('NIP tidak boleh kosong')
        $('#nip_dosen').focus();
    }else if (!nama_dosen) {
          ToastInfo('Nama tidak boleh kosong')
          $('#nama_dosen').focus();     
    }else if (nip.length <5 || nip.length > 12 ) {
        ToastInfo('NIP tidak Valid')
        $('#nip_dosen').focus();     
    }else{
        $("#bt-savedosen").html("<span class='fa fa-spinner fa-spin'></span>   Loading");
        $.ajax({
            url: http+'/home/save_dosen',
            type: "POST",
            data: {
                'nip' : nip,
                'nama_dosen': nama_dosen
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.replace(http+'/home/list_dosen');		
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){		
                        $("#bt-savedosen").html("Simpan")
                    },1000);
                }
            }
            });
    }
  }

  function save_kuliah(){
      var kdmt = $('#kd_matakuliah').val()
      var namamt = $('#nama_matakuliah').val()
      var sks = $('#sks_mt  option:selected').val()
      
    if (!kdmt) {
    ToastInfo('Kode matakuliah tidak boleh kosong')
    $('#kd_matakuliah').focus();     
    }else if (!namamt) {
    ToastInfo('Nama matakulaih tidak boleh kosong')
        $('#nama_matakuliah').focus();
    }else if (!sks) {
        ToastInfo('SKS tidak boleh kosong')
        $('#sks_mt').focus();
    }else if (kdmt.length < 3 || kdmt > 6) {
        ToastInfo('Kode matakuliah tidak valid')
        $('#kd_matakuliah').focus();
    }else{
        $("#bt-savematakuliah").html("<span class='fa fa-spinner fa-spin'></span>   Loading");
        $.ajax({
            url: http+'/home/save_matakuliah',
            type: "POST",
            data: {
                'kode_mk' : kdmt,
                'nama_mk': namamt,
                'sks'   : sks
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.replace(http+'/home/list_matakuliah');					
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){
                        $("#bt-savematakuliah").html("Simpan")		
                    },1000);
                }
            }
            });



    }

  }

  function save_perkuliahan(){
      var nim_mhs           = $('#nim_mhs  option:selected').val()
      var nama_matakuliah   = $('#nama_matakuliah  option:selected').val()
      var nama_dosen        = $('#nama_dosen  option:selected').val()
      var nilai_kuliah      = $('#nilai_kuliah').val()

      if (!nim_mhs) {
        ToastInfo('Silahkan Pilih Mahasiswa')
        $('#nim_mhs').focus();    
    }else if(!nama_matakuliah){
          ToastInfo('Silahkan Pilih Matakuliah')
          $('#nama_matakuliah').focus();      
    }else if (!nama_dosen) {
        ToastInfo('Silahkan Pilih Dosen')
        $('#nama_dosen').focus();    
    }else if (!nilai_kuliah) {
        ToastInfo('Nilai Wajib di isi')
        $('#nilai_kuliah').focus();   
    }else if (nilai_kuliah > 9) {
        ToastInfo('Nilai melebihi batas maximal = 9 ')
        $('#nilai_kuliah').focus();   
    }else{
        $("#bt-saveperkuliahan").html("<span class='fa fa-spinner fa-spin'></span>   Loading");
        $.ajax({
            url: http+'/home/save_perkuliahan',
            type: "POST",
            data: {
               'nim'    : nim_mhs,
               'nama_matkul' : nama_matakuliah,
               'nama_dosen' : nama_dosen,
               'nilai_kuliah' : nilai_kuliah
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.replace(http+'/home/list_perkuliahan');		
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){
                        $("#bt-saveperkuliahan").html("Simpan")			
                    },1000);
                }
            }
            });

    }
  }
//   ------------------------ // 
  function hapus_perkuliahan(nim,kode_mk,nip){
    var txt;
    var r = confirm("Hapus Data Perkuliahan?");
    if (r == true) {
        $("#bt-hapus"+nim).html("<span class='fa fa-spinner fa-spin'></span> ");
        $.ajax({
            url: http+'/home/delete_perkuliahan',
            type: "POST",
            data: {
               'nim'    : nim,
               'kode_mk' : kode_mk,
               'nip' : nip,
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                }
            }
            });

    }

  }
  function hapus_mahasiswa(nim){
    var r = confirm("Hapus Data Mahasiswa(" +nim+ ")  ?");
    if (r == true) {
        $("#bt-hapus"+nim).html("<span class='fa fa-spinner fa-spin'></span> ");
        $.ajax({
            url: http+'/home/delete_mahasiswa',
            type: "POST",
            data: {
               'nim'    : nim
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                }
            }
            });

    }

  }
  function hapus_dosen(nip){
    var r = confirm("Hapus Data Dosen (" +nip+ ")  ?");
    if (r == true) {
        $("#bt-hapus"+nip).html("<span class='fa fa-spinner fa-spin'></span> ");
        $.ajax({
            url: http+'/home/delete_dosen',
            type: "POST",
            data: {
               'nip'    : nip
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                }
            }
            });

    }
  }
  function hapus_matakuliah(kode_mk){
    var r = confirm("Hapus Data Matakuliah (" +kode_mk+ ")  ?");
    if (r == true) {
        $("#bt-hapus"+kode_mk).html("<span class='fa fa-spinner fa-spin'></span> ");
        $.ajax({
            url: http+'/home/delete_matakuliah',
            type: "POST",
            data: {
               'kode_mk'    : kode_mk
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                }
            }
            });

    }
  }
//   ---------------- //
  function search(url){
      var var_cari = window.btoa($('#table_search').val());
      console.log($('#table_search').val())
    window.location.href = http+'/'+url+'?q='+var_cari;
  }


  function Edit_nilai(nim,kode_mk,nip){
    window.location.href = http+'/home/edit_perkuliahan?a='+btoa(nim)+'&b='+btoa(kode_mk)+'&c='+btoa(nip);
  }
  function Edit_mahasiswa(nim){
    window.location.href = http+'/home/edit_mahasiswa?a='+btoa(nim);
  }
  function Edit_dosen(nip){
    window.location.href = http+'/home/edit_dosen?a='+btoa(nip);
  }
  function Edit_matakuliah(kode_mk){
    window.location.href = http+'/home/edit_matakuliah?a='+btoa(kode_mk);
  }

//   --------------------- //
function edit_save_perkuliahan(){
    var nim = $('#edt-mhs').val()
    var kode_mk = $('#edt-mk').val()
    var nip = $('#edt-dosen').val()
    var nilai = $('#edt_nilai').val()
    if (!nilai) {
        ToastInfo('Nilai tidak boleh kosong')
        $('#edt_nilai').focus();     
    }else if (nilai > 9 ) {
        ToastInfo('Nilai melebihi batas maximal = 9 ')
        $('#edt_nilai').focus();     
    }else{
        $("#bt-saveeditperkuliahan").html("<span class='fa fa-spinner fa-spin'></span>   Loading");
        $.ajax({
            url: http+'/home/edit_save_perkuliahan',
            type: "POST",
            data: {
               'nim'    : nim,
               'kode_mk' : kode_mk,
               'nip' : nip,
               'nilai' : nilai
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.replace(http+'/home/list_perkuliahan');		
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                    $("#bt-saveperkuliahan").html("Simpan")
                }
            }
            });

    }

}
function edit_save_mahasiswa(){
    var nim = $('#edt_nim_mhs').val();
    var nama = $('#edt_nama_mhs').val();
    var tgl_lahir = $('#date_lhr').val();
    var jkelamin = $('#jenis_kelamin option:selected').val();
    var alamat = $('#edt_alamat').val();

   if (!tgl_lahir) {
      ToastInfo('Tanggal lahir tidak boleh kosong')
      $('#date_lhr').focus();
  }else if (!jkelamin) {
      ToastInfo('jenis kelamin tidak boleh kosong')
      $('#jenis_kelamin').focus();
  }else if (nim.length < 5 || nim.length > 12) {
      ToastInfo('NIM tidak Valid')
      $('#nim_mhs').focus();
  }else if (!alamat) {
      ToastInfo('Alamat tidak bolah kosong')
      $('#alamat').focus();
  }else if (!nama) {
    ToastInfo('Alamat tidak bolah kosong')
    $('#edt_nama_mhs').focus();
  }else{
        $("#bt-saveeditmahasiswa").html("<span class='fa fa-spinner fa-spin'></span>   Loading");
        $.ajax({
            url: http+'/home/edit_save_mahasiswa',
            type: "POST",
            data: {
               'nim'    : nim,
               'nama' : nama,
               'tgl_lahir' : tgl_lahir,
               'alamat' : alamat,
               'jkelamin' : jkelamin
            },
            success: function(result){
                var d=$.parseJSON(result);
                if (d.status == true) {
                    ToastSucces(d.message);
                    setTimeout(function(){
                        location.replace(http+'/home/list_mahasiswa');		
                    },1000);
                }else{
                    ToastGagal(d.message);
                    setTimeout(function(){
                        location.reload();					
                    },1000);
                    $("#bt-saveeditmahasiswa").html("Simpan")
                }
            }
            });

    }

}

function edit_save_dosen(){
    var nip           = $('#nip_dosen').val();
    var nama_dosen    = $('#nama_dosen').val();
    if (!nip) {
      ToastInfo('NIP tidak boleh kosong')
      $('#nip_dosen').focus();
  }else if (!nama_dosen) {
        ToastInfo('Nama tidak boleh kosong')
        $('#nama_dosen').focus();     
  }else if (nip.length <5 || nip.length > 12 ) {
      ToastInfo('NIP tidak Valid')
      $('#nip_dosen').focus();     
  }else{
      $("#bt-savedosen").html("<span class='fa fa-spinner fa-spin'></span>   Loading");
      $.ajax({
          url: http+'/home/edit_save_dosen',
          type: "POST",
          data: {
              'nip' : nip,
              'nama_dosen': nama_dosen
          },
          success: function(result){
              var d=$.parseJSON(result);
              if (d.status == true) {
                  ToastSucces(d.message);
                  setTimeout(function(){
                    location.replace(http+'/home/list_dosen');				
                  },1000);
              }else{
                  ToastGagal(d.message);
                  setTimeout(function(){
                      location.reload();					
                  },1000);
                  $("#btn-save").html("Update")
              }
          }
          });
  }
}
function edit_save_matakuliah(){
    var kdmt = $('#edt_kdmatakuliah').val()
    var namamt = $('#edt_namamatakuliah').val()
    var sks = $('#edt_sks  option:selected').val()
    
  if (!kdmt) {
  ToastInfo('Kode matakuliah tidak boleh kosong')
  $('#kd_matakuliah').focus();     
  }else if (!namamt) {
  ToastInfo('Nama matakulaih tidak boleh kosong')
      $('#nama_matakuliah').focus();
  }else if (!sks) {
      ToastInfo('SKS tidak boleh kosong')
      $('#sks_mt').focus();
  }else if (kdmt.length < 3 || kdmt > 6) {
      ToastInfo('Kode matakuliah tidak valid')
      $('#kd_matakuliah').focus();
  }else{
      $("#bt-savematakuliah").html("<span class='fa fa-spinner fa-spin'></span>   Loading");
      $.ajax({
          url: http+'/home/edit_save_matakuliah',
          type: "POST",
          data: {
              'kode_mt' : kdmt,
              'namamt'  : namamt,
              'sks'     :sks
          },
          success: function(result){
              var d=$.parseJSON(result);
              if (d.status == true) {
                  ToastSucces(d.message);
                  setTimeout(function(){
                    location.replace(http+'/home/list_matakuliah');				
                  },1000);
              }else{
                  ToastGagal(d.message);
                  setTimeout(function(){
                      location.reload();					
                  },1000);
                  $("#btn-save").html("Update")
              }
          }
          });
  }
}

















