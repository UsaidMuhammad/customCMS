<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Addpage extends CI_Controller
{


    

    public function index()
    {
        // if user is not logged in go to login page
        if (isset($_SESSION['username'])) {
            $this->load->view("tinyMCE");
        } else {
            $this->load->view("login");
        }
    }

    //this function gets called form tinyMCE for a new submit
    //this can also get called from pagelisting view for an edit of a current page
    //if it gets a value it edits a page if not its probably a new page creation
    public function makepage($val = null)
    {
        
        if ($this->checker()) {
            if ($val == null) {
                if(isset($_POST["submit"]))
                {
                    $pagename = $this->input->post("pagename");
                    $pagetags = $this->input->post("pagetags");
                    $description = $this->input->post("description");
                    $tinyMCE = $this->input->post("tinyMCE");
        
                    if (strlen($pagename) < 1) {
                        $arr['error'] = "Page name was not given";
                        $arr['pagetags'] = $pagetags;
                        $arr['description'] = $description;
                        $arr['tinyMCE'] = $tinyMCE;
        
                        $this->load->view("tinyMCE",$arr);
                    }
                    else {
                        $this->load->model("addpage_model");
                        if($this->addpage_model->addPageDataToDatabase(strtolower($pagename),$pagetags,$description, $tinyMCE))
                        {
                            redirect(base_url("addpage/listpage"));
                        }
                        else {
                            echo "unexpected error occured inside addpage controller while inserting data";
                        }
                    }
                }
                else {
                    $this->load->view("tinyMCE");
                }
            }
            else {
    
                    $this->load->model("addpage_model");
                    $query = $this->addpage_model->getPage($val);
                    if ($query->num_rows()) {
                        $data = $query->row();
                        $val = array(
                            'pagename' => $data->name,
                            'pagetags' => $data->tags,
                            'description' => $data->description,
                            'tinyMCE' => $data->data
                        );
        
                        $this->load->view("tinyMCE",$val);
                    }
                    else {
                        $this->load->view("tinyMCE");
                    } 
            }
        }
    }

    //this is called from pagelisting view
    //this is used to edit a paage
    public function editpage()
    {
        if ($this->checker()) {
            // coppied from addpage()
            if(isset($_POST["submit"]))
            {
                $oldpagename = $this->input->post("hidden");
                $pagename = $this->input->post("pagename");
                $pagetags = $this->input->post("pagetags");
                $description = $this->input->post("description");
                $tinyMCE = $this->input->post("tinyMCE");

                if (strlen($pagename) < 1) {
                    $arr['error'] = "Page name was not given";
                    $arr['pagetags'] = $pagetags;
                    $arr['description'] = $description;
                    $arr['tinyMCE'] = $tinyMCE;

                    $this->load->view("tinyMCE",$arr);
                }
                else {
                    $this->load->model("addpage_model");
                    if($this->addpage_model->editPageDataToDatabase($oldpagename ,strtolower($pagename),$pagetags,$description, $tinyMCE))
                    {
                        redirect(base_url("admin"));
                    }
                    else {
                        echo "unexpected error occured inside addpage controller while inserting data";
                    }
                }
            }
            else {
                $this->load->view("tinyMCE");
            }
        }
    }

    //this is called from pagelisting view
    public function deletepage($val = null)
    {

        if ($this->checker()) {
            if ($val == null) {
                $this->load->view("pagelisting");
            } else {
                $this->load->model("addpage_model");
                $this->addpage_model->deletePage($val);
                $this->load->view("pagelisting");
            }
        }
    }

    public function listpage()
    {
        if ($this->checker()) {
            $this->load->view("pagelisting");
        }
    }

    //checks to see if where logged in or not
    private function checker()
    {
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            $this->load->view("login");
            return false;
        }
    }
}


?>