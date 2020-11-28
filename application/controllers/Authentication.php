<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function index(){

		isLogin();

        $title = 'Sign In';
        
		return view('sign-in', ['title' => $title]);
	}

	public function register(){

		isLogin();

        $title = 'Sign Up';
        
		return view('sign-up', ['title' => $title]);
	}

	public function perform_register(){

		isLogin();

		$this->load->model('users');

		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data['role'] = 0;

		$this->users->insert($data);

		redirect(base_url('/session/createaccount'));
	}

	public function perform_login(){

		isLogin();
		
		$this->load->model('users');

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$result = $this->users->getByEmailAndPassword($email, $password);

		if(!empty($result)){
			foreach($result as $user){
				$session_data = array(
					'userId' => $user->id,
					'username' => $user->name,
					'email' => $user->email,
					'role' => $user->role
				);

				$this->session->set_userdata($session_data);
			}

			redirect(base_url('/home'));

		}else{
			redirect(base_url('/session/new'));
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('/session/new'));
	}

}
