<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    //recieves two arugments
    public function login($username,$password)
    {   
        // call the function
        $query = $this->getUserData($username);

        // check to see if query worked
        if ($query) {

            foreach ($query->result() as $dbdata){

                if (password_verify($password, $dbdata->password)) {
                    
                    $_SESSION['username'] = $username;
                   
                    return "0"; // user is present and pass verified
                }
                else {
                    return "1"; // user pass is incorrect
                }
            }

            //if query returned 0 data it means the username is wrong
            return "2"; // no such user is present
        }
        
    }

    public function getUserData($username)
    {
        // making a query with the query builder
        //gets call in this model and admin controller
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        return $query = $this->db->get();
    }
}

?>