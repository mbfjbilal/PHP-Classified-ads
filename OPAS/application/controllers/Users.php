<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	//check if username already exists
	public function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists', 'That username is already taken. Please choose a different one.');
		if ($this->User_model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}

	//check if email already exists
	public function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'That email is already exists.');
		if ($this->User_model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}

	//check if current password exists
	public function check_current_password($current_password)
	{
		$this->form_validation->set_message('check_current_password', 'Current password is not correct.');
		if ($this->User_model->check_current_password($current_password)) {
			return true;
		} else {
			return false;
		}
	}

	//check if current email exists
	public function check_current_email_exists($current_email)
	{
		$this->form_validation->set_message('check_current_email_exists', 'That email is not exists.');
		if ($this->User_model->check_current_email($current_email)) {
			return true;
		} else {
			return false;
		}
	}

	//user register
	public function register()
	{
		$data['title'] = "Sign Up";

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[12]');
		$this->form_validation->set_rules('username', 'UserName', 'trim|required|min_length[4]|max_length[12]|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]|min_length[5]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		} else {
			//Encrypt Password
			$password_encrypt = md5($this->input->post('password'));
			$this->User_model->register($password_encrypt);

			//set message 
			$this->session->set_flashdata('user_registered','You are now registered and can logIn');
			// redirect('users/login','refresh');
			redirect('users/login');
		}
	}

	//user login
	public function login()
	{
		$data['title'] = 'Sign In';
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		} else {
			//get username
			$username = $this->input->post('username');
			//get and encrypt password
			$password = md5($this->input->post('password'));

			// login user
			$user_id = $this->User_model->login($username, $password);

			if ($user_id) {
				// create session 
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);
				
				//set message 
			$this->session->set_flashdata('user_loggedin','You are now logged In');
			redirect('posts');
			} else {
				//set message 
			$this->session->set_flashdata('login_failed','Login is invalid');
			redirect('users/login','refresh');
			
			}
			
		}

	}

	// Log user out
	public function logout()
	{
		// unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		//set message 
		$this->session->set_flashdata('user_loggedout','You are now logged out');
		redirect('users/login');
	}

	public function dashboard()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['user'] 	  = $this->User_model->user_dashboard();
		$data['category'] = $this->Category_model->get_categories();
		$data['user_ads'] = $this->User_model->user_ads();
		$data['ads_count'] = $this->User_model->user_ads_count();
		
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('users/dashboard_view', $data);
		$this->load->view('templates/footer');
	}

	public function edit_profile()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['user'] 	  = $this->User_model->user_dashboard();

		if (empty($data['user'])) {
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('users/dashboard_edit_user_profile',$data);
		$this->load->view('templates/footer');
	}

	public function update_image()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		//upload profile image
		$config['upload_path'] 		= './assets/images/user';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size'] 		= '2048';
		$config['max_width'] 		= '2000';
		$config['max_height'] 		= '2000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$errors = array('error' => $this->upload->display_errors());
			print_r($errors);
			$user_image = 'user.png';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$user_image = $_FILES['userfile']['name'];
		}

		$this->User_model->update_user_image($user_image);
		$this->session->set_flashdata('user_image_updated','Your profile image has been updated.');
		redirect('users/dashboard');
	}

	public function update_profile()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['user'] 	  = $this->User_model->user_dashboard();

		if (empty($data['user'])) {
			show_404();
		}

		$option = $this->input->post('form_number');
		switch ($option) {
			case 1:
				$this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]|max_length[20]');
				break;
			
			case 2:
				$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|min_length[5]|callback_check_current_password');
				$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]|min_length[5]');
				break;

			case 3:
				$this->form_validation->set_rules('current_email', 'Current Email', 'trim|required|callback_check_current_email_exists');
				$this->form_validation->set_rules('new_email', 'New Email', 'trim|required|callback_check_email_exists');
				break;
			default:
				die();
				break;
		}

		

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('users/dashboard_edit_user_profile',$data);
			$this->load->view('templates/footer');
		} else {
			
			$this->User_model->update_user_profile();
			//set message 
			$this->session->set_flashdata('user_update','You profile has been updated');
			// redirect('users/login','refresh');
			redirect('users/dashboard');
		}
	}

	public function favourite_ads()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['user'] 	  = $this->User_model->user_dashboard();
		$data['ads_count'] = $this->User_model->user_ads_count();


		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('users/dashboard_favourite_ads_view',$data);
		$this->load->view('templates/footer');
	}

	public function archived_ads()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['user'] 	  = $this->User_model->user_dashboard();
		$data['ads_count'] = $this->User_model->user_ads_count();

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('users/dashboard_archived_ads_view', $data);
		$this->load->view('templates/footer');
	}

	public function pending_ads()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['user'] 	  = $this->User_model->user_dashboard();
		$data['category'] = $this->Category_model->get_categories();
		$data['pending_ads'] = $this->User_model->get_pending_ads();
		$data['ads_count'] = $this->User_model->user_ads_count();

		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('users/dashboard_pending_ads_view', $data);
		$this->load->view('templates/footer');
	}

	public function delete_account()
	{
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		
		echo 'delete account';
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
?>