<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Menus extends CI_Controller
    {
        //loads up insert/edit main menu
        public function index()
        {
            // if user is not logged in go to login page
            if (isset($_SESSION['username'])) {
                $this->load->view("menu_super");
            } else {
                $this->load->view("login");
            }
        }

        //gets called from menu_super
        //adds or edits super menus
        public function supermenu()
        {
            if ($this->checker()) {
                if (isset($_POST['submit'])) {
                    $menu = $this->input->post('super');
                    $link = $this->input->post('link');

                    $this->load->model("menus_model");
                    $this->menus_model->addmenu($menu, $link);
                }
                $this->load->view("menu_super");
            }

        }

        //gets called from menu_super view
        public function editmenusuper()
        {
            if ($this->checker()) {
                $isset = (isset($_POST['submit'])) ? $_POST['submit'] : null ;

                if ($isset == "Edit Menu") {
                    $id = $this->input->post('id');
                    $menu = $this->input->post('super');
                    $link = $this->input->post('link');

                    $this->load->model("menus_model");
                    $this->menus_model->editmenu($id, $menu, $link);
                }
                elseif ($isset == "Delete Menu") {
                    $id = $this->input->post('id');

                    $this->load->model("menus_model");
                    $this->menus_model->deletemenu($id);

                }

                $this->load->view("menu_super");
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