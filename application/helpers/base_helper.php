<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');    
 
    /**
     * [lama_execute description]
     * @return [type] [description]
     */
    function link_pagination(){
        $string = count(explode('&page=',$_SERVER["REQUEST_URI"])) > 1? explode('&page=',$_SERVER["REQUEST_URI"]):explode('?page=',$_SERVER["REQUEST_URI"]);
        return $string;
    }
   
?>
