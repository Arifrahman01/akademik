<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $API = "";
    public function __construct() {
        parent::__construct();
        $this->load->library('template');;
    }
	public function index()
	{
		$this->template->site();
		// $this->load->view('template/index');
	}
	public function tess(){
		echo 'aaaa';
	}
}
