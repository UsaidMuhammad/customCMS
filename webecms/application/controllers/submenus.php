<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Submenus extends CI_Controller
    {
        public function index()
        {
            // if user is not logged in go to login page
            if (isset($_SESSION['username'])) {
                $this->load->view("menu_sub");
            } else {
                $this->load->view("login");
            }
        }

        public function submenu()
        {
            if ($this->checker()) {
                if (isset($_POST['submit'])) {
                    $superid = $this->input->post("super");
                    if ($superid != 0) {
                        $menu = $this->input->post('sub');
                        $link = $this->input->post('link');
    
                        $this->load->model("menus_model");
                        $this->menus_model->subaddmenu($superid, $menu, $link);
                    }
                    
                }
                $this->load->view("menu_sub");
            }
        }

        //gets called from menu_sub view
        public function editmenusub()
        {
            if ($this->checker()) {
                $isset = (isset($_POST['submit'])) ? $_POST['submit'] : null ;

                if ($isset == "Edit Menu") {
                    $id = $this->input->post('id');
                    $menu = $this->input->post('sub');
                    $link = $this->input->post('link');

                    $this->load->model("menus_model");
                    $this->menus_model->editsubmenu($id, $menu, $link);
                }
                elseif ($isset == "Delete Menu") {
                    $id = $this->input->post('id');

                    $this->load->model("menus_model");
                    $this->menus_model->deletesubmenu($id);

                }

                $this->load->view("menu_sub");
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