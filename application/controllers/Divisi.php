<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Divisi extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('divisi_model');
    }

    public function index()
    {
        $jabatan = $this->db->get('tbl_jabatan')->result();
        $query = $this->db->get_where('tbl_task', array('id_jabatan' => $this->jabat))->result();
        $this->db->select('tbl_task.*, tbl_jabatan.nama_jabatan');
        $this->db->from('tbl_task');
        $this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_task.id_jabatan');
        $this->db->order_by('id_jabatan', 'ASC');
        $taskall = $this->db->get()->result();
        $data = array(
            'task' => $query,
            'jabatan' => $jabatan,
            'taskall' =>$taskall
        );

        $this->global['title'] = 'Program';
        $this->loadViews('divisi/index', $this->global, $data);
    }

}

/* End of file Divisi.php */
/* Location: ./application/controllers/Divisi.php */