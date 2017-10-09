<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

//the default controller that loads the homepage

class Home extends CI_Controller
{

    public function index()
    {
        
            $this->load->view("home");
        
    }

    
}

?>