<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller
    {
        public function index()
        {
            //check to see if session exists
            if (isset($_SESSION['username'])) {
                $this->load->model('admin_model');
                
                // get the data and pass it into dashboard
                $DbData = $this->admin_model->getUserData($this->session->username);
                $val = $DbData->row();
                $data = Array(
                    'username' => $val->username
                );
                $this->load->view("dashboard",$data);

            } 
            else 
            {
                // if not exsist go to login
                $this->load->view("login");
            }

            
        }

        // gets called in login view
        public function login()
        {
         
            $username = $this->input->post("username");
            $password = $this->input->post("password");
           

            if (strlen($username) > 0 && strlen($password) > 0 ) {
    
                $username = strtolower($username);
    
                $this->load->model('admin_model');
                $this->loginChecker($this->admin_model->login($username,$password));

            } else {
                $this->index();
            }
            

        }

        //gets called in login() in side admin controller
        private function loginChecker($val)
        {
            if ($val == 0) {
                
                $this->load->model('admin_model');
                
                $Data = $this->admin_model->getUserData($this->session->username);
                $val = $Data->row();
                $data = Array(
                    'username' => $val->username
                );
                $this->load->view("dashboard",$data);

            }   elseif ($val == 1) {

                $data = Array (
                    'error' => 'Incorrect Password'
                );

                $this->load->view("login", $data);

            }   elseif ($val == 2) {
                
                $data = Array (
                    'error' => 'Incorrect Username'
                );

                $this->load->view("login", $data);

            }
        }

        public function logout()
        {
            session_destroy();
            $this->load->view("login");
        }



        
    }
?>