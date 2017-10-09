<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// a controller that loads manual pages
class Manual extends CI_Controller
{
    
    public function page ($val = "null")
    {
        if ($val == "null") {
            //loads default homepage
            $this->load->view("home");
        } else {
            //else try to load the described page
            $this->load->model("addpage_model");
            $query = $this->addpage_model->getPage($val);
            if ($query->num_rows() != 0) {
                $data = $query->row();
                $val = array(
                    'name' => $data->name,
                    'tags' => $data->tags,
                    'description' => $data->description,
                    'data' => $data->data
                );

                $this->load->view("custom_page",$val);
            }
            else {
                $this->load->view('wrong');
            }
            
        }
    }

}

?>