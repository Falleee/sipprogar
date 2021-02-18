<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class User extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->isLoggedIn();
	}

	public function index()
	{
		// $this->global['title'] = 'Users';

		// $this->loadViews("user/index", $this->global, NULL , NULL);
		$this->db->select('tbl_users.*, tbl_roles.role ,tbl_jabatan.nama_jabatan');
		$this->db->from('tbl_users');
		$this->db->join('tbl_roles', 'tbl_roles.roleId = tbl_users.roleId');
		$this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_users.id_jabatan');
		$this->db->where('isDeleted', 0);
		$query = $this->db->get()->result();
		$data = array(
			'userRecords' => $query
		);
		$this->global['title'] = 'Data Users';
		$this->loadViews('user/index', $this->global, $data);
	}

	public function create()
	{
		$jabat = $this->db->get('tbl_jabatan')->result();
		$data = array(
			'roles' => $this->user_model->getUserRoles(),
			'jabat' => $jabat
		);
		$this->global['title'] = 'Create Users';
		$this->loadViews('user/form', $this->global, $data);
	}

	public function create_action()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nip', 'Nip', 'required|is_unique[tbl_users.nip]', [
			'is_unique' => 'Nip/Nrp Ini Telah Digunakan'
		]);
		$this->form_validation->set_rules('nama', 'Full Nama', 'required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|max_length[128]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[cpassword]', [
			'matches' => 'Katasandi Tidak Sama'
		]);
		$this->form_validation->set_rules('cpassword', 'Password', 'required|matches[password]');
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Cek Lagi Datanya');
			$this->create();
		} else {
			$nrp = $this->input->post('nip');
			$nip = substr($nrp,0,8);
			$nama = ucwords(strtolower($this->security->xss_clean($this->input->post('nama'))));
			$email = strtolower($this->security->xss_clean($this->input->post('email')));
			$password = $this->input->post('password');
			$roleId = $this->input->post('role');
			$mobile = $this->security->xss_clean($this->input->post('mobile'));
			$pangkat = $this->input->post('pangkat');
			$jabatan = $this->input->post('jabatan');
			$bagian = $this->input->post('bagian');

			$userInfo = array(
				'email' => $email,
				'nip' => $nip,
				'nrp' => $nrp,	
				'pangkat' => $pangkat,
				'jabatan' => $jabatan,
				'id_jabatan' => $bagian,
				'password' => getHashedPassword($password),
				'roleId' => $roleId,
				'nama' => $nama,
				'mobile' => $mobile,
				'createdDtm' => date('Y-m-d H:i:s')
			);
			$this->load->model('user_model');
			$data = $this->user_model->addNewUser($userInfo);
			// $data = $this->db;
			if ($data) {
				$this->session->set_flashdata('error', 'Gagal Membuat User');
			} else {
				$this->session->set_flashdata('success', 'User Baru Berhasil Dibuat');
			}

			redirect('user');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$jabat = $this->db->get('tbl_jabatan')->result();
		$this->db->reset_query();
		$this->db->select('tbl_users.*, tbl_roles.role, tbl_jabatan.nama_jabatan');
		$this->db->from('tbl_users');
		$this->db->join('tbl_roles', 'tbl_roles.roleId = tbl_users.roleId');
		$this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_users.id_jabatan');
		$this->db->where('nip', $id);
		$query = $this->db->get()->row();
		$roleId = $this->role;
		$data = array(
			'roles' => $this->user_model->getRoles($roleId),
			'data' => $query,
			'jabat' => $jabat
		);
		$this->global['title'] = 'Edit User';
		$this->loadViews('user/form', $this->global, $data);
	}

	public function edit_action()
	{

		$this->load->library('form_validation');

		$nip = $this->input->post('nip');

		$this->form_validation->set_rules('nama', 'Full nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|max_length[128]');
		$this->form_validation->set_rules('password', 'Password', 'matches[cpassword]|max_length[20]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]|max_length[20]');
		$this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required');
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

		if ($this->form_validation->run() == FALSE) {
			redirect('user/edit/' . $nip, 'refresh');
		} else {
			$nama = ucwords(strtolower($this->security->xss_clean($this->input->post('nama'))));
			$email = strtolower($this->security->xss_clean($this->input->post('email')));
			$password = $this->input->post('password');
			$roleId = $this->input->post('role');
			$mobile = $this->security->xss_clean($this->input->post('mobile'));
			$pangkat = $this->input->post('pangkat');
			$jabatan = $this->input->post('jabatan');
			$bagian = $this->input->post('bagian');

			$userInfo = array();

			if (empty($password)) {
				$userInfo = array(
					'email' => $email,
					'pangkat' => $pangkat,
					'jabatan' => $jabatan,
					'id_jabatan' => $bagian,
					'roleId' => $roleId,
					'nama' => $nama,
					'pangkat' => $pangkat,
					'jabatan' => $jabatan,
					'mobile' => $mobile,
					'updatedBy' => $this->vendorId,
					'updatedDtm' => date('Y-m-d H:i:s')
				);
			} else {
				$userInfo = array(
					'email' => $email,
					'pangkat' => $pangkat,
					'jabatan' => $jabatan,
					'id_jabatan' => $bagian,
					'password' => getHashedPassword($password),
					'roleId' => $roleId,
					'nama' => ucwords($nama),
					'mobile' => $mobile,
					'updatedBy' => $this->vendorId,
					'updatedDtm' => date('Y-m-d H:i:s')
				);
			}

			$result = $this->user_model->editUser($userInfo, $nip);

			if ($result == true) {
				$this->session->set_flashdata('success', 'Berhasi Mengubah User');
			} else {
				$this->session->set_flashdata('error', 'Gagal Mengubah User');
			}

			redirect('user');
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->db->where('nip', $id);
		$this->db->update('tbl_users', array('isDeleted' => 1));
		redirect('user', 'refresh');
	}
	public function konfirmasi_user()
	{
		$this->db->select('tbl_users.*, tbl_roles.role,tbl_jabatan.nama_jabatan');
		$this->db->from('tbl_users');
		$this->db->join('tbl_roles', 'tbl_roles.roleId = tbl_users.roleId');
		$this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_users.id_jabatan');
		$this->db->where('isDeleted', 2);
		$query = $this->db->get()->result();
		$data = array(
			'userRecords' => $query
		);
		$this->global['title'] = 'Konfirmasi Users';
		$this->loadViews('user/index', $this->global, $data);
	}

	public function kon_action()
	{
		$id = $this->uri->segment(3);
		$this->db->where('nip', $id);
		$this->db->update('tbl_users', array('isDeleted' => 0));
		$this->session->set_flashdata('success', 'User berhasil di konfirmasi');
		redirect('user', 'refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */