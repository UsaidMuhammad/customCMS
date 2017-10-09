<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

    class Menus_model extends CI_Model
    {
        //gets called from menu controller
        public function addmenu($menu, $link)
        {
            $arr = array(
                'menu' => $menu,
                'link' => $link
            );

            return $this->db->insert('menu_super',$arr);
        }

        //gets called from menu controller
        public function editmenu($id, $menu, $link)
        {
            $this->db->set('menu', $menu);
            $this->db->set('link', $link);
            $this->db->where('id', $id);
            
            return $this->db->update('menu_super');
        }

        //gets called from menu controller
        public function deletemenu($id)
        {
            $this->db->where('super_id', $id);
            $this->db->delete("menu_sub");
            $this->db->where('id', $id);
            return $this->db->delete('menu_super');
        }

        public function subaddmenu($superid ,$menu, $link)
        {
            $arr = array(
                'super_id' => $superid,
                'sub' => $menu,
                'link' => $link
            );

            return $this->db->insert('menu_sub',$arr);
        }

         //gets called from submenus controller
         public function editsubmenu($id, $menu, $link)
         {
             $this->db->set('sub', $menu);
             $this->db->set('link', $link);
             $this->db->where('id', $id);
             
             return $this->db->update('menu_sub');
         }
 
         //gets called from submenu controller
         public function deletesubmenu($id)
         {
             $this->db->where('id', $id);
             return $this->db->delete('menu_sub');
         }
    }

?>