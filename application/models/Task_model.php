<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_model extends CI_Model
{
    public function Createtask($nama, $date, $date1, $biaya,$id)
    {
        $data = array(
            'nama_task' => $nama,
            'mulai' => $date,
            'selesai' => $date1,
            'biaya' => $biaya,
            'sisa' => $biaya,
            'progress' => 0,
            'id_jabatan' => $id,
        );
        $this->db->insert('tbl_task', $data);

        if ($data > 0) {
            $this->session->set_flashdata('success', 'Berhasil Membuat Tugas Baru');
        } else {
            $this->session->set_flashdata('error', 'Berhasil Membuat Tugas');
        }
    }
    public function editTask($id, $nama, $date, $date1, $biaya)
    {
        $data = array(
            'nama_task' => $nama,
            'mulai' => $date,
            'selesai' => $date1,
            'biaya' => $biaya,
            'sisa' => $biaya
        );
        $this->db->where('id_task', $id);
        $this->db->update('tbl_task', $data);
        if ($data > 0) {
            $this->session->set_flashdata('success', 'Berhasil Mengubah Tugas');
        } else {
            $this->session->set_flashdata('error', 'Gagal Mengubah Tugas');
        }
    }
    public function update($id_task,$dana,$progress,$tanggal)
    {
        $data = array(
            'id_task' => $id_task,
            'dana' => $dana,
            'progress' => $progress,
            'tanggal' => $tanggal,
            'isValid' => 0
        );
        $this->db->insert('tbl_progress',$data);
    }
}

/* End of file Task_model.php */
