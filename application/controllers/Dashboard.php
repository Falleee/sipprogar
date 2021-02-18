<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController
{

	public function __construct()
	{
		parent::__construct();
		$this->isLoggedIn();
	}

	public function index()
	{
		$z = $this->db->get_where('tbl_task',array('id_jabatan'=>$this->jabat));
		$taskuser = $z->num_rows();
		$this->db->reset_query();
		$this->db->where('isDeleted', 0);
		$query = $this->db->get('tbl_users');
		$notif = $query->num_rows();
		$this->db->reset_query();
		$this->db->where('isDeleted', 2);
		$query = $this->db->get('tbl_users');
		$konfirmasi = $query->num_rows();
		$this->db->reset_query();
		$a = $this->db->get('tbl_task');
		$task = $a->num_rows();
		$this->db->reset_query();
		$this->db->where('isValid', 0);
		$b = $this->db->get('tbl_progress');
		$c = $b->num_rows();
		$data = array(
			'users' => $notif,
			'unusers' => $konfirmasi,
			'task' => $task,
			'progress' => $c,
			'taskusers' => $taskuser
		);
		$this->global['title'] = 'Dashboard';
		$this->loadViews('index', $this->global, $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */