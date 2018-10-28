<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function register($password_encrypt)
	{
		//user data array
		$data = array(
			'u_name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => $password_encrypt,
			'u_email' => $this->input->post('email'),
			'u_zipcode' => $this->input->post('zipcode')
		);
		//insert user
		return $this->db->insert('users', $data);
	}

	//Log user in
	public function login($username,$password)
	{
		//validate
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row(0)->u_id;
		} else {
			return false;
		}
	}

	//check if username already exists
	public function check_username_exists($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	//check if email already exists
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('u_email' => $email));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	//check if current password exists
	public function check_current_password($current_password)
	{
		//Encrypt Password
		$password_encrypt =  md5($current_password);
		$this->db->where(array('u_id' => $this->session->userdata('user_id'), 'username' => $this->session->userdata('username')));
		$query = $this->db->get('users', array('password' => $password_encrypt));	
		if ($query->row_array() == 1) {
			return false;
		} else {
			return true;
		}
	}

	//check if current email exists
	public function check_current_email($current_email)
	{
		$this->db->where(array('u_id' => $this->session->userdata('user_id'), 'username' => $this->session->userdata('username'),'u_email' => $current_email));
		$query = $this->db->get('users', array('u_email' => $current_email));
		if (!empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	public function user_dashboard()
	{
		$this->db->select('u_name,u_image,u_zipcode,u_register_date');
		$this->db->where('username', $this->session->userdata('username'));
		$query = $this->db->get('users');
		return $query->result_array();

	}

	public function user_ads()
	{	
		$this->db->order_by('posts.p_id', 'desc');
		$this->db->join('categories', 'categories.c_id = posts.p_category_id');
		$query = $this->db->get_where('posts', array('p_user_id' => $this->session->userdata('user_id')));
		return $query->result_array();
	}

	public function update_user_image($user_image)
	{
		$data = array(
			'u_image' => $user_image
		);

		$this->db->where(array('u_id' => $this->session->userdata('user_id'), 'username' => $this->session->userdata('username')));
		return $this->db->update('users', $data);
	}

	public function update_user_profile()
	{
		$option = $this->input->post('form_number');
		switch ($option) {
			case 1:
				$data = array(
					'u_name' => $this->input->post('name'),
					'u_zipcode' => $this->input->post('zipcode')
				);
				break;

			case 2:
				// Encrypt password
				$password_encrypt = md5($this->input->post('new_password'));
				$data = array(
					'password' => $password_encrypt
				);
				break;

			case 3:
				$data = array(
					'u_email' => $this->input->post('new_email')
				);
				break;
			default:
				die();
				break;
		}

		$this->db->where(array('u_id' => $this->session->userdata('user_id'), 'username' => $this->session->userdata('username')));
		$this->db->update('users', $data);
	}

	// get users pending ads
	public function get_pending_ads()
	{
		$this->db->order_by('posts.p_id', 'desc');
		$this->db->join('categories', 'categories.c_id = posts.p_category_id');
		$query = $this->db->get_where('posts', array('p_user_id' => $this->session->userdata('user_id') , 'p_status' => 2));
		return $query->result_array();
	}

	// count ads
	public function user_ads_count()
	{
		$this->db->where('p_user_id',$this->session->userdata('user_id'));
		$this->db->where('p_status', 2);
		$this->db->from('posts');
		$pending_count =  $this->db->count_all_results();

		return array(
			'pending_count' => $pending_count
		);

	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
?>