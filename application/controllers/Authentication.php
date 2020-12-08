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
		$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data['role'] = 0;

		$this->users->insert($data);

		redirect(base_url('/session/createaccount'));
	}

	public function perform_dummy(){

		$this->load->model('users');
		
		for($i = 0; $i <= 20; $i++){

			$names = array(
				'Christopher',
				'Ryan',
				'Ethan',
				'John',
				'Zoey',
				'Sarah',
				'Michelle',
				'Samantha',
			);
			
			$surnames = array(
				'Walker',
				'Thompson',
				'Anderson',
				'Johnson',
				'Tremblay',
				'Peltier',
				'Cunningham',
				'Simpson',
				'Mercado',
				'Sellers'
			);

			$random_name = $names[mt_rand(0, sizeof($names) - 1)];
			
			$random_surname = $surnames[mt_rand(0, sizeof($surnames) - 1)];

			$data['name'] = $random_name . ' ' . $random_surname;
			$data['email'] = $random_name .'.'. $random_surname . '@mail.com';
			$data['username'] = $random_surname .'.'. $random_name;
			$data['password'] = password_hash('12345678', PASSWORD_DEFAULT);
			$data['bio'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper orci magna, et tempus sapien facilisis convallis. Morbi lacinia commodo sagittis";
			$data['role'] = 0;

			$this->users->insert($data);
		}

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
