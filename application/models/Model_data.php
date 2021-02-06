<?php 
 
class Model_data extends CI_Model{	
    
		
    function gettable($table){
        $query=$this->db->query("select * from ".$table);
        return $query->result();
    }
    function gettable_spec($table,$page,$sear){
        if ($sear!='') {
          $where = "  where Nim LIKE '".$sear."%' OR Nama_Mhs LIKE '".$sear."%'  OR Alamat LIKE '".$sear."%'  OR Jenis_Kelamin LIKE '".$sear."%'";
        }else{
            $where =' ';
        }
        $query=$this->db->query("select * from ".$table.$where." order by Nim desc OFFSET ".(($page-1)*5)." ROWS FETCH NEXT 5 ROWS ONLY;");
        return $query->result();
    }
    function gettable_specdosen($table,$page,$sear){
        if ($sear!='') {
          $where = "  where Nip LIKE '".$sear."%' OR Nama_Dosen LIKE '".$sear."%'";
        }else{
            $where =' ';
        }
        $query=$this->db->query("select * from ".$table.$where." order by Nip desc OFFSET ".(($page-1)*5)." ROWS FETCH NEXT 5 ROWS ONLY;");
        return $query->result();
    }
    function gettable_specmatkul($table,$page,$sear){
        if ($sear!='') {
          $where = "  where Nama_MK LIKE '".$sear."%' OR Kode_MK LIKE '".$sear."%' OR Sks LIKE '".$sear."%' ";
        }else{
            $where =' ';
        }
        $query=$this->db->query("select * from ".$table.$where." order by Kode_MK desc OFFSET ".(($page-1)*5)." ROWS FETCH NEXT 5 ROWS ONLY;");
        return $query->result();
    }
    function get_tableperkuliahan($table,$page,$sear){
        if ($sear!='') {
          $where = "  where mt.Nama_MK LIKE '".$sear."%' OR pk.Nim LIKE'".$sear."%' OR mh.Nama_Mhs LIKE'".$sear."%' OR pk.Kode_MK LIKE'".$sear."%' OR pk.Nip LIKE'".$sear."%' OR dn.Nama_Dosen LIKE '".$sear."%' OR pk.Nilai LIKE '".$sear."'";
        }else{
            $where =' ';
        }
        $query=$this->db->query("select pk.Nim,mh.Nama_Mhs,pk.Kode_MK,mt.Nama_MK,pk.Nip,dn.Nama_Dosen, pk.Nilai from perkuliahan pk
        left join dosen  dn on dn.Nip=pk.Nip
        left join mahasiswa mh on mh.Nim=pk.Nim
        left join matakuliah mt on mt.Kode_MK = pk.Kode_MK ".$where." order by Kode_MK desc OFFSET ".(($page-1)*5)." ROWS FETCH NEXT 5 ROWS ONLY;");
        return $query->result();
    }
    function get_editperkuliahan($nim,$kode_mk,$nip){

        $query=$this->db->query("select pk.Nim,mh.Nama_Mhs,pk.Kode_MK,mt.Nama_MK,pk.Nip,dn.Nama_Dosen, pk.Nilai from perkuliahan pk
        left join dosen  dn on dn.Nip=pk.Nip
        left join mahasiswa mh on mh.Nim=pk.Nim
        left join matakuliah mt on mt.Kode_MK = pk.Kode_MK where pk.Nim='".$nim."' and pk.Kode_MK='".$kode_mk."' and pk.Nip='".$nip."'");
        
        return $query->result();
    }
    function get_editmahasiswa($nim){
        $query=$this->db->query("select * from mahasiswa where Nim = '".$nim."'");
        return $query->result();
    }
    function get_editdosen($nip){
        $query=$this->db->query("select * from dosen where Nip = '".$nip."'");
        return $query->result();
    }
    function get_editmatakuliah($kode_mk){
        $query=$this->db->query("select * from matakuliah where Kode_MK = '".$kode_mk."'");
        return $query->result();
    }
    function totaldata($table){
        $query=$this->db->query("select count(*) total from ".$table);
        return $query->result();
    }
    function getdashboard(){
        $query=$this->db->query("select (select count(*) from mahasiswa) totalmhs,(select count(*) from dosen) totaldosen,(select count(*) from matakuliah) totalmatakuliah");
        return $query->result();
    }

    function save_mahasiswa(){
     
        $nim        =  str_replace(' ','',$this->input->post('nim'));
        $nama   	=  $this->input->post('nama');
        $tgl_lahir  =   str_replace('-','',$this->input->post('tgl_lahir'));
        $alamat     =   $this->input->post('alamat');
        $jkelamin   =   $this->input->post('jkelamin');

        $result = $this->db->query("exec dbo.PS_SAVE_MAHASISWA @nim='".$nim."', @nama_mhs ='".$nama."', @tgl_lahir ='".$tgl_lahir ."',@alamat ='".$alamat."',@Jenis_Kelamin='".$jkelamin."'");
       if (!$result) {
           $param=array(
               'status' => false,
               'pesan'  => $this->db->error()
           );
      
       }else{
            $param=array(
                'status' => true,
                'pesan'  => $result,
            );
       }
       return $param;

    }
    function save_dosen(){
        $nip    =  str_replace(' ','',$this->input->post('nip'));
        $nama_dosen   	=  $this->input->post('nama_dosen');
        $result = $this->db->query("exec dbo.PS_SAVE_DOSEN @nip='".$nip."', @nama_dosen ='".$nama_dosen."'");
        if (!$result) {
            $param=array(
                'status' => false,
                'pesan'  => $this->db->error()
            );
       
        }else{
             $param=array(
                 'status' => true,
                 'pesan'  => $result,
             );
        }
        return $param;
    }
    function save_matakuliah(){
        $kode_mk    =  str_replace(' ','',$this->input->post('kode_mk'));
        $nama_mk   	=  $this->input->post('nama_mk');
        $sks   	    =  $this->input->post('sks');

        $result = $this->db->query("exec dbo.PS_SAVE_MATAKULIAH @kode_mk='".$kode_mk."', @nama_mk ='".$nama_mk."',@sks ='".$sks."'");
        if (!$result) {
            $param=array(
                'status' => false,
                'pesan'  => $this->db->error()
            );
       
        }else{
             $param=array(
                 'status' => true,
                 'pesan'  => $result,
             );
        }
        return $param;
    }
    function save_perkuliahan(){
        $nim            = $this->input->post('nim');
        $kode_mk   	=  $this->input->post('nama_matkul');
        $nip_dosen   	=  $this->input->post('nama_dosen');
        $nilai_kuliah   =  $this->input->post('nilai_kuliah');

        $result = $this->db->query("exec dbo.PS_SAVE_PERKULIAHAN @nim='".$nim."', @kode_mk ='".$kode_mk."',@nip_dosen ='".$nip_dosen."', @nilai_kuliah ='".$nilai_kuliah."'");
        if ($result->row()->ID=='Duplicate') {
            $param=array(
                'status' => false,
                'pesan'  => 'Duplicate Row'
            );
        }else{
            $param=array(
                'status' => true,
                'pesan'  => $result,
            );
        }
        return $param;
    }

    function delete_perkuliahan(){
        $nim            = $this->input->post('nim');
        $kode_mk   	    = $this->input->post('kode_mk');
        $nip   	        = $this->input->post('nip');
        $result = $this->db->query("exec dbo.PS_DELETE_PERKULIAHAN @nim='".$nim."', @kode_mk ='".$kode_mk."',@nip ='".$nip."'");
        return $result;
    }
    function delete_mahasiswa(){
        $nim            = $this->input->post('nim');
        $result = $this->db->query("exec dbo.PS_DELETE_MAHASISWA @nim='".$nim."'");
        return $result;
    }
    function delete_matakuliah(){
        $kode_mk            = $this->input->post('kode_mk');
        $result = $this->db->query("exec dbo.PS_DELETE_MATAKULIAH @kode_mk='".$kode_mk."'");
        return $result;
    }
    function delete_dosen(){
        $nip    = $this->input->post('nip');
        $result = $this->db->query("exec dbo.PS_DELETE_DOSEN @nip='".$nip."'");
        return $result;
    }
    function save_edit_perkuliahan(){
        $nim = $this->input->post('nim');
        $kode_mk = $this->input->post('kode_mk');
        $nip = $this->input->post('nip');
        $nilai = $this->input->post('nilai');
        $result = $this->db->query("exec dbo.PS_UPDATE_PERKULIAHAN @nim='".$nim."', @kode_mk ='".$kode_mk."',@nip ='".$nip."', @nilai ='".$nilai."'");
        return $result;
    }
    
    function save_edit_mahasiswa(){
        $nim        = $this->input->post('nim');
        $nama       = $this->input->post('nama');
        $tgl_lahir =   str_replace('-','',$this->input->post('tgl_lahir'));
        $alamat     = $this->input->post('alamat');
        $jkelamin   = $this->input->post('jkelamin');

        $result     = $this->db->query("exec dbo.PS_UPDATE_MAHASISWA @nim='".$nim."', @nama_mhs ='".$nama."',@tgl_lahir ='".$tgl_lahir."',@jkelamin ='".$jkelamin."', @alamat ='".$alamat."'");
        return $result;
    }
    function save_edit_dosen(){
        $nip        = $this->input->post('nip');
        $nama       = $this->input->post('nama_dosen');
        $result     = $this->db->query("exec dbo.PS_UPDATE_DOSEN @nip='".$nip."', @nama_dosen ='".$nama."'");
        return $result;
    }
    function save_edit_matakuliah(){
        $kode_mk     = $this->input->post('kode_mt');
        $nama_mk     = $this->input->post('namamt');
        $sks         = $this->input->post('sks');
        $result     = $this->db->query("exec dbo.PS_UPDATE_MATAKULIAH @kode_mk='".$kode_mk."', @nama_mk ='".$nama_mk."',@sks ='".$sks."'");
        return $result;
    }
    











}

