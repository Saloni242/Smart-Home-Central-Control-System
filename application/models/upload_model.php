<?php
class Upload_model extends CI_Model{
 
    function save_upload($title,$userid,$image){
        $data = array(
                'title'     => $title,
                'user_id'	=> $userid,
                'file_name' => $image
            );  
        $result= $this->db->insert('gallery',$data);
        return $result;
    }
 
     
}