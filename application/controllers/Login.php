<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		$this->isLoggedIn();
	}

	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn()
	{
		$isLoggedIn = $this->session->userdata('isLoggedIn');

		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
			$data = array(
				'title' => 'Login',
			);
			$this->load->view('login/index', $data);
		} else {
			redirect('/');
			// echo 'gagal';
		}
	}

	/**
	 * This function used to logged in user
	 */
	public function loginMe()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nip', 'Nip', 'required|max_length[128]|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$nip = $this->input->post('nip');
			$password = $this->input->post('password');

			$result = $this->login_model->loginMe($nip, $password);

			if (!empty($result)) {
				$sessionArray = array(
					'nip' => $result->nip,
					'role' => $result->roleId,
					'roleText' => $result->role,
					'jabatText' => $result->nama_jabatan,
					'nama' => $result->nama,
					'jabat' => $result->id_jabatan,
					'isLoggedIn' => TRUE
				);

				$this->session->set_userdata($sessionArray);
				unset($sessionArray['nip'], $sessionArray['isLoggedIn']);

				$loginInfo = array("nip" => $result->nip, "sessionData" => json_encode($sessionArray));

				// $this->login_model->lastLogin($loginInfo);
				$this->session->set_flashdata('success','a');
				redirect('/dashboard');
			} else {
				$this->session->set_flashdata('error', 'Nip Atau Password Salah');
				$this->index();
			}
		}
	}

	public function register()
	{
		$jabatan = $this->db->get('tbl_jabatan')->result();
		$data = array(
			'title' => 'Daftar Akun',
			'jabatan' => $jabatan
		);
		$this->load->view('login/form', $data);
	}
	public function register_action()
	{
		$this->load->library('form_validation');

		// $this->form_validation->set_rules('nip', 'Nip', 'required|is_unique[tbl_users.nip]', [
		// 	'is_unique' => 'Nip/Nrp Ini Telah Digunakan'
		// ]);
		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('nama', 'Full Nama', 'required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|max_length[128]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[cpassword]', [
			'matches' => 'Katasandi Tidak Sama'
		]);
		$this->form_validation->set_rules('cpassword', 'Password', 'required|matches[password]');
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Check Your Data');
			$this->register();
		} else {
			$nrp = $this->input->post('nip');
			$nip = substr($nrp,0,8);
			$nama = ucwords(strtolower($this->security->xss_clean($this->input->post('nama'))));
			$email = strtolower($this->security->xss_clean($this->input->post('email')));
			$password = $this->input->post('password');
			// $roleId = $this->input->post('role');
			$mobile = $this->security->xss_clean($this->input->post('mobile'));
			$pangkat = $this->input->post('pangkat');
			$jabatan = $this->input->post('jabatan');
			$bagian = $this->input->post('bagian');

			$userInfo = array(
				'nip' => $nip,
				'nrp' =>$nrp,
				'email' => $email,
				'pangkat' => $pangkat,
				'jabatan' => $jabatan,
				'id_jabatan' => $bagian,
				'password' => getHashedPassword($password),
				'roleId' => 3,
				'nama' => $nama,
				'mobile' => $mobile,
				'isDeleted' => 2,
				'createdDtm' => date('Y-m-d H:i:s')
			);
			$this->load->model('user_model');
			$data = $this->user_model->addNewUser($userInfo);
			// $data = $this->db;
			if ($data) {
				$this->session->set_flashdata('error', 'Gagal Membuat Akun Baru');
			} else {
				$this->session->set_flashdata('success', 'Tunggu Akun Dikonfirmasi oleh admin');
			}

			redirect('login');
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */