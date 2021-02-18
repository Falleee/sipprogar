<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function editProject($data,$id)
    {
        $this->db->where('id_project',$id);
        $this->db->update('tbl_project',$data);
        return true;
    }

}

/* End of file Project_model.php */
