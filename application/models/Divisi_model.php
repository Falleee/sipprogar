<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi_model extends CI_Model
{
    public function Createdivisi($id,$nama,$user,$jabatan)
    {
        $data = array(
            'nama_divisi' => $nama,
            'id_project' => $id,
            'id_users' => $user,
            'id_jabatan' => $jabatan
        );
        $this->db->insert('tbl_divisi',$data);  
    }
 
}

/* End of file Divisi_model.php */
