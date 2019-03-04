<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){

			parent::__construct();		
			$this->load->model('m_login');
	 
	}

	public function index()
	{
		$this->load->view('login/index');
		$this->session->sess_destroy();
	}

	public function proses()
	{
		$usname = $this->input->post('email');
		$pwd = $this->input->post('password');
		#$status = $this->input->post('status');
		$where = array(
			'email' => $usname,
			'password' => md5($pwd),

			
		);

		$cek = $this->m_login->cek_login("login",$where)->num_rows();
		$query = $this->m_login->cek_login("login",$where)->row();
		
		if($usname == 'adm_damri01@damri.com' and $pwd == ('admins')){
			$data_session = array(
				'nama' => 'Admin Damri',
					'stat' => 'login'
				
				);
				$this->session->set_userdata($data_session);
			redirect('admin/','refresh');

		}else{
			if($cek > 0){
				$data_session = array(
					'id' => $query->id,
				'email' => $usname,
				'nama' => $query->nama,
				'notelp' => $query->notelp,
				'stat' => 'login',
				'status' => $status
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('member'),'refresh');
			}else{
				echo '<script>alert("username dan password salah");</script>';
			#var_dump($this->input->post('email'));
			#var_dump($this->input->post('password'));
			redirect(base_url('login'),'refresh');
			}
		}

		/*if($cek > 0)
		{
			if($status  == 1)
			{
				$data_session = array(
					'id' => $query->id,
				'email' => $usname,
				'nama' => $query->nama,
				'notelp' => $query->notelp,
				'stat' => 'login',
				'status' => $status
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('akuntan'),'refresh');
			}else{
				$data_session = array(
					'id' => $query->id,
				'email' => $usname,
				'nama' => $query->nama,
				'notelp' => $query->notelp,
				'stat' => 'login',
				'status' => $status
				);
				$this->session->set_userdata($data_session);
				redirect(base_url('member'),'refresh');
				}
			

		}else{
			echo '<script>alert("username dan password salah");</script>';
			#var_dump($this->input->post('email'));
			redirect(base_url('login'),'refresh');
		}*/
	}

	public function register()
	{
		$db = array(
			'id' => '',
			'email' => $this->input->post('email'),
			'password'=> md5($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
		);
		$email = $this->input->post('email');
		$cek = $this->db->query('select * from login where email="'.$email.'"')->num_rows();
		if($cek > 0){
			echo '<script>alert("Email sudah terdaftar");location.href="'.base_url('login').'"</script>';
		}else{
			$query = $this->db->insert('login',$db);
			if($query == true){
				echo '<script>alert("Berhasil melakukan register");location.href="'.base_url('login').'"</script>';
			}else{
				echo '<script>alert("Gagal melakukan register");location.href="'.base_url('login').'"</script>';
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'),'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */