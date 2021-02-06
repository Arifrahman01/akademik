<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	var $API = "";

    public function __construct() {
        parent::__construct();
		$this->load->library('template');
        $this->load->model('model_data');
        $this->load->helper("base");
        $this->load->library('pagination');
	}
	
	public function index()
	{
		$data["total_dashboard"] = $this->model_data->getdashboard();
		$this->template->site('index',$data);
	}
	public function master_mahasiswa(){
		$this->template->site('mahasiswa/master');
	}
	public function master_matakuliah(){
		$this->template->site('matakuliah/master');
	}
	public function master_dosen(){
		$this->template->site('dosen/master');
	}
	public function perkuliahan(){
		$data["tb_mahasiswa"] = $this->model_data->gettable('mahasiswa');
		$data["tb_dosen"] = $this->model_data->gettable('dosen');
		$data["tb_matakuliah"] = $this->model_data->gettable('matakuliah');
		$this->template->site('perkuliahan/new_perkuliahan',$data);
	}

	//--------------------------------//
	public function save_mahasiswa(){
       
		$param=array(
            'nim' 		=> $this->input->post('nim'),
            'nama'   	=> $this->input->post('nama'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'alamat'	=> $this->input->post('alamat'),
            'jkelamin'  => $this->input->post('jkelamin'),
        
        );
        $data = $this->model_data->save_mahasiswa($param);
        if (isset($data)) {
            if ($data['status']) {
                $hasil=array(
                    'message' => "Data berhasil disimpan",
                    'status'  => true,
                );
                $this->output->set_output(json_encode($hasil));
            }else{
                $hasil=array(
                    'message' => "Nim Telah digunakan",
                    'status'  => false,
                );
                $this->output->set_output(json_encode($hasil));
            }
        }else{
            $hasil=array(
                'message' => "Data gagal disimpan, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
		
	}
	public function save_dosen(){
		$param=array(
            'nip' 		    => $this->input->post('nip'),
            'nama_dosen'   	=> $this->input->post('nama_dosen'),
        );
		$data = $this->model_data->save_dosen($param);
        if (isset($data)) {
            if ($data['status']) {
                $hasil=array(
                    'message' => "Data berhasil disimpan",
                    'status'  => true,
                );
                $this->output->set_output(json_encode($hasil));
            }else{
                $hasil=array(
                    'message' => "N I P Telah digunakan",
                    'status'  => false,
                );
                $this->output->set_output(json_encode($hasil));
            }
        }else{
            $hasil=array(
                'message' => "Data gagal disimpan, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }
    
	public function save_matakuliah(){
		$param=array(
            'kode_mk'   => $this->input->post('kode_mk'),
            'nama_mk'  	=> $this->input->post('nama_mk'),
            'sks'  	    => $this->input->post('sks'),
		);
		$data = $this->model_data->save_matakuliah($param);
        if (isset($data)) {
            if ($data['status']) {
                $hasil=array(
                    'message' => "Data berhasil disimpan",
                    'status'  => true,
                );
                $this->output->set_output(json_encode($hasil));
            }else{
                $hasil=array(
                    'message' => "Kode Matakuliah Telah digunakan",
                    'status'  => false,
                );
                $this->output->set_output(json_encode($hasil));
            }
        }else{
            $hasil=array(
                'message' => "Data gagal disimpan, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
	}
	public function save_perkuliahan(){
		$param=array(
            'nim'   		=> $this->input->post('nim'),
            'nama_matkul'  	=> $this->input->post('nama_matkul'),
            'nama_dosen'  	=> $this->input->post('nama_dosen'),
            'nilai_kuliah'  => $this->input->post('nilai_kuliah'),
		);
		$data = $this->model_data->save_perkuliahan($param);
        if (isset($data)) {
            if ($data['status']) {
                $hasil=array(
                    'message' => "Data berhasil disimpan",
                    'status'  => true,
                );
                $this->output->set_output(json_encode($hasil));
            }else{
                $hasil=array(
                    'message' => "Nim, Matakuliah dan dosen telah terdaftar",
                    'status'  => false,
                );
                $this->output->set_output(json_encode($hasil));
            }
        }else{
            $hasil=array(
                'message' => "Data gagal disimpan, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }
    
	// ----------------------//
	public function list_mahasiswa(){
        $total_md =  $this->model_data->totaldata('mahasiswa');
        $page = $this->input->get('p')?$this->input->get('p'):1;
        $sear = $this->input->get('q')?base64_decode($this->input->get('q')):'';
        $param=array(   
            'total' => $total_md[0]->total,
            'page'  => $page,
        );
        $data["tb_mahasiswa"] = $this->model_data->gettable_spec('mahasiswa',$page,$sear);
        $data['paging'] = $param;
		$this->template->site('mahasiswa/list_mahasiswa',$data);
    }
    
	public function list_dosen(){
        $total_md =  $this->model_data->totaldata('dosen');
        $page = $this->input->get('p')?$this->input->get('p'):1;
        $sear = $this->input->get('q')?base64_decode($this->input->get('q')):'';
        $param=array(   
            'total' => $total_md[0]->total,
            'page'  => $page,
        );
        $data["td_dosen"] = $this->model_data->gettable_specdosen('dosen',$page,$sear);
        $data['paging'] = $param;
		$this->template->site('dosen/list_dosen',$data);
    }
    
	public function list_matakuliah(){
        $total_md =  $this->model_data->totaldata('matakuliah');
        $page = $this->input->get('p')?$this->input->get('p'):1;
        $sear = $this->input->get('q')?base64_decode($this->input->get('q')):'';
        $param=array(   
            'total' => $total_md[0]->total,
            'page'  => $page,
        );
        $data["td_matakuliah"] = $this->model_data->gettable_specmatkul('matakuliah',$page,$sear);
        $data['paging'] = $param;
		$this->template->site('matakuliah/list_matakuliah',$data);
    }
    
	public function list_perkuliahan(){
        $total_md =  $this->model_data->totaldata('perkuliahan');
        $page = $this->input->get('p')?$this->input->get('p'):1;
        $sear = $this->input->get('q')?base64_decode($this->input->get('q')):'';
        $param=array(   
            'total' => $total_md[0]->total,
            'page'  => $page,
        );
        $data["td_perkuliahan"] = $this->model_data->get_tableperkuliahan('perkuliahan',$page,$sear);
        $data['paging'] = $param;
		$this->template->site('perkuliahan/list_perkuliahan',$data);
    }
    // ------------------------------//
    public function edit_perkuliahan(){
      
        $nim     = base64_decode($this->input->get('a'));
        $kode_mk = base64_decode($this->input->get('b'));
        $nip     = base64_decode($this->input->get('c'));
 
        $data["td_perkuliahan"] = $this->model_data->get_editperkuliahan($nim,$kode_mk,$nip);
        $this->template->site('perkuliahan/edit_perkuliahan',$data);
    }
    public function edit_mahasiswa(){
        $nim     = base64_decode($this->input->get('a'));

        $data["td_mahasiswa"] = $this->model_data->get_editmahasiswa($nim);

        $this->template->site('mahasiswa/edit_mahasiswa',$data);
    }
    public function edit_dosen(){
        $nip     = base64_decode($this->input->get('a'));

        $data["td_dosen"] = $this->model_data->get_editdosen($nip);

        $this->template->site('dosen/edit_dosen',$data);
    }
    public function edit_matakuliah(){
        $kode_mk     = base64_decode($this->input->get('a'));

        $data["td_matakuliah"] = $this->model_data->get_editmatakuliah($kode_mk);

        $this->template->site('matakuliah/edit_matakuliah',$data);
    }

    public function edit_save_dosen(){
		$param=array(
            'nip'   	=> $this->input->post('nip'),
            'nama_dosen'  	=> $this->input->post('nama_dosen')
        );
		$data = $this->model_data->save_edit_dosen($param);
		if ($data) {
          
            $hasil=array(
                'message' => "Data berhasil di update",
                'status'  => true,
            );
            $this->output->set_output(json_encode($hasil));
        }else{
            $hasil=array(
                'message' => "Data gagal update, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }
    public function edit_save_matakuliah(){
		$param=array(
            'kode_mk'   => $this->input->post('kode_mt'),
            'namamk'  	=> $this->input->post('namamt'),
            'sks'  	    => $this->input->post('sks')
        );
		$data = $this->model_data->save_edit_matakuliah($param);
		if ($data) {
            $hasil=array(
                'message' => "Data berhasil di update",
                'status'  => true,
            );
            $this->output->set_output(json_encode($hasil));
        }else{
            $hasil=array(
                'message' => "Data gagal update, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }

    public function edit_save_mahasiswa(){
		$param=array(
            'nim'   	=> $this->input->post('nim'),
            'nama'  	=> $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat'    => $this->input->post('alamat'),
            'jkelamin'  => $this->input->post('jkelamin'),
        );
		$data = $this->model_data->save_edit_mahasiswa($param);
		if ($data) {
          
            $hasil=array(
                'message' => "Data berhasil di update",
                'status'  => true,
            );
            $this->output->set_output(json_encode($hasil));
        }else{
            $hasil=array(
                'message' => "Data gagal update, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }
    public function edit_save_perkuliahan(){
		$param=array(
            'nim'   	=> $this->input->post('nim'),
            'kode_mk'  	=> $this->input->post('kode_mk'),
            'nip'  	    => $this->input->post('nip'),
            'nilai'     => $this->input->post('nilai'),
        );
		$data = $this->model_data->save_edit_perkuliahan($param);
		if ($data) {
          
            $hasil=array(
                'message' => "Data berhasil di update",
                'status'  => true,
            );
            $this->output->set_output(json_encode($hasil));
        }else{
            $hasil=array(
                'message' => "Data gagal update, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }
    
 
    // --------------------------- //
    public function delete_perkuliahan(){
        $param=array(
            'nim'   => $this->input->post('nim'),
            'kode_mk'   => $this->input->post('kode_mk'),
            'nip'   => $this->input->post('nip'),
        );
        $data = $this->model_data->delete_perkuliahan($param);
		if ($data) {
            $hasil=array(
                'message' => "Data berhasil dihapus",
                'status'  => true,
            );
            $this->output->set_output(json_encode($hasil));
        }else{
            $hasil=array(
                'message' => "Data gagal dihapus, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }
    public function delete_matakuliah(){
        $param=array(
            'kode_mk'   => $this->input->post('kode_mk'),
        );
        $data = $this->model_data->delete_matakuliah($param);
		if ($data) {
            $hasil=array(
                'message' => "Data berhasil dihapus",
                'status'  => true,
            );
            $this->output->set_output(json_encode($hasil));
        }else{
            $hasil=array(
                'message' => "Data gagal dihapus, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }
    public function delete_mahasiswa(){
        $param=array(
            'nim'   => $this->input->post('nim')
        );
        $data = $this->model_data->delete_mahasiswa($param);
		if ($data) {
            $hasil=array(
                'message' => "Data berhasil dihapus",
                'status'  => true,
            );
            $this->output->set_output(json_encode($hasil));
        }else{
            $hasil=array(
                'message' => "Data gagal dihapus, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }
    public function delete_dosen(){
        $param=array(
            'nip'   => $this->input->post('nip')
        );
        $data = $this->model_data->delete_dosen($param);
		if ($data) {
            $hasil=array(
                'message' => "Data berhasil dihapus",
                'status'  => true,
            );
            $this->output->set_output(json_encode($hasil));
        }else{
            $hasil=array(
                'message' => "Data gagal dihapus, server sedang sibuk",
                'status'  => false,
            );
            $this->output->set_output(json_encode($hasil));
        }
    }











}

