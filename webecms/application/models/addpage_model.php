<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class Addpage_model extends CI_Model
    {

        //add a page to database
        //gets called in addpage controller
        public function addPageDataToDatabase($pagename, $pagetags, $description, $tinyMCE)
        {
            $data = array(
                'name' => $pagename,
                'tags' => $pagetags,
                'description' => $description,
                'data' => $tinyMCE
            );

            return ($query = $this->db->insert("pages",$data))? true : false;
        }

        // coppied from addPageToDataBase
        //gets called in addpage controller
        //Edits a currently inserted page
        public function editPageDataToDatabase($oldpagename ,$pagename, $pagetags, $description, $tinyMCE)
        {

            $this->db->set('name', $pagename);
            $this->db->set('tags', $pagetags);
            $this->db->set('description', $description);
            $this->db->set('data', $tinyMCE);
            $this->db->where('name', $oldpagename);

            return $query = $this->db->update("pages")? true : false;
        }

        //gets the pages
        //gets called in addpage for editing inside makepage function
        //gets called in manual for displaying custom pages
        public function getPage($pagename)
        {
            $this->db->select('*');
            $this->db->from('pages');
            $this->db->where('name', $pagename);
            return $query = $this->db->get();
        }


        //gets called in addpage controller to delete a page
        public function deletePage($pagename)
        {
            $this->db->where('name', $pagename);
            return $this->db->delete('pages');
        }

    }

?>