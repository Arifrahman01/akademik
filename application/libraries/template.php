<?php
class Template{
    protected $_ci;
    function __construct(){
        $this->_ci = &get_instance();
    }
    
  function site($content = NULL, $data = NULL){
        $data['metadata'] = $this->_ci->load->view('template/metadata', $data, TRUE);
        $data['navbar'] = $this->_ci->load->view('template/navbar', $data, TRUE);
        $data['sidebar'] = $this->_ci->load->view('template/sidebar', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
        $data['modal'] = $this->_ci->load->view('modal', $data, TRUE);
        $this->_ci->load->view('template/index',$data);
    }

 
}