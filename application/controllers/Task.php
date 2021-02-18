<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Task extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->helper('url', 'form');
        $this->isLoggedIn();
    }

    public function index()
    {
        $task = $this->db->get_where('tbl_task', array('id_jabatan' => $this->jabat))->result();
        $data = array(
            'task' => $task
        );
        $this->global['title'] = 'Data Tugas';
        $this->loadViews('task/index', $this->global, $data);
    }

    public function confirm()
    {

        $this->db->select('tbl_progress.*, tbl_task.nama_task');
        $this->db->from('tbl_progress');
        $this->db->join('tbl_task', 'tbl_task.id_task = tbl_progress.id_task');
        $this->db->where('isValid', 0);
        $query = $this->db->get()->result();
        $data = array(
            'task' => $query
        );
        $this->global['title'] = 'Confirm Tugas';
        $this->loadViews('task/index', $this->global, $data);
    }
    public function valid()
    {
        $id = $this->uri->segment(3);
        $id_task = $this->uri->segment(4);
        $task = $this->db->get_where('tbl_task', array('id_task' => $id_task))->row();
        $prog = $this->db->get_where('tbl_progress', array('id' => $id))->row();
        $dana = $prog->dana;
        $sisa = $task->sisa;
        $digun = $task->digunakan;
        $hasil = $sisa - $dana;
        $hasil2 = $dana + $digun;
        $progress = $prog->progress;

        $data = array(
            'digunakan' => $hasil2,
            'sisa' => $hasil,
            'progress' => $progress,

        );
        $this->db->where('id', $id);
        $this->db->update('tbl_progress', array('isValid' => 2));
        $this->db->reset_query();
        $this->db->where('id_task', $id_task);
        $this->db->update('tbl_task', $data);
        $this->session->set_flashdata('success', 'Berhasil');
        redirect('task/confirm');
    }
    public function unvalid()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->update('tbl_progress', array('isValid' => 1));
        $this->session->set_flashdata('success', 'Berhasil');
        redirect('task/confirm');
    }
    public function update()
    {
        $id_task = $this->uri->segment(3);
        $this->db->where('id_task', $id_task);
        $task = $this->db->get('tbl_task')->row();

        $data = array(
            'data' => $task
        );
        $this->global['title'] = 'Update Progress';
        $this->loadViews('task/confirm', $this->global, $data);
    }

    public function updat()
    {
        $id = $this->uri->segment(4);
        $id_task = $this->uri->segment(3);
        $progress = $this->db->get_where('tbl_progress', array('id' => $id))->row();
        $this->db->reset_query();
        $this->db->where('id_task', $id_task);
        $task = $this->db->get('tbl_task')->row();

        $data = array(
            'data' => $task,
            'data1' => $progress
        );
        $this->global['title'] = 'Update Progress';
        $this->loadViews('task/confirm', $this->global, $data);
    }

    public function updat_act()
    {
        $id_task = $this->input->post('id_task');
        $id = $this->input->post('id');
        $sisa = (int)$this->input->post('sisa');
        $dana = (int)$this->input->post('dana');
        $biaya = (int)$this->input->post('biaya');
        $dana = str_replace('.', '', $_POST['dana']);
        $tanggal = $this->input->post('tanggal', ('Y-m-d'));
        $hasil2 = $sisa - $dana;
        $a = $biaya - $hasil2;
        $hasil = $a / $biaya * 100;
        $data = array(
            'id_task' => $id_task,
            'dana' => $dana,
            'progress' => $hasil,
            'tanggal' => $tanggal,
            'isValid' => 0
        );
        // echo $id;
        $this->db->where('id', $id);
        $this->db->update('tbl_progress', $data);
        $this->session->set_flashdata('success', 'Berhasil Update Progress Program, Tunggu Dikonfirmasi Admin Untuk Selanjutnya');
        redirect('divisi', 'refresh');
    }

    public function update_act()
    {
        $id_task = $this->input->post('id_task');
        $sisa = (int)$this->input->post('sisa');
        $dana = (int)$this->input->post('dana');
        $biaya = (int)$this->input->post('biaya');
        $dana = str_replace('.', '', $_POST['dana']);
        $tanggal = $this->input->post('tanggal', ('Y-m-d'));
        $hasil2 = $sisa - $dana;
        $a = $biaya - $hasil2;
        $hasil = $a / $biaya * 100;
        $data = array(
            'id_task' => $id_task,
            'dana' => $dana,
            'progress' => $hasil,
            'tanggal' => $tanggal,
            'id_jabatan' => $this->jabat
        );

        $this->db->insert('tbl_progress', $data);
        $this->session->set_flashdata('success', 'Berhasil Update Progress Program, Tunggu Dikonfirmasi Admin Untuk Selanjutnya');
        redirect('divisi', 'refresh');
    }

    public function create()
    {
        $id_jabatan = $this->uri->segment(3);
        $jabat = $this->db->get_where('tbl_jabatan', array('id_jabatan' => $id_jabatan))->row();
        $data = array(
            'data' => $jabat,
        );
        $this->global['title'] = 'Kegiatan Baru';
        $this->loadViews('task/form', $this->global, $data);
    }

    public function create_action()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_task', 'Nama Tugas', 'required');
        $this->form_validation->set_rules('mulai', 'Mulai', 'required');
        $this->form_validation->set_rules('selesai', 'selesai', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        
        // $a = $this->input->post('a');
        // echo $a;
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Coba Periksa Lagi');
            redirect('task/create/');
        } else {

            $nama = $this->input->post('nama_task');
            $date = $this->input->post('mulai', ('Y-m-d H:i:s'));
            $date1 = $this->input->post('selesai', ('Y-m-d H:i:s'));
            // $biaya = $this->input->post('biaya');
            $biaya = str_replace('.', '', $_POST['biaya']);
            $id = $this->input->post('id');

            // echo $a;

            $this->task_model->Createtask($nama, $date, $date1, $biaya, $id);

            redirect('divisi/', 'refresh');
        }
    }

    public function edit()
    {
        $id_task = $this->uri->segment(3);
        $this->db->where('id_task', $id_task);
        $query = $this->db->get('tbl_task')->row();
        $data = array(
            'data' => $query,
        );
        $this->global['title'] = 'Edit Tugas';
        $this->loadViews('task/form', $this->global, $data);
    }
    public function edit_action()
    {
        $this->load->library('form_validation');
        $id = $this->input->post('id_task');

        $this->form_validation->set_rules('nama_task', 'Nama Tugas', 'trim|required');
        $this->form_validation->set_rules('mulai', 'Mulai', 'required');
        $this->form_validation->set_rules('selesai', 'Hingga', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->flashdata('error', 'Coba Periksa Lagi');
            redirect('task/edit/' . $id, 'refresh');
        } else {
            $nama = $this->input->post('nama_task');
            $date = $this->input->post('mulai', ('Y-m-d H:i:s'));
            $date1 = $this->input->post('selesai', ('Y-m-d H:i:s'));
            $biaya = str_replace('.', '', $_POST['biaya']);
        }
        $this->task_model->editTask($id, $nama, $date, $date1, $biaya);

        redirect('divisi', 'refresh');
    }

    public function deleted()
    {
        $id_task = $this->uri->segment(3);
        $this->db->where('id_task', $id_task);
        $hapus = $this->db->delete('tbl_task');
        if ($hapus == true) {
            $this->session->set_flashdata('success', 'Berhasil Hapus Tugas');
        } else {
            $this->session->set_flashdata('error', 'Berhasil Hapus Tugas');
        }
        redirect('divisi', 'refresh');
    }

    public function deleteall()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_jabatan', $id);
        $hapus = $this->db->delete('tbl_task');

        if ($hapus == true) {
            $this->session->set_flashdata('success', 'Berhasil Hapus Semua Tugas');
        } else {
            $this->session->set_flashdata('error', 'Berhasil Hapus Tugas');
        }
        redirect('divisi', 'refresh');
    }

    public function detail()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_task', $id);
        $this->db->where('isValid', 2);
        $this->db->order_by('progress', 'ASC');
        $progress = $this->db->get('tbl_progress')->result();
        $this->db->reset_query();
        $this->db->where('id_task', $id);
        $query = $this->db->get('tbl_task')->row();
        $data = array(
            'data' => $query,
            'prog' => $progress
        );
        $this->global['title'] = 'Kegiatan ' . $query->nama_task;
        $this->loadViews('task/detail', $this->global, $data);
    }
}

/* End of file Task.php */
